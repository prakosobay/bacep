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
use App\Models\{AccessRequestInternal, ChangeRequestInternal, Internal, InternalEntry, InternalDetail, InternalRisk, InternalHistory, InternalFull, InternalVisitor, MasterCard, MasterCompany, MasterRack, MasterRisks, MasterRoom, Entry, EntryRack, MasterCardType};
use App\Mail\{NotifInternalForm, NotifInternalReject, NotifInternalFull};
use Psy\Command\WhereamiCommand;

class InternalController extends Controller
{

    // Show Pages
    public function internal_form()
    {

        $getCompany = auth()->user()->company;
        $getID = MasterCompany::where('name', $getCompany)->first();
        $risks = MasterRisks::all();
        $getDC = DB::table('m_racks')
            ->join('m_rooms', 'm_racks.m_room_id', '=', 'm_rooms.id')
            ->select('m_racks.*', 'm_rooms.name as room_name')
            ->where('m_rooms.name', 'Server Room')
            ->orderBy('id', 'asc' )
            ->get();

        $getMMR1 = DB::table('m_racks')
            ->join('m_rooms', 'm_racks.m_room_id', '=', 'm_rooms.id')
            ->select('m_racks.*', 'm_rooms.name as room_name')
            ->where('m_rooms.name', 'MMR 1')
            ->get();

        $getMMR2 = DB::table('m_racks')
            ->join('m_rooms', 'm_racks.m_room_id', '=', 'm_rooms.id')
            ->select('m_racks.*', 'm_rooms.name as room_name')
            ->where('m_rooms.name', 'MMR 2')
            ->get();

        $getCCTV = DB::table('m_racks')
            ->join('m_rooms', 'm_racks.m_room_id', '=', 'm_rooms.id')
            ->select('m_racks.*', 'm_rooms.name as room_name')
            ->where('m_rooms.name', 'CCTV Room')
            ->get();

        return view('internal.form', compact('risks', 'getDC', 'getMMR1', 'getMMR2', 'getCCTV'));
    }

    public function dashboard()
    {
        $type = auth()->user()->department;
        return view('internal.dashboard', compact('type'));
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
        $decrypt = Crypt::decrypt($id);
        $getVisitor = InternalVisitor::findOrFail($decrypt);
        $getType = MasterCardType::select('id')->where('name', 'Internal')->first();
        $getCards = MasterCard::where('card_type_id', $getType->id)->select('id', 'number', 'card_type_id')->get();
        // dd($getCards);

        return view('internal.checkinForm', compact('getVisitor', 'getCards'));
    }

    public function internal_action_checkout_form($id)
    {
        $getVisitor = InternalVisitor::findOrFail(Crypt::decrypt($id));
        $getCard = DB::table('internals')
                ->join('m_cards', 'internals.m_card_id', '=', 'm_cards.id')
                ->where('internals.id', $getVisitor->internal_id)
                ->select('m_cards.number as card_number')
                ->first();
                // dd($getCard);
        return view('internal.checkoutForm', compact('getVisitor', 'getCard'));
    }


    //Ajax
    public function get_risk($id)
    {
        $risk = MasterRisks::findOrFail($id);
        return isset($risk) && !empty($risk) ? Response()->json(['status' => 'SUCCESS', 'risk' => $risk]) : response(['status' => 'FAILED', 'risk' => []]);
    }



    // Submit
    public function internal_create(Request $request)
    {
        $getForm = $request->all();
        // dd($getForm);
        $request->validate([
            'work' => ['required', 'string', 'max:255'],
            'visit' => ['required', 'after:yesterday'],
            'leave' => ['required', 'after_or_equal:visit'],
            'background' => ['required', 'string', 'max:255'],
            'desc' => ['required', 'string', 'max:255'],
            'rollback' => ['nullable', 'string', 'max:255'],
            'testing' => ['nullable', 'string', 'max:255'],
            'rack' => ['required'],
        ]);

        DB::beginTransaction();

        try {

            $insertForm = Internal::create([
                'requestor_id' => auth()->user()->id,
                'work' => $getForm['work'],
                'visit' => $getForm['visit'],
                'leave' => $getForm['leave'],
                'isColo' => true,
                'isSurvey' => false,
                'background' => $getForm['background'],
                'desc' => $getForm['desc'],
                'testing' => $getForm['testing'],
                'rollback' => $getForm['rollback'],
            ]);

            Entry::create([
                'internal_id' => $insertForm->id,
                'eksternal_id' => '',
                'dc' => $request->dc,
                'mmr1' => $request->mmr1,
                'mmr2' => $request->mmr2,
                'cctv' => $request->cctv,
                'genset' => null,
                'panel' => null,
                'baterai' => null,
                'trafo' => null,
                'office1' => null,
                'fss' => null,
                'ups' => null,
                'yard' => null,
                'parking' => null,
                'lain' => null,
            ]);

            $arrayRacks = [];
            foreach($getForm['rack'] as $k => $v) {
                $insertArray = [];
                if (isset($getForm['rack'][$k])) {

                    $insertArray = [
                        'internal_id' => $insertForm->id,
                        'm_rack_id' => $getForm['rack'][$k],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $arrayRacks[] = $insertArray;
                }
            }
            EntryRack::insert($arrayRacks);

            $arrayDetail = [];
            foreach ($getForm['time_start'] as $k => $v) {
                $insertArray = [];
                if (isset($getForm['time_start'][$k])) {

                    $insertArray = [
                        'internal_id' => $insertForm->id,
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
                        'm_risk_id' => $getForm['risk'][$k],
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
                        'name' => $getForm['name'][$k],
                        'phone' => $getForm['phone'][$k],
                        'nik' => $getForm['number'][$k],
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

            $notif_email = DB::table('internals')
                // ->join('internal_histories', 'internals.id', '=', 'internal_histories.internal_id')
                ->join('users', 'internals.requestor_id', '=', 'users.id')
                ->select('users.name as requestor', 'internals.id', 'internals.visit', 'internals.created_at as created', 'internals.work', 'internals.leave')
                ->where('internals.id', $insertForm->id)
                ->first();
            foreach ([
                'bayu.prakoso@balitower.co.id',
            ] as $recipient) {
                Mail::to($recipient)->send(new NotifInternalForm($notif_email));
            }

            InternalHistory::create([
                'internal_id' => $insertForm->id,
                'created_by' => Auth::user()->id,
                'role_to' => 'review',
                'status' => 'requested',
                'aktif' => true,
                'pdf' => false,
            ]);

            DB::commit();

            return redirect()->route('dashboardInternal', auth()->user()->department)->with('success', 'Form Has Been Submited');
        } catch (\Exception $e) {
            DB::rollBack();
            // return back()->with('failed', $e->getMessage());
            throw $e->getMessage();
        }
    }



    // pdf
    public function internal_pdf($id)
    {
        $getForm = Internal::findOrFail($id);
        $getLastHistory = InternalHistory::where('internal_id', $id)->where('aktif', 1)->first();
        $getLastHistory->update(['pdf' => true]);

        $getRisks = DB::table('internal_risks')
                ->join('m_risks', 'internal_risks.m_risk_id', '=', 'm_risks.id')
                ->where('internal_id', $id)
                ->select('internal_risks.*', 'm_risks.risk', 'm_risks.poss', 'm_risks.impact', 'm_risks.mitigation')
                ->get();

        $getDetailRisk = DB::table('internal_risks')
                ->join('m_risks', 'internal_risks.m_risk_id', '=', 'm_risks.id')
                ->where('internal_id', $id)
                ->select('internal_risks.*', 'm_risks.risk')
                ->first();

        $getHistory = InternalHistory::where('internal_id', $id)
                ->join('users', 'users.id', '=', 'internal_histories.created_by')
                ->select('internal_histories.*', 'users.name')
                ->get();

        $nomorAR = AccessRequestInternal::where('internal_id', $id)->first();
        $nomorCR = ChangeRequestInternal::where('internal_id', $id)->first();
        $pdf = PDF::loadview('internal.pdf', compact('getForm', 'getLastHistory', 'getHistory', 'nomorAR', 'nomorCR', 'getRisks', 'getDetailRisk'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream();
    }



    // Approve
    public function internal_approve($id) // Function flow approval
    {
        $last_update = InternalHistory::where('internal_id', $id)->latest()->first();

        $notif_email = DB::table('internals')
                ->join('internal_histories', 'internals.id', '=', 'internal_histories.internal_id')
                ->join('users', 'internals.requestor_id', '=', 'users.id')
                ->select('users.name as requestor', 'internal_histories.aktif', 'internals.id', 'internals.visit', 'internals.created_at as created', 'internals.work', 'internals.leave')
                ->where('internals.id', $id)
                ->where('aktif', 1)
                ->first();

        // dd($notif_email);
        DB::beginTransaction();

        try {

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
                        Mail::to($recipient)->send(new NotifInternalFull($notif_email));
                    }
                    $role_to = 'all';

                    $full = Internal::findOrFail($id);
                    InternalFull::create([
                        'internal_id' => $full->id,
                        // 'link' => ("https://dcops.balifiber.id/internal/pdf/$full->id"),
                        'link' => ("http://localhost:8000/internal/pdf/$full->id"),
                        'note' => null,
                        'status' => 'Full Approved',
                    ]);
                }

                // Simpan tiap perubahan permit ke table CLeaningHistory
                InternalHistory::create([
                    'internal_id' => $id,
                    'created_by' => Auth::user()->id,
                    'role_to' => $role_to,
                    'status' => $status,
                    'aktif' => true,
                    'pdf' => false,
                ]);

                DB::commit();

                alert()->success('Approved', 'Permit has been approved!');
                return back();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('failed', $e->getMessage());
        }
    }



    // Update Checkin
    public function internal_checkin_update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'respon' => ['required', 'string', 'max:255'],
            'card' => ['required', 'numeric'],
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
                'nik' => $request->nik,
                'department' => $request->department,
                'company' => $request->company,
                'respon' => $request->respon,
                'checkin' => $request->checkin,
                'photo_checkin' => $imageName,
            ]);

            $getInternalID = $getVisitor->internal->id;
            $updateCard = Internal::findOrFail($getInternalID);
            // $getcard = MasterCard::findOrFail($request->card);
            // dd($getcard);

            if($updateCard->m_card_id == null){

                $updateCard->update([
                    'm_card_id' => $request->card,
                ]);
            }
            // dd($updateCard);

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
                'is_done' => true,
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
                    // Mail::to($getForm->req_email)->send(new NotifInternalReject($getForm));

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
        // dd($dept);
        $history = DB::table('internal_histories')
            ->leftJoin('internals', 'internal_histories.internal_id', '=', 'internals.id')
            ->leftJoin('users', 'internal_histories.created_by', '=', 'users.id')
            ->select('internal_histories.*','internals.visit', 'users.name as updatedby', 'internals.id as internal');
        return Datatables::of($history)
            ->editColumn('visit', function ($history) {
                return $history->visit ? with(new Carbon($history->visit))->format('d/m/Y') : '';
            })
            ->make(true);
    }

    public function internal_yajra_full_approval()
    {
        $full = DB::table('internals')
            ->join('internal_visitors', 'internals.id', '=', 'internal_visitors.internal_id')
            ->join('internal_fulls', 'internals.id', '=', 'internal_fulls.internal_id')
            // ->join('internal_histories', 'internals.id', '=', 'internal_histories.internal_id')
            ->select('internal_fulls.link', 'internal_visitors.name as visitor', 'internal_visitors.checkin', 'internal_visitors.checkout', 'internals.work', 'internals.id', 'internals.visit', 'internal_fulls.status')
            ->where('internal_visitors.deleted_at', null)
            ->where('internal_fulls.status', 'Full Approved');
            // ->groupBy('internal_id');
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
            ->join('users', 'internals.requestor_id', '=', 'users.id')
            ->leftJoin('m_cards', 'internals.m_card_id', '=', 'm_cards.id')
            ->select('internal_fulls.link', 'internal_visitors.name as visitor', 'internal_visitors.checkin', 'internal_visitors.checkout', 'internals.work', 'internals.leave', 'internals.id', 'internals.visit', 'internal_fulls.status', 'users.name as requestor', 'm_cards.number as card_number')
            ->where('internal_visitors.deleted_at', null)
            ->where('users.department', $dept)
            ->where('internal_visitors.checkout', null)
            // ->orWhere('m_cards.number', null)
            // ->orWhere('card_number', null)
            ->where('internal_fulls.status', 'Full Approved');

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
            ->join('users', 'internals.requestor_id', '=', 'users.id')
            ->leftJoin('m_cards', 'internals.m_card_id', '=', 'm_cards.id')
            ->where('internal_visitors.is_done', true)
            ->where('users.department', $dept)
            ->select('internals.work', 'internals.visit', 'internals.leave', 'users.name as requestor', 'm_cards.number as card_number', 'internal_visitors.name', 'internal_visitors.checkin', 'internal_visitors.checkout');
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
        $getPermit = DB::table('internals')
            ->join('internal_visitors', 'internals.id', '=', 'internal_visitors.internal_id')
            ->join('users', 'internals.requestor_id', '=', 'users.id')
            ->leftJoin('m_cards', 'internals.m_card_id', '=', 'm_cards.id')
            ->where('internal_visitors.is_done', true)
            ->where('users.department', $dept)
            ->select('internals.work', 'internals.visit', 'internals.leave', 'users.name as requestor', 'm_cards.number as card_number', 'internal_visitors.name', 'internal_visitors.checkin', 'internal_visitors.checkout');
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
