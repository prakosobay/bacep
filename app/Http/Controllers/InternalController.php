<?php

namespace App\Http\Controllers;

use App\Exports\InternalExport;
use App\Http\Requests\StoreInternalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session, Storage, Crypt};
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\{AccessRequestInternal, ChangeRequestInternal, Colo, ColoDetail, ColoEntry, ColoFull, ColoHistory, ColoRisk, ColoVisitor, Internal, InternalEntry, InternalDetail, InternalRisk, InternalHistory, InternalFull, InternalVisitor, MasterCard, MasterCompany, MasterRack, MasterRisks, MasterRoom, Entry, EntryRack, MasterCardType, Visitor};
use App\Mail\{NotifInternalForm, NotifInternalReject, NotifInternalFull};
use Psy\Command\WhereamiCommand;

class InternalController extends Controller
{
    public function getUser()
    {
        $get = auth()->user();
        return $get;
    }

    public function getCompany()
    {
        $get = MasterCompany::where('name', $this->getUser()->company)->first();
        return $get;
    }

    public function getRisks()
    {
        $get = MasterRisks::orderBy('risk', 'asc')->get();
        return $get;
    }

    public function getVisitors()
    {
        $get = Visitor::orderBy('visit_nama', 'asc')->get();
        return $get;
    }

    //Ajax RISK
    public function get_risk($id)
    {
        $risk = MasterRisks::findOrFail($id);
        return isset($risk) && !empty($risk) ? Response()->json(['status' => 'SUCCESS', 'risk' => $risk]) : response(['status' => 'FAILED', 'risk' => []]);
    }

    // Ajax PIC
    public function getPic($id)
    {
        $pic = Visitor::findOrFail($id);
        return isset($pic) && !empty($pic) ? response()->json(['status' => 'SUCCESS', 'pic' => $pic]) : response()->json(['status' => 'FAILED', 'pic' => []]);
    }

    public function getColo($id)
    {
        $get = Colo::findOrFail($id);
        return $get;
    }

    // Show Internal Form
    public function internal_form()
    {
        $risks = $this->getRisks();
        $getRacks = MasterRack::whereHas('mCompanyId', function ($q) {
            $q->where('name', $this->getUser()->company);
        })->with(['mRoomId:id,name', 'mCompanyId:id,name'])->get();
        $visitors = $this->getVisitors();

        return view('internal.form', compact('risks', 'getRacks', 'visitors'));
    }

    public function review($id)
    {
        $colo = $this->getColo($id);
        $risks = $this->getRisks();
        $visitors = $this->getVisitors();
        // return $colo->histories;
        return view('internal.review', compact('colo', 'risks', 'visitors'));
    }

    public function dashboard()
    {
        $dept = $this->getUser()->department;
        return view('internal.dashboard', compact('dept'));
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
        return view('internal.checkoutForm', compact('getVisitor', 'getCard'));
    }

    public function penomoran()
    {
        $ar = AccessRequestInternal::with(['internal' => function($query){
            $query->orderBy('updated_at', 'asc');
        }])->get();
        $cr = ChangeRequestInternal::with(['internal' => function($query){
            $query->orderBy('updated_at', 'asc');
        }])->get();
        return view('internal.penomoran', compact('ar', 'cr'));
    }


    // Submit
    public function internal_create(StoreInternalRequest $request)
    {
        $getForm = $request->all();
        // dd($getForm);
        DB::beginTransaction();

        try {

            $insertForm = Colo::create([
                'requestor_id' => $this->getUser()->id,
                'work' => $getForm['work'],
                'visit' => $getForm['visit'],
                'leave' => $getForm['leave'],
                'isSurvey' => false,
                'background' => $getForm['background'],
                'desc' => $getForm['desc'],
                'testing' => $getForm['testing'],
                'rollback' => $getForm['rollback'],
            ]);

            $arrayRacks = [];
            foreach($getForm['rack'] as $k => $v) {
                $insertArray = [];
                if(isset($getForm['rack'][$k])) {
                    $insertArray = [
                        'colo_id' => $insertForm->id,
                        'm_rack_id' => $getForm['rack'][$k],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                    $arrayRacks[] = $insertArray;
                }
            }
            $p = ColoEntry::insert($arrayRacks);

            $arrayDetail = [];
            foreach ($getForm['time_start'] as $k => $v) {
                $insertArray = [];
                if (isset($getForm['time_start'][$k])) {

                    $insertArray = [
                        'colo_id' => $insertForm->id,
                        'time_start' => $getForm['time_start'][$k],
                        'time_end' => $getForm['time_end'][$k],
                        'activity' => $getForm['activity'][$k],
                        'service_impact' => $getForm['service_impact'][$k],
                        'item' => $getForm['item'][$k],
                        'procedure' => $getForm['activity'][$k],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                    $arrayDetail[] = $insertArray;
                }
            }
            ColoDetail::insert($arrayDetail);

            $arrayRisk = [];
            foreach ($getForm['risk'] as $k => $v) {
                $insertArray = [];
                if (isset($getForm['risk'][$k])) {

                    $insertArray = [
                        'colo_id' => $insertForm->id,
                        'm_risk_id' => $getForm['risk'][$k],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                    $arrayRisk[] = $insertArray;
                }
            }
            ColoRisk::insert($arrayRisk);

            $arrayVisitor = [];
            foreach ($getForm['name'] as $k => $v) {
                $insertArray = [];
                if (isset($getForm['name'][$k])) {

                    $insertArray = [
                        'colo_id' => $insertForm->id,
                        'm_visitor_id' => $getForm['name'][$k],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $arrayVisitor[] = $insertArray;
                }
            }
            ColoVisitor::insert($arrayVisitor);

            // foreach ([
            //     'eri.iskandar@balitower.co.id', 'hilman.fariqi@balitower.co.id',
            //     'ilham.pangestu@balitower.co.id', 'yoga.agus@balitower.co.id', 'yufdi.syafnizal@balitower.co.id', 'syukril@balitower.co.id',
            //     'khaidir.alamsyah@balitower.co.id', 'hendrik.andy@balitower.co.id', 'bayu.prakoso@balitower.co.id', 'mufli.gonibala@balitower.co.id',
            // ] as $recipient) {
            //     Mail::to($recipient)->send(new NotifInternalForm($notif_email));
            // }
            // return $insertForm;
            // Mail::to('bayu.prakoso@balitower.co.id')->send(new NotifInternalForm($insertForm));

            ColoHistory::create([
                'colo_id' => $insertForm->id,
                'created_by' => $this->getUser()->id,
                'role_to' => 'review',
                'status' => 'requested',
                'aktif' => true,
                'note' => null,
            ]);

            DB::commit();

            return redirect()->route('dashboardInternal', $this->getUser()->department)->with('success', 'Form Has Been Submited');
        } catch (\Exception $e) {
            DB::rollBack();
            // return back()->with('failed', $e->getMessage());
            throw $e;
        }
    }

    public function createFull($id)
    {
        ColoFull::create([
            'colo_id' => $id,
            'link' => ("https://dcops.balifiber.id/internal/pdf/$id"),
            'status' => 'Full Approved',
        ]);
    }

    public function createHistory($id, $role_to, $status)
    {
        ColoHistory::create([
            'colo_id' => $id,
            'created_by' => Auth::user()->id,
            'role_to' => $role_to,
            'status' => $status,
            'aktif' => true,
        ]);
    }

    // pdf
    public function internal_pdf($id)
    {
        $getForm = Internal::with('entry')->where('id', $id)->first();
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
        $colo = $this->getColo($id);
        $last_update = ColoHistory::where('colo_id', $id)->latest()->first();

        DB::beginTransaction();

        try {

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
            }

            // Pergantian  role tiap permit & send email notif
            $role_to = '';
            if ($last_update->role_to == 'review') {
                // foreach ([
                //     'eri.iskandar@balitower.co.id', 'hilman.fariqi@balitower.co.id',
                //     'ilham.pangestu@balitower.co.id', 'yoga.agus@balitower.co.id', 'yufdi.syafnizal@balitower.co.id', 'syukril@balitower.co.id',
                //     'khaidir.alamsyah@balitower.co.id', 'hendrik.andy@balitower.co.id', 'bayu.prakoso@balitower.co.id', 'mufli.gonibala@balitower.co.id',
                // ] as $recipient) {
                //     Mail::to($recipient)->send(new NotifInternalForm($notif_email));
                // }
                $role_to = 'check';
            } elseif ($last_update->role_to == 'check') {
                foreach ([
                    'bayu.prakoso@balitower.co.id',
                ] as $recipient) {
                    Mail::to($recipient)->send(new NotifInternalForm($colo));
                }
                $role_to = 'security';
            } elseif ($last_update->role_to == 'security') {
                // foreach ([
                //     'bayu.prakoso@balitower.co.id', 'tofiq.hidayat@balitower.co.id',
                // ] as $recipient) {
                //     Mail::to($recipient)->send(new NotifInternalForm($notif_email));
                // }
                $role_to = 'head';
            } elseif ($last_update->role_to = 'head') {
                // foreach ([
                //     'dc@balitower.co.id',
                // ] as $recipient) {
                //     Mail::to($recipient)->send(new NotifInternalFull($notif_email));
                // }
                $role_to = 'all';

                // Simpan permit ke table full approve
                $this->createFull($colo->id);
            }

            // Simpan tiap perubahan permit ke table CLeaningHistory
            $this->createHistory($colo->id, $role_to, $status);

            DB::commit();
            return redirect()->route('approvalView')->with('success', 'Approved');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('failed', $e->getMessage());
        }
    }

    // Reject
    public function internal_reject(Request $request, $id)
    {
        if ((Gate::denies('isSecurity')) && (Gate::denies('isVisitor'))) {

            $request->validate([
                'note' => ['required', 'string', 'max:255'],
            ]);

            $lastUpdate = InternalHistory::where('internal_id', $id)->latest()->first();
            $getForm = Internal::findOrFail($id);
            $getRequestor = $getForm->requestor->email;

            DB::beginTransaction();

            try {

                if ($lastUpdate->pdf == true) {

                    $lastUpdate->update(['aktif' => false]);
                    $getForm->update([
                        'reject_note' => $request->note,
                    ]);

                    // Simpan tiap perubahan permit ke table History
                    InternalHistory::create([
                        'internal_id' => $id,
                        'created_by' => Auth::user()->id,
                        'role_to' => 0,
                        'status' => 'rejected',
                        'aktif' => true,
                        'pdf' => false,
                    ]);

                    // Get permit yang di reject & kirim notif email
                    Mail::to($getRequestor)->send(new NotifInternalReject($getForm));

                    DB::commit();

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

    // Update Checkin
    public function internal_checkin_update(Request $request, $id)
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

            if($updateCard->m_card_id == null){

                $updateCard->update([
                    'm_card_id' => $request->card,
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

        $getID = InternalVisitor::where('id', Crypt::decrypt($id))->select('internal_id')->first();
        $permit = InternalVisitor::where('internal_id', $getID->internal_id)->where('checkout', null)->select('id')->count();
        // dd($permit);
        $extension = explode('/', explode(':', substr($request->photo_checkout, 0, strpos($request->photo_checkout, ';')))[1])[1];   // .jpg .png .pdf
        $replace = substr($request->photo_checkout, 0, strpos($request->photo_checkout, ',') + 1);
        $image = str_replace($replace, '', $request->photo_checkout);
        $image = str_replace(' ', '+', $image);
        $imageName = time() . '.' . $extension;

        Storage::disk('internalCheckout')->put($imageName, base64_decode($image));

        $lastAR = DB::table('access_request_internals')->latest()->first();
        $lastCR = DB::table('change_request_internals')->latest()->first();
        $internal_id = $getID->internal_id;

        DB::beginTransaction();

        try {

            $getVisitor = InternalVisitor::findOrFail(Crypt::decrypt($id));
            $getVisitor->update([
                'checkout' => $request->checkout,
                'photo_checkout' => $imageName,
                'is_done' => true,
            ]);

            if($permit == 1) {

                if(($lastAR == null) && ($lastCR == null)) {

                    $ar = 1;
                    $cr = 1;

                } elseif($lastCR == null){

                    $ar = $lastAR->number + 1;
                    $cr = 1;

                }
                else {

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
                // dd($ar);
                AccessRequestInternal::firstOrCreate([
                    'number' => $ar,
                    'month' => date('m'),
                    'year' => date('Y'),
                    'internal_id' => $internal_id,
                ]);

                ChangeRequestInternal::firstOrCreate([
                    'number' => $cr,
                    'month' => date('m'),
                    'year' => date('Y'),
                    'internal_id' => $internal_id,
                ]);
            }

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
        return redirect()->route('dashboardInternal', auth()->user()->department)->with('success', 'Cancelled');
    }

    // Yajra
    public function internal_yajra_history()
    {
        $history = DB::table('internal_histories')
            ->leftJoin('internals', 'internal_histories.internal_id', '=', 'internals.id')
            ->leftJoin('users', 'internal_histories.created_by', '=', 'users.id')
            ->where('internals.isColo', true)
            ->select('internal_histories.status', 'internal_histories.role_to', 'internal_histories.aktif', 'internal_histories.updated_at', 'internals.visit', 'users.name as updatedby', 'internals.id as id');
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
            ->leftJoin('users', 'internals.requestor_id', '=', 'users.id')
            ->select('internal_fulls.link', 'internal_visitors.name as visitor', 'internal_visitors.checkin', 'internal_visitors.checkout', 'internals.work', 'internals.id', 'internals.visit', 'internal_fulls.status', 'users.name as requestor')
            ->where('internal_visitors.deleted_at', null)
            ->where('internals.isColo', true)
            ->where('internal_fulls.status', 'Full Approved');
            // ->groupBy('internal_id');
        return Datatables::of($full)
            ->editColumn('visit', function ($full) {
                return $full->visit ? with(new Carbon($full->visit))->format('d/m/Y') : '';
            })
            ->addColumn('action', 'internal.actionLink')
            ->make(true);
    }

    public function internal_yajra_visitor($dept)
    {
        // dd($dept);
        // $full = DB::table('internals')
        //     ->join('internal_visitors', 'internals.id', '=', 'internal_visitors.internal_id')
        //     ->join('internal_fulls', 'internals.id', '=', 'internal_fulls.internal_id')
        //     ->join('users', 'internals.requestor_id', '=', 'users.id')
        //     ->leftJoin('m_cards', 'internals.m_card_id', '=', 'm_cards.id')
        //     ->select('internal_fulls.link', 'internal_visitors.name as visitor', 'internal_visitors.checkin', 'internal_visitors.checkout', 'internals.work', 'internals.leave', 'internal_visitors.id', 'internals.visit', 'internal_fulls.status', 'users.name as requestor', 'm_cards.number as card_number', 'internals.isSurvey')
        //     ->where('internal_visitors.deleted_at', null)
        //     ->where('users.department', $dept)
        //     ->where('internal_visitors.checkout', null)
        //     ->where('internal_fulls.status', 'Full Approved');
        $full = Colo::whereHas([
            'visitors' => function ($q) {
                $q->where('deleted_at', null);
            },
            // 'requestorId' => function ($q) use($dept){
            //     $q->where('department', $dept);
            // },
            ])->get();
            return $full;
        // return Datatables::of($full)
        //     ->editColumn('visit', function ($full) {
        //         return $full->visit ? with(new Carbon($full->visit))->format('d/m/Y') : '';
        //     })
        //     ->editColumn('leave', function ($full) {
        //         return $full->leave ? with(new Carbon($full->leave))->format('d/m/Y') : '';
        //     })
        //     ->addColumn('action', 'internal.actionEdit')
        //     ->make(true);
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
            ->select('internals.work', 'internals.visit', 'internals.leave', 'users.name as requestor', 'm_cards.number as card_number', 'internal_visitors.name', 'internal_visitors.checkin', 'internal_visitors.checkout', 'internals.id');
        return Datatables::of($getPermit)
            ->editColumn('visit', function ($getPermit) {
                return $getPermit->visit ? with(new Carbon($getPermit->visit))->format('d/m/Y') : '';
            })
            ->editColumn('leave', function ($getPermit) {
                return $getPermit->leave ? with(new Carbon($getPermit->leave))->format('d/m/Y') : '';
            })
            ->addColumn('action', 'internal.actionSelect')
            ->make(true);
    }
}
