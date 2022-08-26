<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Colo, ColoEntry, ColoHistory, ColoFull, ColoDetail, ColoRisk, ColoVisitor};
use App\Mail\{NotifColoForm, NotifColoFull, NotifColoReject};
use Illuminate\Support\Facades\{Crypt, DB, Mail, Auth, Gate};
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use RealRashid\SweetAlert\Facades\Alert;

class ColoController extends Controller
{
    public function form()
    {
        return view('colo.form');
    }


    public function isVisitor($company, $dept)
    {
        // dd($company);
        return view('colo.log');
    }


    public function finished($company, $dept)
    {
        return view('colo.finished');
    }


    public function last_form($company, $dept)
    {
        return view('colo.lastForm');
    }




    // pdf
    public function pdf($id)
    {
        // dd($id);
        $getForm = Colo::findOrFail($id);
        $getLastHistory = ColoHistory::where('colo_id', $id)->where('aktif', 1)->first();
        $getJoin = DB::table('colos')
            ->join('colo_details', 'colos.id', 'colo_details.colo_id')
            ->join('colo_risks', 'colos.id', 'colo_risks.colo_id')
            ->select('colo_risks.risk', 'colo_details.*')
            ->where('colo_details.colo_id', $id)
            ->get();
        // dd($getJoin);
        $getLastHistory->update(['pdf' => true]);

        // $getHistory = DB::table('internal_histories')
        //         ->join('internals', 'internals.id', '=', 'internal_histories.internal_id')
        //         ->where('internal_histories.internal_id', $id)
        //         ->select('internal_histories.*')
        //         ->get();

        $pdf = PDF::loadview('colo.pdf', compact('getForm', 'getLastHistory', 'getJoin'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream();
    }



    // Submit
    public function store(Request $request)
    {
        $getForm = $request->all();
        $request->validate([
            'work' => ['required'],
            'dc' => ['required_without_all:mmr1,mmr2,cctv,lain'],
            'visit' => ['required', 'after:yesterday'],
            'leave' => ['required', 'after_or_equal:visit'],
            'background' => ['required'],
            'desc' => ['required'],
            'rack' => ['required'],
        ]);

        DB::beginTransaction();

        try {
            $insertForm = Colo::create([
                'work' => $getForm['work'],
                'visit' => $getForm['visit'],
                'leave' => $getForm['leave'],
                'background' => $getForm['background'],
                'desc' => $getForm['desc'],
                'testing' => $getForm['testing'],
                'rollback' => $getForm['rollback'],
                'rack' => $getForm['rack'],
                'requestor_id' => auth()->user()->id,
            ]);

            $insertEntries = ColoEntry::insert([
                'colo_id' => $insertForm->id,
                'dc' => $request->dc,
                'mmr1' => $request->mmr1,
                'mmr2' => $request->mmr2,
                'cctv' => $request->cctv,
                'lain' => $request->lain,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $arrayDetail = [];
            foreach ($getForm['time_start'] as $k => $v) {
                $insertArray = [];
                if (isset($getForm['time_start'][$k])) {

                    $insertArray = [
                        'colo_id' => $insertForm->id,
                        'time_start' => $getForm['time_start'][$k],
                        'time_end' => $getForm['time_end'][$k],
                        'activity' => $getForm['activity'][$k],
                        'item' => $getForm['item'][$k],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $arrayDetail[] = $insertArray;
                }
            }
            $insertDetail = ColoDetail::insert($arrayDetail);

            $arrayRisk = [];
            foreach ($getForm['risk'] as $k => $v) {
                $insertArray = [];
                if (isset($getForm['risk'][$k])) {

                    $insertArray = [
                        'colo_id' => $insertForm->id,
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
            $insertRisk = ColoRisk::insert($arrayRisk);

            $arrayVisitor = [];
            foreach ($getForm['name'] as $k => $v) {
                $insertArray = [];
                if (isset($getForm['name'][$k])) {

                    $insertArray = [
                        'colo_id' => $insertForm->id,
                        'name' => $getForm['name'][$k],
                        'phone' => $getForm['phone'][$k],
                        'nik' => $getForm['nik'][$k],
                        'respon' => $getForm['respon'][$k],
                        'department' => $getForm['department'][$k],
                        'company' => $getForm['company'][$k],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $arrayVisitor[] = $insertArray;
                }
            }
            $insertVisitor = ColoVisitor::insert($arrayVisitor);

            // $notif_email = Colo::find($insertForm->id);
            // foreach ([
            //     'bayu.prakoso@balitower.co.id',
            // ] as $recipient) {
            //     Mail::to($recipient)->send(new NotifColoForm($notif_email));
            // }

            ColoHistory::insert([
                'colo_id' => $insertForm->id,
                'created_by' => Auth::user()->id,
                'role_to' => 'review',
                'status' => 'requested',
                'aktif' => true,
                'pdf' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();

            return back()->with('success', 'Form Has Been Submited');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }




    // Approve
    public function approve($id)
    {
        DB::beginTransaction();

        try {
            $last_update = ColoHistory::where('colo_id', $id)->latest()->first();

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
                    $full_colo = Colo::find($id)->first();
                }

                // Pergantian  role tiap permit & send email notif
                $role_to = '';
                if ($last_update->role_to == 'review') {
                    foreach ([
                        'bayu.prakoso@balitower.co.id',
                    ] as $recipient) {
                        Mail::to($recipient)->send(new NotifColoForm($notif_email));
                    }
                    $role_to = 'check';
                } elseif ($last_update->role_to == 'check') {
                    foreach ([
                        'bayu.prakoso@balitower.co.id',
                    ] as $recipient) {
                        Mail::to($recipient)->send(new NotifColoForm($notif_email));
                    }
                    $role_to = 'security';
                } elseif ($last_update->role_to == 'security') {
                    foreach ([
                        'bayu.prakoso@balitower.co.id',
                    ] as $recipient) {
                        Mail::to($recipient)->send(new NotifColoForm($notif_email));
                    }
                    $role_to = 'head';
                } elseif ($last_update->role_to = 'head') {
                    $full = Colo::find($id);
                    foreach ([
                        'bayu.prakoso@balitower.co.id'
                    ] as $recipient) {
                        Mail::to($recipient)->send(new NotifColoFull($full));
                    }
                    $role_to = 'all';

                    $full = Colo::findOrFail($id);
                    // dd($full);
                    $insertFull = ColoFull::create([
                        'colo_id' => $full->id,
                        // 'link' => ("https://dcops.balifiber.id/internal/it/pdf/$full->id"),
                        'link' => ("http://localhost:8000/internal/pdf/$full->id"),
                        'note' => null,
                        'status' => 'Full Approved',
                    ]);
                }

                // Simpan tiap perubahan permit ke table CLeaningHistory
                $log = ColoHistory::insert([
                    'colo_id' => $id,
                    'created_by' => Auth::user()->id,
                    'role_to' => $role_to,
                    'status' => $status,
                    'aktif' => true,
                    'pdf' => false,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                alert()->success('Approved', 'Permit has been approved!');
                return back();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }




    // Reject
    public function reject(Request $request, $id)
    {
        if ((Gate::denies('isSecurity')) && (Gate::denies('isVisitor'))) {

            $lastUpdate = ColoHistory::where('colo_id', $id)->latest()->first();
            $getForm = Colo::findOrFail($id);

            $request->validate([
                'note' => ['required'],
            ]);

            if ($lastUpdate->pdf == true) {
                $lastUpdate->update(['aktif' => false]);

                $getForm->update([
                    'reject_note' => $request->note,
                ]);

                // Simpan tiap perubahan permit ke table History
                $getLog = ColoHistory::create([
                    'colo_id' => $id,
                    'created_by' => Auth::user()->id,
                    'role_to' => 0,
                    'status' => 'rejected',
                    'aktif' => true,
                    'pdf' => false,
                ]);

                // Get permit yang di reject & kirim notif email
                Mail::to($getLog->requestor->email)->send(new NotifColoReject($getForm));
                alert()->success('Rejected', 'Permit has been rejected!');
                return back();
            } else {
                abort(403);
            }
        } else {
            abort(401);
        }
    }



    // Yajra
    public function yajra_history()
    {
        $history = DB::table('colo_histories')
            ->join('colos', 'colos.id', '=', 'colo_histories.colo_id')
            ->select('colo_histories.*', 'colos.created_at', 'colos.visit');
        return Datatables::of($history)
            ->editColumn('visit', function ($history) {
                return $history->visit ? with(new Carbon($history->visit))->format('d/m/Y') : '';
            })
            ->make(true);
    }

    public function yajra_full()
    {
        $full = DB::table('colos')
            ->join('colo_fulls', 'colos.id', '=', 'colo_fulls.colo_id')
            ->join('colo_visitors', 'colos.id', '=', 'colo_visitors.colo_id')
            ->select('colo_fulls.*', 'colo_visitors.name', 'colo_visitors.checkin', 'colos.rack')
            ->groupBy('colo_id');
        Datatables::of($full)
            ->addColumn('action', 'colo.actionLink')
            ->make(true);
    }

    public function yajra_finished($company, $dept)
    {
        $getPermit = DB::table('colos')
            ->join('colo_visitors', 'colos.id', '=', 'colo_visitors.colo_id')
            ->join('users', 'colos.requestor_id', '=', 'users')
            ->where('colo_visitors.done', 1)
            ->where('colo_visitors.req_dept', $dept)
            ->select('colos.work', 'colos.visit', 'colos.leave', 'colos.req_name', 'colo_visitors.name', 'colo_visitors.checkin', 'colo_visitors.checkout');
        return Datatables::of($getPermit)
            ->editColumn('visit', function ($getPermit) {
                return $getPermit->visit ? with(new Carbon($getPermit->visit))->format('d/m/Y') : '';
            })
            ->editColumn('leave', function ($getPermit) {
                return $getPermit->leave ? with(new Carbon($getPermit->leave))->format('d/m/Y') : '';
            })
            ->make(true);
    }
}
