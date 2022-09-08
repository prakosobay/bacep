<?php

namespace App\Http\Controllers;

use App\Exports\InternalExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session, Storage, Crypt};
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Encryption;
use App\Models\{Internal, InternalEntry, InternalDetail, InternalRisk, InternalHistory, InternalFull, InternalVisitor, MasterCard};
use App\Mail\{NotifInternalForm, NotifInternalReject, NotifInternalFull};
use Psy\Command\WhereamiCommand;

class InternalController extends Controller
{

    // Show Pages
    public function internal_form()
    {
        return view('internal.form');
    }

    public function dashboard()
    {
        return view('internal.dashboard');
    }

    public function finished_show()
    {
        return view('internal.finished');
    }

    public function internal_last_form()
    {
        // $internals = InternalVisitor::where('req_dept', $dept)
        //     ->where('done', 1)
        //     ->groupBy('internal_id')
        //     ->get();
        return view('internal.lastFormTable');
    }

    public function last_selected($id)
    {
        $getInternal = Internal::findOrFail(Crypt::decrypt($id));
        return view('internal.lastSelected', compact('getInternal'));
    }

    public function internal_action_checkin_form($id)
    {
        try {
            $decrypt = Crypt::decrypt($id);
            $getVisitor = InternalVisitor::findOrFail($decrypt);
            $getCards = MasterCard::where('type', 'internal')->get();

            return view('internal.checkinForm', compact('getVisitor', 'getCards'));
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function internal_action_checkout_form($id)
    {
        $getVisitor = InternalVisitor::findOrFail(Crypt::decrypt($id));
        return view('internal.checkoutForm', compact('getVisitor'));
    }



    // Submit
    public function internal_create(Request $request)
    {
        // dd($request->all());
        $getForm = $request->all();
        // dd ($getForm);
        $validated = $request->validate([
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

            InternalEntry::insert([
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
            foreach ($getForm['time_start'] as $k => $v) {
                $insertArray = [];
                if (isset($getForm['time_start'][$k])) {

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
            InternalDetail::insert($arrayDetail);

            $arrayRisk = [];
            foreach ($getForm['risk'] as $k => $v) {
                $insertArray = [];
                if (isset($getForm['risk'][$k])) {

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
            InternalRisk::insert($arrayRisk);

            $arrayVisitor = [];
            foreach ($getForm['name'] as $k => $v) {
                $insertArray = [];
                if (isset($getForm['name'][$k])) {

                    $insertArray = [
                        'internal_id' => $insertForm->id,
                        'req_dept' => $insertForm->req_dept,
                        'name' => $getForm['name'][$k],
                        'phone' => $getForm['phone'][$k],
                        'numberId' => $getForm['number'][$k],
                        'respon' => $getForm['respon'][$k],
                        'department' => $getForm['department'][$k],
                        'company' => $getForm['company'][$k],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $arrayVisitor[] = $insertArray;
                }
            }
            InternalVisitor::insert($arrayVisitor);

            $notif_email = Internal::find($insertForm->id);
            foreach ([
                'taufik.ismail@balitower.co.id', 'eri.iskandar@balitower.co.id', 'hilman.fariqi@balitower.co.id',
                'ilham.pangestu@balitower.co.id', 'irwan.trisna@balitower.co.id', 'yoga.agus@balitower.co.id', 'yufdi.syafnizal@balitower.co.id', 'khaidir.alamsyah@balitower.co.id', 'hendrik.andy@balitower.co.id', 'bayu.prakoso@balitower.co.id',
            ] as $recipient) {
                Mail::to($recipient)->send(new NotifInternalForm($notif_email));
            }

            InternalHistory::insert([
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

            DB::commit();

            return redirect()->route('dashboardInternal', auth()->user()->department)->with('success', 'Form Has Been Submited');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }



    // pdf
    public function internal_pdf($id)
    {
        // dd($id);
        $getForm = Internal::findOrFail($id);
        $getLastHistory = InternalHistory::where('internal_id', $id)->where('aktif', 1)->first();
        $getLastHistory->update(['pdf' => true]);

        // $getHistory = DB::table('internal_histories')
        //     ->join('internals', 'internals.id', '=', 'internal_histories.internal_id')
        //     ->where('internal_histories.internal_id', $id)
        //     ->select('internal_histories.*')
        //     ->get();

        $getHistory = InternalHistory::where('internal_id', $id)->select('internal_histories.*')->get();

        $pdf = PDF::loadview('internal.pdf', compact('getForm', 'getLastHistory', 'getHistory'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream();
    }



    // Approve
    public function internal_approve($id) // Function flow approval
    {
        $last_update = InternalHistory::where('internal_id', $id)->latest()->first();
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
                    'bayu.prakoso@balitower.co.id',
                ] as $recipient) {
                    Mail::to($recipient)->send(new NotifInternalForm($notif_email));
                }
                $role_to = 'security';
            } elseif ($last_update->role_to == 'security') {
                foreach ([
                    'bayu.prakoso@balitower.co.id',
                ] as $recipient) {
                    Mail::to($recipient)->send(new NotifInternalForm($notif_email));
                }
                $role_to = 'head';
            } elseif ($last_update->role_to = 'head') {
                $full = Internal::find($id);
                foreach ([
                    'bayu.prakoso@balitower.co.id',
                ] as $recipient) {
                    Mail::to($recipient)->send(new NotifInternalFull($full));
                }
                $role_to = 'all';

                $full = Internal::findOrFail($id);
                InternalFull::create([
                    'internal_id' => $full->id,
                    'req_dept' => $full->req_dept,
                    'work' => $full->work,
                    'request' => $full->created_at,
                    'visit' => $full->visit,
                    'leave' => $full->leave,
                    // 'link' => ("https://dcops.balifiber.id/internal/pdf/$full->id"),
                    'link' => ("http://localhost:8000/internal/pdf/$full->id"),
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

            if ($log) {
                alert()->success('Approved', 'Permit has been approved!');
                return back();
            }
        } else {
            abort(403);
        }
    }



    // Update Checkin
    public function internal_checkin_update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'numberId' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'respon' => ['required', 'string', 'max:255'],
            'checkin' => ['required'],
            'photo_checkin' => ['required'],
        ]);

        $extension = explode('/', explode(':', substr($request->photo_checkin, 0, strpos($request->photo_checkin, ';')))[1])[1];   // .jpg .png .pdf
        $replace = substr($request->photo_checkin, 0, strpos($request->photo_checkin, ',') + 1);
        $image = str_replace($replace, '', $request->photo_checkin);
        $image = str_replace(' ', '+', $image);
        $imageName = Str::random(200) .  '.' . $extension;
        // dd($imageName);

        Storage::disk('internalCheckin')->put($imageName, base64_decode($image));

        DB::beginTransaction();

        try {
            $getVisitor = InternalVisitor::findOrFail(Crypt::decrypt($id));
            $getVisitor->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'numberId' => $request->numberId,
                'department' => $request->department,
                'company' => $request->company,
                'respon' => $request->respon,
                'checkin' => $request->checkin,
                'photo_checkin' => $imageName,
            ]);

            $getInternalID = $getVisitor->internal->id;
            $updateCard = Internal::findOrFail($getInternalID);
            $getcard = MasterCard::findOrFail($request->card);
            // dd($getcard);

            if($updateCard->card_number == null){

                $updateCard->update([
                    'card_number' => $getcard->number,
                ]);
            }

            DB::commit();

            return redirect()->route('dashboardInternal', auth()->user()->department)->with('success', 'Checkin Successful!');
        } catch(\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }



    // Update Checkout
    public function internal_checkout_update(Request $request, $id)
    {
        $request->validate([
            'checkout' => ['required'],
            'photo_checkout' => ['required'],
        ]);

        $extension = explode('/', explode(':', substr($request->photo_checkout, 0, strpos($request->photo_checkout, ';')))[1])[1];   // .jpg .png .pdf
        $replace = substr($request->photo_checkout, 0, strpos($request->photo_checkout, ',') + 1);
        $image = str_replace($replace, '', $request->photo_checkout);
        $image = str_replace(' ', '+', $image);
        $imageName = Str::random(200) . '.' . $extension;

        Storage::disk('internalCheckout')->put($imageName, base64_decode($image));

        DB::beginTransaction();

        try {
            $getVisitor = InternalVisitor::findOrFail(Crypt::decrypt($id));
            $getVisitor->update([
                'checkout' => $request->checkout,
                'photo_checkout' => $imageName,
                'done' => true,
            ]);

        DB::commit();

        return redirect()->route('dashboardInternal', auth()->user()->department)->with('success', 'Checkout Successful !');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }


    }



    //Cancel Visitor
    public function internal_action_cancel($id)
    {
        InternalVisitor::findOrFail(Crypt::decrypt($id))->delete();
        return redirect()->route('dashboardInternal', auth()->user()->department)->with('success', 'Success');
    }




    // Reject
    public function internal_reject(Request $request, $id)
    {
        if ((Gate::denies('isSecurity')) && (Gate::denies('isVisitor'))) {

            DB::beginTransaction();

            try {
                $lastUpdate = InternalHistory::where('internal_id', $id)->latest()->first();
                $getForm = Internal::findOrFail($id);

                // dd($getForm);

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

                    DB::commit();

                    alert()->success('Rejected', 'Permit has been rejected!');
                    return back();
                } else {
                    abort(404);
                }
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
        } else {
            abort(403);
        }
    }




    // Export
    public function export_full_approve()
    {
        return Excel::download(new InternalExport, 'Full Approve Internal.xlsx');
    }




    // Yajra
    public function internal_yajra_history()
    {
        $history = DB::table('internal_histories')
            ->join('internals', 'internals.id', '=', 'internal_histories.internal_id')
            ->select('internal_histories.role_to', 'internal_histories.status', 'internal_histories.created_by', 'internal_histories.aktif', 'internals.visit', 'internals.id', 'internals.req_dept');
        return Datatables::of($history)
            ->editColumn('visit', function ($history) {
                return $history->visit ? with(new Carbon($history->visit))->format('d/m/Y') : '';
            })
            ->make(true);
    }

    public function internal_yajra_full_approval()
    {
        $full = DB::table('internals')
            ->join('internal_visitors', 'internals.id', 'internal_visitors.internal_id')
            ->join('internal_fulls', 'internals.id', 'internal_fulls.internal_id')
            ->select('internal_fulls.*', 'internal_visitors.name', 'internal_visitors.checkin', 'internals.card_number')
            ->groupBy('internal_id');
        return Datatables::of($full)
            ->editColumn('visit', function ($full) {
                return $full->visit ? with(new Carbon($full->visit))->format('d/m/Y') : '';
            })
            ->addColumn('action', 'internal.actionLink')
            ->make(true);
    }

    public function internal_yajra_show($dept)
    {
        $full = DB::table('internals')
            ->join('internal_visitors', 'internals.id', '=', 'internal_visitors.internal_id')
            ->join('internal_fulls', 'internals.id', '=', 'internal_fulls.internal_id')
            // ->join('m_cards', 'm_cards.id', '=', 'internals.card_number')
            ->where([
                ['internals.req_dept', $dept],
                ['internal_fulls.status', 'Full Approved'],
                ['internal_visitors.checkout', null],
            ])
            ->select('internals.work', 'internals.visit', 'internals.leave', 'internals.req_name', 'internal_visitors.name', 'internal_visitors.checkin', 'internal_visitors.checkout', 'internal_visitors.id', 'internals.card_number');
        return Datatables::of($full)
            ->editColumn('visit', function ($full) {
                return $full->visit ? with(new Carbon($full->visit))->format('d/m/Y') : '';
            })
            ->editColumn('leave', function ($full) {
                return $full->leave ? with(new Carbon($full->leave))->format('d/m/Y') : '';
            })
            ->addColumn('action', 'internal.actionEdit')
            ->make(true);
    }

    public function internal_yajra_finished($dept)
    {
        $getPermit = DB::table('internals')
            ->join('internal_visitors', 'internals.id', '=', 'internal_visitors.internal_id')
            ->where('internal_visitors.done', 1)
            ->where('internal_visitors.req_dept', $dept)
            ->select('internals.work', 'internals.visit', 'internals.leave', 'internals.req_name', 'internals.card_number', 'internal_visitors.name', 'internal_visitors.checkin', 'internal_visitors.checkout');
        return Datatables::of($getPermit)
            ->editColumn('visit', function ($getPermit) {
                return $getPermit->visit ? with(new Carbon($getPermit->visit))->format('d/m/Y') : '';
            })
            ->editColumn('leave', function ($getPermit) {
                return $getPermit->leave ? with(new Carbon($getPermit->leave))->format('d/m/Y') : '';
            })
            ->make(true);
    }

    public function internal_yajra_last_form($dept)
    {
        $getForm = DB::table('internals')
                ->join('internal_visitors', 'internals.id', '=', 'internal_visitors.internal_id')
                ->where('internal_visitors.done', 1)
                ->where('internal_visitors.req_dept', $dept)
                ->select('internals.*', 'internal_visitors.name', 'internal_visitors.internal_id')
                ->groupBy('internal_visitors.internal_id');

        return Datatables::of($getForm)->addColumn('action', 'internal.actionSelect')->make(true);
    }
}
