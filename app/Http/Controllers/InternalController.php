<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session, Storage};
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\{Internal, InternalEntry, InternalDetail, InternalRisk, InternalHistory, InternalFull, InternalVisitor};
use App\Mail\{NotifInternalForm, NotifInternalReject, NotifInternalFull};
use Psy\Command\WhereamiCommand;

class InternalController extends Controller
{

    // Show Pages
    public function internal_it_form()
    {
        return view('it.form');
    }



    // Submit
    public function internal_create(Request $request)
    {
        // dd($request->all());
        $getForm = $request->all();
        // dd($getForm);
        $validated = $request->validate([
            'work' => ['required'],
            'dc' => ['required_without_all:mmr1,mmr2,cctv,lain'],
            'visit' => ['required', 'after:yesterday'],
            'leave' => ['required', 'after_or_equal:visit'],
            'req_name' => ['required', 'alpha'],
            'req_phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:11'],
            'background' => ['required'],
            'desc' => ['required'],
            'rack' => ['required'],
        ]);

        if($validated){

            $insertForm = Internal::create([
                'req_dept' => $getForm['req_dept'],
                'req_name' => $getForm['req_name'],
                'req_phone' => $getForm['req_phone'],
                'work' => $getForm['work'],
                'visit' => $getForm['visit'],
                'leave' => $getForm['leave'],
                'background' => $getForm['background'],
                'desc' => $getForm['desc'],
                'testing' => $getForm['testing'],
                'rollback' => $getForm['rollback'],
                'rack' => $getForm['rack'],
                'req_email' => Auth::user()->email,
            ]);

            $insertEntries = InternalEntry::insert([
                'internal_id' => $insertForm->id,
                'req_dept' => $insertForm->req_dept,
                'dc' => $request->dc,
                'mmr1' => $request->mmr1,
                'mmr2' => $request->mmr2,
                'cctv' => $request->cctv,
                'lain' => $request->lain,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $arrayDetail = [];
            foreach($getForm['time_start'] as $k => $v){
                $insertArray = [];
                if(isset($getForm['time_start'][$k])){

                    $insertArray = [
                        'internal_id' => $insertForm->id,
                        'req_dept' => $insertForm->req_dept,
                        'time_start' => $getForm['time_start'][$k],
                        'time_end' => $getForm['time_end'][$k],
                        'activity' => $getForm['activity'][$k],
                        'service_impact' => $getForm['service_impact'][$k],
                        'item' => $getForm['item'][$k],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $arrayDetail[] = $insertArray;
                }
            }
            $insertDetail = InternalDetail::insert($arrayDetail);

            $arrayRisk = [];
            foreach($getForm['risk'] as $k => $v){
                $insertArray = [];
                if(isset($getForm['risk'][$k])){

                    $insertArray = [
                        'internal_id' => $insertForm->id,
                        'req_dept' => $insertForm->req_dept,
                        'risk' => $getForm['risk'][$k],
                        'poss' => $getForm['poss'][$k],
                        'impact' => $getForm['impact'][$k],
                        'mitigation' => $getForm['mitigation'][$k],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $arrayRisk[] = $insertArray;
                }
            }
            $insertRisk = InternalRisk::insert($arrayRisk);

            $arrayVisitor = [];
            foreach($getForm['nama'] as $k => $v){
                $insertArray = [];
                if(isset($getForm['nama'][$k])){

                    $insertArray = [
                        'internal_id' => $insertForm->id,
                        'req_dept' => $insertForm->req_dept,
                        'name' => $getForm['nama'][$k],
                        'phone' => $getForm['phone'][$k],
                        'numberId' => $getForm['numberId'][$k],
                        'respon' => $getForm['respon'][$k],
                        'department' => $getForm['department'][$k],
                        'company' => $getForm['company'][$k],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $arrayVisitor[] = $insertArray;
                }
            }
            $insertVisitor = InternalVisitor::insert($arrayVisitor);

            if($insertVisitor ){

                $notif_email = Internal::find($insertForm->id);
                foreach ([
                    'bayu.prakoso@balitower.co.id'
                ] as $recipient) {
                    Mail::to($recipient)->send(new NotifInternalForm($notif_email));
                }

                $history = InternalHistory::insert([
                    'internal_id' => $insertForm->id,
                    'req_dept' => $insertForm->req_dept,
                    'created_by' => Auth::user()->name,
                    'role_to' => 'review',
                    'status' => 'requested',
                    'aktif' => true,
                    'pdf' => false,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                if($history){
                    return back()->with('success', 'Berhasil yeeayy');
                }
            }
        }
    }



    // pdf
    public function internal_it_pdf($id)
    {
        // dd($id);
        $getForm = Internal::findOrFail($id);
        $getLastHistory = InternalHistory::where('internal_id', $id)->where('aktif', 1)->first();
        $getEntries = InternalEntry::where('internal_id', $id)->first();
        $getDetails = InternalDetail::where('internal_id', $id)->get();
        $getRisks = InternalRisk::where('internal_id', $id)->get();
        $getVisitors = InternalVisitor::where('internal_id', $id)->get();
        $getLastHistory->update(['pdf' => true]);

        $getHistory = DB::table('internal_histories')
                ->join('internals', 'internals.id', '=', 'internal_histories.internal_id')
                ->where('internal_histories.internal_id', $id)
                ->select('internal_histories.*')
                ->get();

        $pdf = PDF::loadview('internal.pdf', compact('getForm', 'getLastHistory', 'getEntries', 'getDetails', 'getRisks', 'getVisitors', 'getHistory'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream();
    }



    // Approve
    public function internal_approve($id) // Function flow approval
    {
        // dd($id);
        $last_update = InternalHistory::where('internal_id', $id)->latest()->first();
        // dd($last_update);
        $notif_email = DB::table('internals')
                    ->join('internal_histories', 'internals.id', 'internal_histories.internal_id')
                    ->where('internals.id', $id)
                    ->where('internal_histories.internal_id', $id)
                    ->where('aktif', 1)
                    ->select('internals.*', 'internal_histories.status', 'internal_histories.created_by')
                    ->first();

        if ($last_update->pdf == true) {
            $last_update->update(['aktif' => false]);

            // Perubahan status tiap permit
            $status = '';
            if ($last_update->status == 'requested') {
                $status = 'reviewed';
            } elseif ($last_update->status == 'reviewed') {
                $status = 'checked';
            } elseif ($last_update->status == 'checked') {
                $status = 'acknowledge';
            } elseif ($last_update->status == 'acknowledge') {
                $status = 'final';
            } elseif ($last_update->status == 'final') {
                $full_internal = Internal::find($id)->first();
            }

            // Pergantian  role tiap permit & send email notif
            $role_to = '';
            if ($last_update->role_to == 'review') {
                foreach ([
                    'bayu.prakoso@balitower.co.id',
                ] as $recipient) {
                    Mail::to($recipient)->send(new NotifInternalForm($notif_email));
                }
                $role_to = 'check';
            } elseif ($last_update->role_to == 'check') {
                foreach ([
                    'bayu.prakoso@balitower.co.id'
                ] as $recipient) {
                    Mail::to($recipient)->send(new NotifInternalForm($notif_email));
                }
                $role_to = 'security';
            } elseif ($last_update->role_to == 'security') {
                foreach ([
                    'bayu.prakoso@balitower.co.id'
                ] as $recipient) {
                    Mail::to($recipient)->send(new NotifInternalForm($notif_email));
                }
                $role_to = 'head';
            } elseif ($last_update->role_to = 'head') {
                $full = Internal::find($id);
                foreach ([
                    'bayu.prakoso@balitower.co.id'
                ] as $recipient) {
                    Mail::to($recipient)->send(new NotifInternalFull($full));
                }
                $role_to = 'all';

                $full = Internal::findOrFail($id);
                // dd($full);
                $insertFull = InternalFull::create([
                    'internal_id' => $full->id,
                    'req_dept' => $full->req_dept,
                    'work' => $full->work,
                    'request' => $full->created_at,
                    'visit' => $full->visit,
                    'leave' => $full->leave,
                    // 'link' => ("https://dcops.balifiber.id/internal/it/pdf/$full->id"),
                    'link' => ("http://localhost:8000/internal/it/pdf/$full->id"),
                    'note' => null,
                    'status' => 'Full Approved',
                ]);
            }

            // Simpan tiap perubahan permit ke table CLeaningHistory
            $log = InternalHistory::insert([
                'internal_id' => $id,
                'req_dept' => $notif_email->req_dept,
                'created_by' => Auth::user()->name,
                'role_to' => $role_to,
                'status' => $status,
                'aktif' => true,
                'pdf' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if($log){
                alert()->success('Approved', 'Permit has been approved!');
                return back();
            }
        } else {
            abort(403);
        }
    }



    // Reject
    public function internal_reject(Request $request, $id)
    {
        $lastUpdate = InternalHistory::where('internal_id', $id)->latest()->first();
        $getForm = Internal::findOrFail($id);

        // dd($getForm);
        if ((Gate::denies('isSecurity')) && (Gate::denies('isVisitor'))) {

            $request->validate([
                'note' => ['required'],
            ]);

            if ($lastUpdate->pdf == true) {
                $lastUpdate->update(['aktif' => false]);

                $getForm->update([
                    'reject_note' => $request->note,
                ]);

                // Simpan tiap perubahan permit ke table History
                $history = InternalHistory::create([
                    'internal_id' => $id,
                    'req_dept' => $getForm->req_dept,
                    'created_by' => Auth::user()->name,
                    'role_to' => 0,
                    'status' => 'rejected',
                    'aktif' => true,
                    'pdf' => false,
                ]);

                // Get permit yang di reject & kirim notif email
                Mail::to($getForm->req_email)->send(new NotifInternalReject($getForm));
                alert()->success('Rejected', 'Permit has been rejected!');
                return back();
            } else {
                abort(403);
            }

        } else {
            abort(403);
        }
    }



    // Yajra
    public function internal_yajra_history()
    {
        $history = DB::table('internal_histories')
            ->join('internals', 'internals.id', '=', 'internal_histories.internal_id')
            ->select('internal_histories.*', 'internals.visit')
            ->orderBy('internal_id', 'desc');
        return Datatables::of($history)
            ->editColumn('updated_at', function ($history) {
                return $history->updated_at ? with(new Carbon($history->updated_at))->format('d/m/Y') : '';
            })
            ->editColumn('visit', function ($history) {
                return $history->visit ? with(new Carbon($history->visit))->format('d/m/Y') : '';
            })
            ->make(true);
    }

    public function internal_yajra_full_approval()
    {
        $full = DB::table('internal_fulls')
            // ->join('internal_visitors', 'internal_fulls.req_dept', '=', 'internal_visitors.req_dept')
            ->select('internal_fulls.*')
            ->orderBy('internal_id', 'desc');
        return Datatables::of($full)
            ->editColumn('visit', function ($full) {
                return $full->visit ? with(new Carbon($full->visit))->format('d/m/Y') : '';
            })
            ->addColumn('action', 'internal.actionLink')
            ->make(true);
    }

    public function internal_it_yajra_full_visitor()
    {
        // SELECT DISTINCT (internals.work), internal_visitors.name, internal_visitors.company from internal_visitors inner join internals on internal_visitors.internal_id = internals.id group by internals.id;

        $full = DB::table('internals')
        ->join('internal_visitors', 'internals.id', '=', 'internal_visitors.internal_id')
        ->select('internals.*', 'internal_visitors.name', 'internal_visitors.company', 'internal_visitors.checkin', 'internal_visitors.checkout')
        ->groupBy('internals.id');
        return Datatables::of($full)
            ->editColumn('visit', function($full){
                return $full->visit ? with(new Carbon($full->visit))->format('d/m/Y') : '';
            })
            ->editColumn('leave', function($full){
                return $full->leave ? with(new Carbon($full->leave))->format('d/m/Y') : '';
            })
            ->addColumn('action', 'internal.actionEdit')
            ->make(true);

    }
}
