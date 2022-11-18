<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session, Storage, Crypt};
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\{AccessRequestEksternal, ChangeRequestEksternal, Eksternal, EksternalVisitor, EksternalHistory, EksternalFull, EksternalDetail, EksternalRisk, MasterCard, MasterCompany, MasterRack, MasterRisks, MasterRoom, Entry, EntryRack, MasterCardType};
use App\Mail\{NotifEksternalForm, NotifEksternalFull, NotifEksternalReject};

class EksternalController extends Controller
{

    // show pages
    public function dashboard()
    {
        $company = auth()->user()->company;
        return view('eksternal.dashboard', compact('company'));
    }

    public function show_form()
    {
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

        return view('eksternal.form', compact('getDC', 'risks', 'getMMR1', 'getMMR2'));
    }

    // checkin form
    public function checkin_form($id)
    {
        $getType = MasterCardType::select('id')->where('name', 'Eksternal')->first();
        $getCards = MasterCard::where('card_type_id', $getType->id)->select('id', 'number', 'card_type_id')->get();
        $decrypt = Crypt::decrypt($id);
        $getVisitor = EksternalVisitor::with('eksternal:id,visit,leave')->where('id', $decrypt)->first();
        return view('eksternal.checkinForm', compact('getVisitor', 'getCards'));
    }

    // checkout form
    public function checkout_form($id)
    {
        $getVisitor = EksternalVisitor::findOrFail(Crypt::decrypt($id));
        $getCard = DB::table('eksternals')
                ->join('m_cards', 'eksternals.m_card_id', '=', 'm_cards.id')
                ->where('eksternals.id', $getVisitor->eksternal_id)
                ->select('m_cards.number as card_number')
                ->first();
        return view('eksternal.checkoutForm', compact('getVisitor', 'getCard'));
    }

    // finished
    public function finished_show()
    {
        $company = auth()->user()->company;
        return view('eksternal.finished', compact('company'));
    }


    //store data
    public function store(Request $request)
    {
        $request->validate([
            'work' => ['required', 'string', 'max:255'],
            'visit' => ['required', 'date'],
            'leave' => ['required', 'date', 'after_or_equal:visit'],
            'background' => ['required', 'string', 'max:255'],
            'desc' => ['required', 'string'],
            'testing' => ['nullable', 'string', 'max:255'],
            'rollback' => ['nullable', 'string', 'max:255'],
            'reject_note' => ['nullable',  'string', 'max:255'],
            'rack' => ['required'],
        ]);

        $getForm = $request->all();
        $company = auth()->user()->company;
        // dd($getForm);
        DB::beginTransaction();

        try {

            $insert = Eksternal::create([
                'requestor_id' => auth()->user()->id,
                'work' => $request->work,
                'visit' => $request->visit,
                'leave' => $request->leave,
                'background' => $request->background,
                'desc' => $request->desc,
                'testing' => $request->testing,
                'rollback' => $request->rollback,
            ]);

            Entry::create([
                'internal_id' => '',
                'eksternal_id' => $insert->id,
                'dc' => $request->dc,
                'mmr1' => $request->mmr1,
                'mmr2' => $request->mmr2,
                'cctv' => null,
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
                        'eksternal_id' => $insert->id,
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
                        'eksternal_id' => $insert->id,
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
            EksternalDetail::insert($arrayDetail);

            $arrayRisk = [];
            foreach ($getForm['risk'] as $k => $v) {
                $insertArray = [];
                if (isset($getForm['risk'][$k])) {

                    $insertArray = [
                        'eksternal_id' => $insert->id,
                        'm_risk_id' => $getForm['risk'][$k],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $arrayRisk[] = $insertArray;
                }
            }
            EksternalRisk::insert($arrayRisk);

            $arrayVisitor = [];
            foreach ($getForm['name'] as $k => $v) {
                $insertArray = [];
                if (isset($getForm['name'][$k])) {

                    $insertArray = [
                        'eksternal_id' => $insert->id,
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
            EksternalVisitor::insert($arrayVisitor);

            // Send Email Notification
            $notif_email = DB::table('eksternals')
                ->join('users', 'eksternals.requestor_id', '=', 'users.id')
                ->select('users.name as requestor', 'eksternals.id', 'eksternals.visit', 'eksternals.created_at as created', 'eksternals.work', 'eksternals.leave')
                ->where('eksternals.id', $insert->id)
                ->first();
            // dd($notif_email);
            foreach ([
                'bayu.prakoso@balitower.co.id',
            ] as $recipient) {
                Mail::to($recipient)->send(new NotifEksternalForm($notif_email));
            }

            EksternalHistory::create([
                'eksternal_id' => $insert->id,
                'created_by' => auth()->user()->id,
                'role_to' => 'review',
                'status' => 'requested',
                'aktif' => true,
                'pdf' => false,
            ]);

            DB::commit();
            return redirect()->route('dashboardEksternal', $company)->with('success', 'Submited');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function approve($id)
    {
        $last_update = EksternalHistory::where('eksternal_id', $id)->latest()->first();

        $notif_email = DB::table('eksternals')
                ->join('eksternal_histories', 'eksternals.id', '=', 'eksternal_histories.eksternal_id')
                ->join('users', 'eksternals.requestor_id', '=', 'users.id')
                ->select('users.name as requestor', 'users.company as company', 'eksternal_histories.aktif', 'eksternals.id', 'eksternals.visit', 'eksternals.created_at as created', 'eksternals.work', 'eksternals.leave')
                ->where('eksternals.id', $id)
                ->where('aktif', 1)
                ->first();

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
                } elseif ($last_update->status == 'final')

                // Pergantian  role tiap permit & send email notif
                $role_to = '';
                if ($last_update->role_to == 'review') {
                    foreach ([
                        'bayu.prakoso@balitower.co.id',
                    ] as $recipient) {
                        Mail::to($recipient)->send(new NotifEksternalForm($notif_email));
                    }
                    $role_to = 'check';
                } elseif ($last_update->role_to == 'check') {
                    foreach ([
                        'bayu.prakoso@balitower.co.id',
                    ] as $recipient) {
                        Mail::to($recipient)->send(new NotifEksternalForm($notif_email));
                    }
                    $role_to = 'security';
                } elseif ($last_update->role_to == 'security') {
                    foreach ([
                        'bayu.prakoso@balitower.co.id',
                    ] as $recipient) {
                        Mail::to($recipient)->send(new NotifEksternalForm($notif_email));
                    }
                    $role_to = 'head';
                } elseif ($last_update->role_to = 'head') {
                    foreach ([
                        'bayu.prakoso@balitower.co.id',
                    ] as $recipient) {
                        Mail::to($recipient)->send(new NotifEksternalFull($notif_email));
                    }
                    $role_to = 'all';

                    EksternalFull::create([
                        'eksternal_id' => $id,
                        // 'link' => ("https://dcops.balifiber.id/eksternal/pdf/$id"),
                        'link' => ("http://localhost:8000/eksternal/pdf/$id"),
                        'note' => null,
                        'status' => 'Full Approved',
                    ]);
                }

                // Simpan tiap perubahan permit ke table CLeaningHistory
                EksternalHistory::create([
                    'eksternal_id' => $id,
                    'created_by' => Auth::user()->id,
                    'role_to' => $role_to,
                    'status' => $status,
                    'aktif' => true,
                    'pdf' => false,
                ]);

                DB::commit();

                alert()->success('Approved', 'Permit has been approved!');
                return back()->with('success', 'Approved!');
            } else {

                return back()->with('failed', 'Cek PDF Dahulu!');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('failed', $e->getMessage());
        }
    }


    //PDF
    public function pdf($id)
    {
        $getForm = Eksternal::findOrFail($id);
        $getLastHistory = EksternalHistory::where('eksternal_id', $id)->where('aktif', 1)->first();
        $getLastHistory->update(['pdf' => true]);

        $getRisks = DB::table('eksternal_risks')
                ->join('m_risks', 'eksternal_risks.m_risk_id', '=', 'm_risks.id')
                ->where('eksternal_id', $id)
                ->select('eksternal_risks.*', 'm_risks.risk', 'm_risks.poss', 'm_risks.impact', 'm_risks.mitigation')
                ->get();

        $getDetailRisk = DB::table('eksternal_risks')
                ->join('m_risks', 'eksternal_risks.m_risk_id', '=', 'm_risks.id')
                ->where('eksternal_id', $id)
                ->select('eksternal_risks.*', 'm_risks.risk')
                ->first();

        $getHistory = EksternalHistory::where('eksternal_id', $id)
                ->join('users', 'users.id', '=', 'eksternal_histories.created_by')
                ->select('eksternal_histories.*', 'users.name')
                ->get();

        $nomorAR = AccessRequestEksternal::where('eksternal_id', $id)->first();
        $nomorCR = ChangeRequestEksternal::where('eksternal_id', $id)->first();
        $pdf = PDF::loadview('eksternal.pdf', compact('getForm', 'getLastHistory', 'getHistory', 'getRisks', 'getDetailRisk', 'nomorAR', 'nomorCR'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream();
    }


    //Reject
    public function reject(Request $request, $id)
    {
        if ((Gate::denies('isSecurity')) && (Gate::denies('isVisitor'))) {

            $request->validate([
                'note' => ['required', 'string', 'max:255'],
            ]);

            $lastUpdate = EksternalHistory::where('eksternal_id', $id)->latest()->first();
            $getForm = Eksternal::findOrFail($id);
            $getRequestor = $getForm->requestor->email;

            DB::beginTransaction();

            try {

                if ($lastUpdate->pdf == true) {

                    $lastUpdate->update(['aktif' => false]);
                    $getForm->update([
                        'reject_note' => $request->note,
                    ]);

                    // Simpan tiap perubahan permit ke table History
                    EksternalHistory::create([
                        'eksternal_id' => $id,
                        'created_by' => auth()->user()->id,
                        'role_to' => 0,
                        'status' => 'rejected',
                        'aktif' => true,
                        'pdf' => false,
                    ]);

                    DB::commit();

                    // Get permit yang di reject & kirim notif email
                    Mail::to($getRequestor)->send(new NotifEksternalReject($getForm));

                    alert()->success('Rejected', 'Permit has been rejected!');
                    return back()->with('success', 'Rejected!');
                } else {

                    return back()->with('failed', 'Cek PDF Dahulu!');
                }
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
        } else {
            abort(403);
        }
    }


    // checkin
    public function checkin_update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'respon' => ['nullable', 'string', 'max:255'],
            'card' => ['required', 'numeric'],
            'checkin' => ['required'],
            'photo_checkin' => ['required'],
        ]);

        $extension = explode('/', explode(':', substr($request->photo_checkin, 0, strpos($request->photo_checkin, ';')))[1])[1];   // .jpg .png .pdf
        $replace = substr($request->photo_checkin, 0, strpos($request->photo_checkin, ',') + 1);
        $image = str_replace($replace, '', $request->photo_checkin);
        $image = str_replace(' ', '+', $image);
        $imageName = time() .  '.' . $extension;

        DB::beginTransaction();

        try {

            $getVisitor = EksternalVisitor::findOrFail(Crypt::decrypt($id));
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

            $getEksternalID = $getVisitor->eksternal->id;
            $updateCard = Eksternal::findOrFail($getEksternalID);

            if($updateCard->m_card_id == null){

                $updateCard->update([
                    'm_card_id' => $request->card,
                ]);
            }

            DB::commit();

            Storage::disk('eksternalCheckin')->put($imageName, base64_decode($image));

            return redirect()->route('dashboardEksternal', auth()->user()->company)->with('success', 'Checkin Successful!');
        } catch(\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    // checkout
    public function checkout_update(Request $request, $id)
    {
        $request->validate([
            'checkout' => ['required'],
            'photo_checkout' => ['required'],
        ]);

        $getID = EksternalVisitor::where('id', Crypt::decrypt($id))->select('eksternal_id')->first();
        $permit = EksternalVisitor::where('eksternal_id', $getID->eksternal_id)->where('checkout', null)->select('id')->count();

        $extension = explode('/', explode(':', substr($request->photo_checkout, 0, strpos($request->photo_checkout, ';')))[1])[1];   // .jpg .png .pdf
        $replace = substr($request->photo_checkout, 0, strpos($request->photo_checkout, ',') + 1);
        $image = str_replace($replace, '', $request->photo_checkout);
        $image = str_replace(' ', '+', $image);
        $imageName = time() . '.' . $extension;

        $lastAR = DB::table('access_request_eksternals')->latest()->first();
        $lastCR = DB::table('change_request_eksternals')->latest()->first();
        $eksternal_id = $getID->eksternal_id;

        DB::beginTransaction();

        try {

            $getVisitor = EksternalVisitor::findOrFail(Crypt::decrypt($id));
            $getVisitor->update([
                'checkout' => $request->checkout,
                'photo_checkout' => $imageName,
            ]);

            if($permit == 1) {

                if(($lastAR == null) && ($lastCR == null)) {

                    $ar = 1;
                    $cr = 1;

                } else {

                    $ar = $lastAR->number + 1;
                    $cr = $lastCR->number + 1;

                    $lastyearAR = $lastAR->year;
                    $lastyearCR = $lastCR->year;
                    $currrentYear = date('Y');

                    if ( ($currrentYear != $lastyearAR) && ( $currrentYear != $lastyearCR ) ){

                        $ar = 1;
                        $cr = 1;
                    }
                }

                AccessRequestEksternal::firstOrCreate([
                    'number' => $ar,
                    'month' => date('m'),
                    'year' => date('Y'),
                    'eksternal_id' => $eksternal_id,
                ]);

                ChangeRequestEksternal::firstOrCreate([
                    'number' => $cr,
                    'month' => date('m'),
                    'year' => date('Y'),
                    'eksternal_id' => $eksternal_id,
                ]);
            }

        DB::commit();

        Storage::disk('eksternalCheckout')->put($imageName, base64_decode($image));

        return redirect()->route('dashboardEksternal', auth()->user()->company)->with('success', 'Checkout Successful !');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    // cancel
    public function cancel_update($id)
    {
        EksternalVisitor::findOrFail(Crypt::decrypt($id))->delete();
        return redirect()->route('dashboardEksternal', auth()->user()->company)->with('success', 'Cancelled');
    }

    public function penomoran_eksternal()
    {
        $ar = AccessRequestEksternal::all();
        $cr = ChangeRequestEksternal::all();

        return view('eksternal.penomoran', compact('ar', 'cr'));
    }


    // Yajra
    public function yajra_history()
    {
        $history = DB::table('eksternal_histories')
            ->leftJoin('eksternals', 'eksternal_histories.eksternal_id', '=', 'eksternals.id')
            ->leftJoin('users', 'eksternal_histories.created_by', '=', 'users.id')
            ->select('eksternal_histories.status', 'eksternal_histories.role_to', 'eksternal_histories.aktif', 'eksternal_histories.updated_at', 'eksternals.visit', 'users.name as updatedby', 'eksternals.id as id');
        return Datatables::of($history)
            ->editColumn('visit', function ($history) {
                return $history->visit ? with(new Carbon($history->visit))->format('d/m/Y') : '';
            })
            ->make(true);
    }

    public function yajra_full_approval()
    {
        $full = DB::table('eksternals')
            ->join('eksternal_visitors', 'eksternals.id', '=', 'eksternal_visitors.eksternal_id')
            ->join('eksternal_fulls', 'eksternals.id', '=', 'eksternal_fulls.eksternal_id')
            ->leftJoin('users', 'eksternals.requestor_id', '=', 'users.id')
            ->select('eksternal_fulls.link', 'eksternal_visitors.name as visitor', 'eksternal_visitors.checkin', 'eksternal_visitors.checkout', 'eksternals.work', 'eksternals.id', 'eksternals.visit', 'eksternal_fulls.status', 'users.name as requestor')
            ->where('eksternal_visitors.deleted_at', null)
            ->where('eksternal_fulls.status', 'Full Approved');
            // ->groupBy('eksternal_id');
        return Datatables::of($full)
            ->editColumn('visit', function ($full) {
                return $full->visit ? with(new Carbon($full->visit))->format('d/m/Y') : '';
            })
            ->addColumn('action', 'internal.actionLink')
            ->make(true);
    }

    public function yajra_full_visitor($company)
    {
        $full = DB::table('eksternals')
            ->join('eksternal_visitors', 'eksternals.id', '=', 'eksternal_visitors.eksternal_id')
            ->join('eksternal_fulls', 'eksternals.id', '=', 'eksternal_fulls.eksternal_id')
            ->join('users', 'eksternals.requestor_id', '=', 'users.id')
            ->leftJoin('m_cards', 'eksternals.m_card_id', '=', 'm_cards.id')
            ->select('eksternal_visitors.name as visitor', 'eksternal_visitors.checkin', 'eksternal_visitors.checkout', 'eksternals.work', 'eksternals.leave', 'eksternal_visitors.id', 'eksternals.visit', 'eksternal_fulls.status', 'users.name as requestor', 'm_cards.number as card_number')
            ->where('eksternal_visitors.deleted_at', null)
            ->where('users.company', $company)
            ->where('eksternal_visitors.checkout', null)
            ->where('eksternal_fulls.status', 'Full Approved');

        return Datatables::of($full)
            ->editColumn('visit', function ($full) {
                return $full->visit ? with(new Carbon($full->visit))->format('d/m/Y') : '';
            })
            ->editColumn('leave', function ($full) {
                return $full->leave ? with(new Carbon($full->leave))->format('d/m/Y') : '';
            })
            ->addColumn('action', 'eksternal.actionEdit')
            ->make(true);
    }

    public function yajra_full_finished($company)
    {
        $getPermit = DB::table('eksternals')
            ->join('eksternal_visitors', 'eksternals.id', '=', 'eksternal_visitors.eksternal_id')
            ->join('users', 'eksternals.requestor_id', '=', 'users.id')
            ->leftJoin('m_cards', 'eksternals.m_card_id', '=', 'm_cards.id')
            ->where('eksternal_visitors.checkout', '!=', null)
            ->where('users.company', $company)
            ->select('eksternals.work', 'eksternals.visit', 'eksternals.leave', 'users.name as requestor', 'm_cards.number as card_number', 'eksternal_visitors.name', 'eksternal_visitors.checkin', 'eksternal_visitors.checkout');
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
