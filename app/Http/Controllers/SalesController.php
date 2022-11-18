<?php

namespace App\Http\Controllers;

use App\Mail\{NotifSalesForm, NotifInternalFull, NotifInternalReject};
use App\Models\{AccessRequestInternal, ChangeRequestInternal, EntryRack, Internal, InternalFull, InternalHistory, InternalVisitor, MasterCard, Entry};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Crypt, DB, Mail, Storage, Gate};
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;

class SalesController extends Controller
{
    public function form()
    {
        return view('sales.form');
    }

    public function guest_form()
    {
        return view('sales.guestForm');
    }

    public function checkout_show($id)
    {
        $getVisitor = InternalVisitor::findOrFail(Crypt::decrypt($id));
        $getCard = DB::table('internals')
                ->join('m_cards', 'internals.m_card_id', '=', 'm_cards.id')
                ->where('internals.id', $getVisitor->internal_id)
                ->select('m_cards.number as card_number')
                ->first();
        return view('sales.checkoutForm', compact('getVisitor', 'getCard'));
    }

    public function checkout_update(Request $request, $id)
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

        $internal_id = $getID->internal_id;
        $lastAR = DB::table('access_request_internals')->latest()->first();

        DB::beginTransaction();

        try {

            $getVisitor = InternalVisitor::findOrFail(Crypt::decrypt($id));
            $getVisitor->update([
                'checkout' => $request->checkout,
                'photo_checkout' => $imageName,
                'is_done' => true,
            ]);

            if($permit == 1) {

                if($lastAR == null) {

                    $ar = 1;

                } else {

                    $ar = $lastAR->number + 1;

                    $lastyearAR = $lastAR->year;
                    $currrentYear = date('Y');

                    if ( $currrentYear != $lastyearAR ){

                        $ar = 1;
                    }
                }

                AccessRequestInternal::firstOrCreate([
                    'number' => $ar,
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

    public function store(Request $request)
    {
        $request->validate([
            'visit' => ['required', 'date'],
            'leave' => ['required', 'date', 'after_or_equal:visit'],
            'name' => ['nullable', 'max:255'],
            'number' => ['nullable', 'max:255'],
            'company' => ['nullable', 'max:255'],
            'department' => ['nullable', 'max:255'],
            'respon' => ['nullable', 'max:255'],
            'phone' => ['nullable', 'max:14'],
        ]);

        $getForm = $request->all();

        DB::beginTransaction();

        try {

            $insertForm = Internal::create([
                'requestor_id' => auth()->user()->id,
                'work' => 'Survey Data Center',
                'visit' => $getForm['visit'],
                'leave' => $getForm['leave'],
                'isColo' => false,
                'isSurvey' => true,
            ]);

            Entry::create([
                'internal_id' => $insertForm->id,
                'eksternal_id' => '',
                'dc' => true,
                'mmr1' => true,
                'mmr2' => true,
                'cctv' => true,
                'genset' => true,
                'panel' => true,
                'baterai' => true,
                'trafo' => true,
                'office1' => true,
                'fss' => true,
                'ups' => true,
                'yard' => true,
                'parking' => true,
                'lain' => true,
            ]);

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
                ->join('users', 'internals.requestor_id', '=', 'users.id')
                ->select('users.name as requestor', 'internals.id', 'internals.visit', 'internals.created_at as created', 'internals.work', 'internals.leave')
                ->where('internals.id', $insertForm->id)
                ->first();
            foreach ([
                'bayu.prakoso@balitower.co.id',
            ] as $recipient) {
                Mail::to($recipient)->send(new NotifSalesForm($notif_email));
            }

            InternalHistory::create([
                'internal_id' => $insertForm->id,
                'created_by' => auth()->user()->id,
                'role_to' => 'review',
                'status' => 'requested',
                'aktif' => true,
                'pdf' => false,
            ]);

            DB::commit();
            return redirect()->route('dashboardInternal', auth()->user()->department)->with('success', 'Form Has Been Submited');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('failed', $e->getMessage());
        }
    }

    public function pdf($id)
    {
        $getForm = Internal::findOrFail($id);
        $getLastHistory = InternalHistory::where('internal_id', $id)->where('aktif', 1)->first();
        $getLastHistory->update(['pdf' => true]);

        $getHistory = InternalHistory::where('internal_id', $id)
                ->join('users', 'users.id', '=', 'internal_histories.created_by')
                ->select('internal_histories.*', 'users.name as createdby')
                ->get();

        $nomorAR = AccessRequestInternal::where('internal_id', $id)->first();
        $pdf = PDF::loadview('sales.pdf', compact('getForm', 'getLastHistory', 'getHistory', 'nomorAR'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream();
    }

    public function approve($id)
    {
        $last_update = InternalHistory::where('internal_id', $id)->latest()->first();

        $notif_email = DB::table('internals')
                ->join('internal_histories', 'internals.id', '=', 'internal_histories.internal_id')
                ->join('users', 'internals.requestor_id', '=', 'users.id')
                ->select('users.name as requestor', 'internal_histories.aktif', 'internals.id', 'internals.visit', 'internals.created_at as created', 'internals.work', 'internals.leave', 'internal_histories.status')
                ->where('internals.id', $id)
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
                    $status = 'acknowledge';
                } elseif ($last_update->status == 'acknowledge') {
                    $status = 'final';
                }

                // Pergantian  role tiap permit & send email notif
                $role_to = '';
                if ($last_update->role_to == 'review') {
                    foreach ([
                        'bayu.prakoso@balitower.co.id',
                    ] as $recipient) {
                        Mail::to($recipient)->send(new NotifSalesForm($notif_email));
                    }
                    $role_to = 'security';
                } elseif ($last_update->role_to == 'security') {
                    foreach ([
                        'bayu.prakoso@balitower.co.id',
                    ] as $recipient) {
                        Mail::to($recipient)->send(new NotifSalesForm($notif_email));
                    }
                    $role_to = 'head';
                } elseif ($last_update->role_to = 'head') {
                    foreach ([
                        'bayu.prakoso@balitower.co.id',
                    ] as $recipient) {
                        Mail::to($recipient)->send(new NotifInternalFull($notif_email));
                    }
                    $role_to = 'all';

                    InternalFull::create([
                        'internal_id' => $id,
                        // 'link' => ("https://dcops.balifiber.id/sales/pdf/$id"),
                        'link' => ("http://localhost:8000/sales/pdf/$id"),
                        'note' => null,
                        'status' => 'Full Approved',
                    ]);
                }

                // Simpan tiap perubahan permit ke table CLeaningHistory
                InternalHistory::create([
                    'internal_id' => $id,
                    'created_by' => auth()->user()->id,
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

    public function reject(Request $request, $id)
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
                        'created_by' => auth()->user()->id,
                        'role_to' => 0,
                        'status' => 'rejected',
                        'aktif' => true,
                        'pdf' => false,
                    ]);

                    DB::commit();

                    // Get permit yang di reject & kirim notif email
                    Mail::to($getRequestor)->send(new NotifInternalReject($getForm));

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

    public function yajra_history()
    {
        $history = DB::table('internal_histories')
            ->leftJoin('internals', 'internal_histories.internal_id', '=', 'internals.id')
            ->leftJoin('users', 'internal_histories.created_by', '=', 'users.id')
            ->where('internals.isSurvey', true)
            ->select('internal_histories.status', 'internal_histories.role_to', 'internal_histories.aktif', 'internal_histories.updated_at', 'internals.visit', 'users.name as updatedby', 'internals.id as id');
        return Datatables::of($history)
            ->editColumn('visit', function ($history) {
                return $history->visit ? with(new Carbon($history->visit))->format('d/m/Y') : '';
            })
            ->make(true);
    }

    public function yajra_full_approval()
    {
        $full = DB::table('internals')
            ->join('internal_visitors', 'internals.id', '=', 'internal_visitors.internal_id')
            ->join('internal_fulls', 'internals.id', '=', 'internal_fulls.internal_id')
            ->select('internal_fulls.link', 'internal_visitors.name as visitor', 'internal_visitors.checkin', 'internal_visitors.checkout', 'internals.work', 'internals.id', 'internals.visit', 'internal_fulls.status')
            ->where('internals.isSurvey', true)
            ->where('internal_visitors.deleted_at', null)
            ->where('internal_fulls.status', 'Full Approved');
        return Datatables::of($full)
            ->editColumn('visit', function ($full) {
                return $full->visit ? with(new Carbon($full->visit))->format('d/m/Y') : '';
            })
            ->addColumn('action', 'sales.actionLink')
            ->make(true);
    }

    public function yajra_show($dept)
    {
        $full = DB::table('internals')
            ->join('internal_visitors', 'internals.id', '=', 'internal_visitors.internal_id')
            ->join('internal_fulls', 'internals.id', '=', 'internal_fulls.internal_id')
            ->join('users', 'internals.requestor_id', '=', 'users.id')
            ->leftJoin('m_cards', 'internals.m_card_id', '=', 'm_cards.id')
            ->select('internal_fulls.link', 'internal_visitors.name as visitor', 'internal_visitors.checkin', 'internal_visitors.checkout', 'internals.work', 'internals.leave', 'internal_visitors.id', 'internals.visit', 'internal_fulls.status', 'users.name as requestor', 'm_cards.number as card_number')
            ->where('internal_visitors.deleted_at', null)
            ->where('users.department', $dept)
            ->where('internal_visitors.checkout', null)
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
}
