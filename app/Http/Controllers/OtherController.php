<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session, Storage};
use App\Models\{Other, OtherFull, OtherHistory, OtherPersonil, Rutin, TroubleshootBm, TroubleshootBmDetail, TroubleshootBmEntry, TroubleshootBmFull, TroubleshootBmHistory, TroubleshootBmPersonil, TroubleshootBmRisk, Visitor, PenomoranAR, PenomoranCR};
use App\Mail\{NotifMaintenanceForm, NotifMaintenanceFull, NotifMaintenanceReject, NotifTroubleshootForm, NotifTroubleshootFull, NotifTroubleshootReject};
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseFormatSame;
use Yajra\Datatables\Datatables;
use App\Exports\{MaintenanceExport, TroubleshootExport};
use Carbon\Carbon;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;

class OtherController extends Controller
{

    // ---------------------------------------------------- MAINTENANCE ---------------------------------------------------------


    // Show Pages
    public function show_maintenance_form() // Menampilkan form maintenance
    {
        $personil = Visitor::all();
        $pilihanwork = Rutin::all();
        return view('other.maintenance_form', compact('personil', 'pilihanwork'));
    }

    public function show_maintenance_full() // Menampilkan list permit full approved dari sisi visitor
    {
        return view('cleaning.full_visitor');
    }

    public function show_maintenance_reject() // Menampilkan list permit reject dari sisi visitor
    {
        return view('other.maintenance_list_reject');
    }

    public function maintenance_checkin_show($id)
    {
        $getVisitor = OtherPersonil::findOrFail($id);
        $personil = Visitor::all();
        return view('other.maintenance_checkin', compact('getVisitor', 'personil'));
    }

    public function maintenance_checkout_show($id)
    {
        $getVisitor = OtherPersonil::findOrFail($id);
        return view('other.maintenance_checkout', compact('getVisitor'));
    }



    // Submit Form
    public function maintenance_store(Request $request) // Submit form maintenance
    {
        // Get all data request
        // dd($request->all());
        $data = $request->all();
        $work = Rutin::find($data['work'])->work;

        $request->validate([
            'work' => ['required', 'string', 'max:255'],
            'visit' => ['required', 'after:yesterday'],
            'leave' => ['required', 'after_or_equal:visit'],
            'time_start_1' => ['required'],
            'time_end_1' => ['required'],
        ]);

        $ar = PenomoranAR::latest()->first();
        $cr = PenomoranCR::latest()->first();

        if((!$ar) && (!$cr)){

            $i = 1;
            $k = 1;
        } elseif(($ar->number) && ($cr->number)){

            $i = $ar->number + 1;
            $k = $cr->number + 1;
        }

        if(isset($ar)){
            // dd($i);
            $lastYearAR = $ar->yearly;
            $lastYearCR = $cr->yearly;
            $currrentYear = date('Y');

            if (( $currrentYear != $lastYearAR ) && ( $currrentYear != $lastYearCR )){
                $i = 1;
                $k = 1;
            }
        }

        DB::beginTransaction();

        try {

            $ar = PenomoranAR::create([
                'id' => Str::uuid(),
                'number' => $i,
                'monthly' => date('m'),
                'yearly' => date('Y'),
            ]);

            $cr = PenomoranCR::create([
                'id' => Str::uuid(),
                'number' => $k,
                'monthly' => date('m'),
                'yearly' => date('Y'),
            ]);

            $otherForm = Other::create([
                'penomoranar_id' => $ar->id,
                'penomorancr_id' => $cr->id,
                'work' => $work,
                'visit' => $request->visit,
                'leave' => $request->leave,
                'background' => $request->background,
                'desc' => $request->describ,
                'testing' => $request->testing,
                'rollback' => $request->rollback,
                'loc1' => $request->loc1,
                'loc2' => $request->loc2,
                'loc3' => $request->loc3,
                'loc4' => $request->loc4,
                'loc5' => $request->loc5,
                'loc5' => $request->loc5,
                'loc6' => $request->loc6,
                'loc7' => $request->loc7,
                'loc8' => $request->loc8,
                'loc9' => $request->loc9,
                'loc10' => $request->loc10,
                'loc11' => $request->parking,
                'loc12' => $request->loc12,
                'loc13' => $request->loc13,
                'loc14' => $request->loc14,
                'time_start_1' => $request->time_start_1,
                'time_start_2' => $request->time_start_2,
                'time_start_3' => $request->time_start_3,
                'time_start_4' => $request->time_start_4,
                'time_start_5' => $request->time_start_5,
                'time_end_1' => $request->time_end_1,
                'time_end_2' => $request->time_end_2,
                'time_end_3' => $request->time_end_3,
                'time_end_4' => $request->time_end_4,
                'time_end_5' => $request->time_end_5,
                'activity_1' => $request->activity_1,
                'activity_2' => $request->activity_2,
                'activity_3' => $request->activity_3,
                'activity_4' => $request->activity_4,
                'activity_5' => $request->activity_5,
                'detail_1' => $request->detail_1,
                'detail_2' => $request->detail_2,
                'detail_3' => $request->detail_3,
                'detail_4' => $request->detail_4,
                'detail_5' => $request->detail_5,
                'item_1' => $request->item_1,
                'item_2' => $request->item_2,
                'item_3' => $request->item_3,
                'item_4' => $request->item_4,
                'item_5' => $request->item_5,
                'procedure_1' => $request->procedure_1,
                'procedure_2' => $request->procedure_2,
                'procedure_3' => $request->procedure_3,
                'procedure_4' => $request->procedure_4,
                'procedure_5' => $request->procedure_5,
                'risk_1' => $request->risk_1,
                'risk_2' => $request->risk_2,
                'risk_3' => $request->risk_3,
                'risk_4' => $request->risk_4,
                'risk_5' => $request->risk_5,
                'poss_1' => $request->poss_1,
                'poss_2' => $request->poss_2,
                'poss_3' => $request->poss_3,
                'poss_4' => $request->poss_4,
                'poss_5' => $request->poss_5,
                'impact_1' => $request->impact_1,
                'impact_2' => $request->impact_2,
                'impact_3' => $request->impact_3,
                'impact_4' => $request->impact_4,
                'impact_5' => $request->impact_5,
                'mitigation_1' => $request->mitigation_1,
                'mitigation_2' => $request->mitigation_2,
                'mitigation_3' => $request->mitigation_3,
                'mitigation_4' => $request->mitigation_4,
                'mitigation_5' => $request->mitigation_5,
            ]);

            $p = [];
            foreach ($data['visit_nama'] as $k => $v) {
                $data_dump = [];
                if (isset($data['visit_nama'][$k])) {
                    $personil[] = Visitor::find($v)->visit_nama;
                    $data_dump = [
                        'other_id' => $otherForm->id,
                        'name' => $personil[$k],
                        'company' => $data['visit_company'][$k],
                        'respon' => $data['visit_respon'][$k],
                        'department' => $data['visit_department'][$k],
                        'number' => $data['visit_nik'][$k],
                        'phone' => $data['visit_phone'][$k],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $p[] = $data_dump;
                }
            }
            $personil = OtherPersonil::insert($p);

            // foreach ([
            //     'taufik.ismail@balitower.co.id', 'eri.iskandar@balitower.co.id', 'hilman.fariqi@balitower.co.id',
            //     'ilham.pangestu@balitower.co.id', 'irwan.trisna@balitower.co.id', 'yoga.agus@balitower.co.id', 'yufdi.syafnizal@balitower.co.id',
            //     'khaidir.alamsyah@balitower.co.id', 'hendrik.andy@balitower.co.id', 'bayu.prakoso@balitower.co.id', 'dyah.retno@balitower.co.id',
            // ] as $recipient) {
            //     Mail::to($recipient)->send(new NotifMaintenanceForm($otherForm));
            // }

            $log = OtherHistory::insert([
                'other_id' => $otherForm->id,
                'created_by' => Auth::user()->name,
                'role_to' => 'review',
                'status' => 'requested',
                'aktif' => true,
                'pdf' => false,
                'updated_at' => now(),
                'created_at' => now(),
            ]);

            DB::commit();

            return $log ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

    }

    public function maintenance_approve(Request $request) // Flow Approval form maintenance
    {
        $lastupdate = OtherHistory::where('other_id', '=', $request->other_id)->latest()->first();

        DB::beginTransaction();

        try {

            if ($lastupdate->pdf == true) {
                $lastupdate->update(['aktif' => false]);

                // Perubahan status tiap permit
                $status = '';
                if ($lastupdate->status == 'requested') {
                    $status = 'reviewed';
                } elseif ($lastupdate->status == 'reviewed') {
                    $status = 'checked';
                } elseif ($lastupdate->status == 'checked') {
                    $status = 'acknowledge';
                } elseif ($lastupdate->status == 'acknowledge') {
                    $status = 'final';
                } elseif ($lastupdate->status == 'final') {
                    $full_maintenance = Other::find($request->other_id)->first();
                }

                $notif_email = Other::find($lastupdate->other_id);
                // // Pergantian  role tiap permit & send email notif
                $role_to = '';
                if ($lastupdate->role_to == 'review') {
                    foreach ([
                        'taufik.ismail@balitower.co.id', 'eri.iskandar@balitower.co.id', 'hilman.fariqi@balitower.co.id',
                        'ilham.pangestu@balitower.co.id', 'irwan.trisna@balitower.co.id', 'yoga.agus@balitower.co.id', 'yufdi.syafnizal@balitower.co.id',
                        'khaidir.alamsyah@balitower.co.id', 'hendrik.andy@balitower.co.id', 'bayu.prakoso@balitower.co.id',
                    ] as $recipient) {
                        Mail::to($recipient)->send(new NotifMaintenanceForm($notif_email));
                    }
                    $role_to = 'check';
                } elseif ($lastupdate->role_to == 'check') {
                    foreach (['security.bacep@balitower.co.id'] as $recipient) {
                        Mail::to($recipient)->send(new NotifMaintenanceForm($notif_email));
                    }
                    $role_to = 'security';
                } elseif ($lastupdate->role_to == 'security') {
                    foreach (['bayu.prakoso@balitower.co.id', 'tofiq.hidayat@balitower.co.id'] as $recipient) {
                        Mail::to($recipient)->send(new NotifMaintenanceForm($notif_email));
                    }
                    $role_to = 'head';
                } elseif ($lastupdate->role_to = 'head') {
                    $full = Other::find($request->other_id);
                    foreach (['dc@balitower.co.id'] as $recipient) {
                        Mail::to($recipient)->send(new NotifMaintenanceFull($full));
                    }
                    $role_to = 'all';

                    $full_maintenance = Other::where('id', $request->other_id)->first();
                    OtherFull::create([
                        'other_id' => $full_maintenance->id,
                        'work' => $full_maintenance->work,
                        'request' => $full_maintenance->created_at,
                        'visit' => $full_maintenance->visit,
                        'leave' => $full_maintenance->leave,
                        'link' => ("https://dcops.balifiber.id/maintenance-pdf/$full_maintenance->id"),
                        // 'link' => ("http://localhost:8000/maintenance-pdf/$full_maintenance->id"),
                        'note' => null,
                        'status' => 'Full Approved',
                    ]);
                }

                // Simpan tiap perubahan permit ke table CLeaningHistory
                $otherHistory = OtherHistory::create([
                    'other_id' => $request->other_id,
                    'created_by' => Auth::user()->name,
                    'role_to' => $role_to,
                    'status' => $status,
                    'aktif' => true,
                    'pdf' => false,
                ]);

                DB::commit();
            }

            return $otherHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

    }

    public function maintenance_reject(Request $request) // Untuk reject permit maintenance
    {
        // Get permit terbaru by ID Permit
        $lastupdate = OtherHistory::where('other_id', '=', $request->other_id)->latest()->first();

        DB::beginTransaction();

        try {

            if ($lastupdate->pdf == true) {
                $lastupdate->update(['aktif' => false]);

                // Simpan tiap perubahan permit ke table CleaningHistory
                $history = OtherHistory::create([
                    'other_id' => $request->other_id,
                    'created_by' => Auth::user()->name,
                    'role_to' => 0,
                    'status' => 'rejected',
                    'aktif' => true,
                    'pdf' => false,
                ]);

                // Get permit yang di reject & kirim notif email
                $maintenance_reject = Other::find($request->other_id);
                foreach (['badai.sino@balitower.co.id', 'bayu.prakoso@balitower.co.id'] as $recipient) {
                    Mail::to($recipient)->send(new NotifMaintenanceReject($maintenance_reject));
                }

                DB::commit();

                return $history->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }



    // Update Checkin Maintenance
    public function maintenance_checkin_update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
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

        Storage::disk('maintenanceCheckin')->put($imageName, base64_decode($image));

        DB::beginTransaction();

        try {

            $updatePersonil = OtherPersonil::findOrFail($id);
            $updatePersonil->update([
                'name' => $request->name,
                'company' => $request->company,
                'department' => $request->department,
                'number' => $request->number,
                'phone' => $request->phone,
                'respon' => $request->respon,
                'checkin' => $request->checkin,
                'photo_checkin' => $imageName,
            ]);

            Visitor::firstOrCreate([
                'visit_nama' => $request->name,
                'visit_company' => $request->company,
                'visit_department' => $request->department,
                'visit_respon' => $request->respon,
                'visit_phone' => $request->phone,
                'visit_nik' => $request->number,
            ]);

            DB::commit();

            return redirect()->route('logall')->with('success', 'Checkin Has Been Successful');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

    }

    public function maintenance_checkout_update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'checkout' => ['required'],
            'photo_checkout' => ['required'],
        ]);

        $extension = explode('/', explode(':', substr($request->photo_checkout, 0, strpos($request->photo_checkout, ';')))[1])[1];   // .jpg .png .pdf
        $replace = substr($request->photo_checkout, 0, strpos($request->photo_checkout, ',') + 1);
        $image = str_replace($replace, '', $request->photo_checkout);
        $image = str_replace(' ', '+', $image);
        $imageName = Str::random(200) .  '.' . $extension;
        // dd($imageName);

        Storage::disk('maintenanceCheckout')->put($imageName, base64_decode($image));

        DB::beginTransaction();

        try {

            $updatePersonil = OtherPersonil::findOrFail($id);
            $updatePersonil->update([
                'checkout' => $request->checkout,
                'photo_checkout' => $imageName,
            ]);

            DB::commit();

            return redirect()->route('logall')->with('success', 'Checkout Successful');
        } catch(\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function maintenance_checkin_cancel($id)
    {
        // dd($id);
        DB::beginTransaction();

        try {

            OtherPersonil::findOrFail($id)->delete();

            DB::commit();

            return redirect()->route('logall')->with('success', 'Canceled');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }


    }



    // Convert pdf
    public function maintenance_pdf($id) // Convert PDF permit maintenance
    {
        $getOther = Other::find($id);
        $getLastOther = OtherHistory::where('other_id', $id)->where('aktif', 1)->first();
        $getPersonil = OtherPersonil::where('other_id', $id)->get();
        // dd($getPersonil);
        $getLastOther->update(['pdf' => true]);

        $getHistory = DB::table('other_histories')
            ->join('others', 'others.id', '=', 'other_histories.other_id')
            ->where('other_histories.other_id', '=', $id)
            ->select('other_histories.*')
            ->get();
        $pdf = PDF::loadview('other.maintenance_pdf', compact('getOther', 'getPersonil', 'getHistory', 'getLastOther'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream();
    }



    // Export Excel
    public function maintenance_export_full_approval()
    {
        return Excel::download(new MaintenanceExport, 'Full Approve Maintenance.xlsx');
    }



    // Yajra Datatables
    public function maintenance_yajra_history() // Get log permit maintenance by yajra
    {
        $history_maintenance = DB::table('other_histories')
            ->join('others', 'others.id', '=', 'other_histories.other_id')
            ->select('other_histories.*', 'others.visit');
        return Datatables::of($history_maintenance)
            ->editColumn('visit', function ($history_maintenance) {
                return $history_maintenance->visit ? with(new Carbon($history_maintenance->visit))->format('d/m/Y') : '';
            })
            ->make(true);
    }

    public function maintenance_yajra_full_visitor() // Get data permit full approve versi visitor
    {
        $full_visitor = DB::table('others')
            ->join('other_fulls', 'others.id', '=', 'other_fulls.other_id')
            ->join('other_personils', 'others.id', '=', 'other_personils.other_id')
            ->where('other_fulls.status', 'Full Approved')
            ->where('other_personils.checkout',  null)
            ->where('other_personils.deleted_at', null)
            ->select('other_fulls.visit', 'other_fulls.leave', 'other_fulls.work', 'other_personils.id', 'other_personils.checkin', 'other_personils.checkout', 'other_personils.name');
        return Datatables::of($full_visitor)
            ->editColumn('visit', function ($full_visitor) {
                return $full_visitor->visit ? with(new Carbon($full_visitor->visit))->format('d/m/Y') : '';
            })
            ->editColumn('leave', function ($full_visitor) {
                return $full_visitor->leave ? with(new Carbon($full_visitor->leave))->format('d/m/Y') : '';
            })
            ->addColumn('action', 'other.maintenanceActionEdit')
            ->make(true);
    }

    public function maintenance_yajra_full_approval() // Get data permit full approve versi approval
    {
        $full_approval = DB::table('others')
            ->join('other_personils', 'others.id', '=', 'other_personils.other_id')
            ->join('other_fulls', 'others.id', '=', 'other_fulls.other_id')
            ->where('other_fulls.status', 'Full Approved')
            ->where('other_personils.deleted_at', null)
            ->select('other_fulls.*', 'other_personils.checkin', 'other_personils.checkout', 'other_personils.name');
        return Datatables::of($full_approval)
            ->editColumn('visit', function ($full_approval) {
                return $full_approval->visit ? with(new Carbon($full_approval->visit))->format('d/m/Y') : '';
            })
            ->addColumn('action', 'other.maintenanceActionLink')
            ->make(true);
    }

    public function yajra_full_reject_maintenance() // Get data permit reject
    {
        $getFull = DB::table('other_fulls')
            ->select(['other_id', 'visit', 'note', 'work'])
            ->where('note', '!=', null)
            ->orderBy('other_id', 'desc');
        return Datatables::of($getFull)
            ->editColumn('visit', function ($getFull) {
                return $getFull->visit ? with(new Carbon($getFull->visit))->format('d/m/Y') : '';
            })
            ->make(true);
    }





    // ----------------------------------------------------------------------------- TROUBLESHOOT -----------------------------------------------------------------



    // Show Pages
    public function troubleshoot_form() // Menampilkan form troubleshoot
    {
        $personil = Visitor::all();
        return view('other.troubleshoot_form', compact('personil'));
    }

    public function show_troubleshoot_reject()
    {
        return view('other.troubleshoot_list_reject');
    }

    public function troubleshoot_checkin_show($id)
    {
        $getVisitor = TroubleshootBmPersonil::findOrFail($id);
        return view('other.troubleshoot_checkin', compact('getVisitor'));
    }

    public function troubleshoot_checkout_show($id)
    {
        $getVisitor = TroubleshootBmPersonil::findOrFail($id);
        return view('other.troubleshoot_checkout', compact('getVisitor'));
    }



    // Retrieving Data From DB
    public function get_rutin($id) // Data Permit Rutin
    {
        $permit = Rutin::findOrFail($id);
        return isset($permit) && !empty($permit) ? response()->json(['status' => 'SUCCESS', 'permit' => $permit]) : response(['status' => 'FAILED', 'permit' => []]);
    }

    public function get_visitor($id) // Data Visitor
    {
        $visitor = Visitor::findOrFail($id);
        return isset($visitor) && !empty($visitor) ? Response()->json(['status' => 'SUCCESS', 'visitor' => $visitor]) : response(['status' => 'FAILED', 'visitor' => []]);
    }



    // Store
    public function troubleshoot_store(Request $request) // Submit form troubleshoot
    {
        // Validasi data dari request
        $request->validate([
            'work' => ['required', 'string', 'max:255'],
            'visit' => ['required'],
            'leave' => ['required', 'after_or_equal:visit'],
            'background' => ['required', 'string', 'max:255'],
            'desc' => ['required', 'string', 'max:255'],
            'testing' => ['nullable', 'max:255'],
            'rollback' => ['nullable', 'max:255'],
        ]);

        $ar = PenomoranAR::latest()->first();
        $cr = PenomoranCR::latest()->first();
        // dd($ar->yearly);

        if((!$ar) && (!$cr)){

            $i = 1;
            $l= 1;
        } elseif(($ar->number) && ($cr->number)){

            $i = $ar->number + 1;
            $l= $cr->number + 1;
        }

        if(isset($ar)){
            // dd($i);
            $lastYearAR = $ar->yearly;
            $lastYearCR = $cr->yearly;
            $currrentYear = date('Y');

            if (( $currrentYear != $lastYearAR ) && ( $currrentYear != $lastYearCR )){
                $i = 1;
                $l= 1;
            }
        }

        DB::beginTransaction();

        try {

            $ar = PenomoranAR::create([
                'id' => Str::uuid(),
                'number' => $i,
                'monthly' => date('m'),
                'yearly' => date('Y'),
            ]);

            $cr = PenomoranCR::create([
                'id' => Str::uuid(),
                'number' => $l,
                'monthly' => date('m'),
                'yearly' => date('Y'),
            ]);

            $input = $request->all();
            $other_form = TroubleshootBm::create([
                'penomoranar_id' => $ar->id,
                'penomorancr_id' => $cr->id,
                'work' => $input['work'],
                'visit' => $input['visit'],
                'leave' => $input['leave'],
                'background' => $input['background'],
                'desc' => $input['desc'],
                'testing' => $input['testing'],
                'rollback' => $input['rollback'],
            ]);

            $other_entry = TroubleshootBmEntry::create([
                'troubleshoot_bm_id' => $other_form->id,
                'dc' => $request->dc,
                'mmr1' => $request->mmr2,
                'mmr2' => $request->mmr2,
                'ups' => $request->ups,
                'fss' => $request->fss,
                'trafo' => $request->trafo,
                'panel' => $request->panel,
                'baterai' => $request->baterai,
                'generator' => $request->generator,
                'yard' => $request->yard,
                'parking' => $request->parking,
                'lain' => $request->lain,
            ]);

            $insert_detail = [];
            foreach ($input['time_start'] as $k => $v) {
                $detail_array = [];
                if (isset($input['time_start'][$k])) {

                    $detail_array = [
                        'troubleshoot_bm_id' => $other_form->id,
                        'time_start' => $input['time_start'][$k],
                        'time_end' => $input['time_end'][$k],
                        'activity' => $input['activity'][$k],
                        'service_impact' => $input['service_impact'][$k],
                        'item' => $input['item'][$k],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $insert_detail[] = $detail_array;
                }
            }
            $other_detail = TroubleshootBmDetail::insert($insert_detail);

            $insert_risk = [];
            foreach ($input['risk'] as $k => $v) {
                $risk_array = [];
                if (isset($input['risk'][$k])) {

                    $risk_array = [
                        'troubleshoot_bm_id' => $other_form->id,
                        'risk' => $input['risk'][$k],
                        'poss' => $input['poss'][$k],
                        'impact' => $input['impact'][$k],
                        'mitigation' => $input['mitigation'][$k],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $insert_risk[] = $risk_array;
                }
            }
            $other_risk = TroubleshootBmRisk::insert($insert_risk);

            $insert_personil = [];
            foreach ($input['visit_nama'] as $k => $v) {
                $personil_array = [];
                if (isset($input['visit_nama'][$k])) {
                    $personil[] = Visitor::find($v)->visit_nama;
                    $personil_array = [
                        'troubleshoot_bm_id' => $other_form->id,
                        'nama' => $personil[$k],
                        'company' => $input['visit_company'][$k],
                        'department' => $input['visit_department'][$k],
                        'respon' => $input['visit_respon'][$k],
                        'phone' => $input['visit_phone'][$k],
                        'numberId' => $input['visit_nik'][$k],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $insert_personil[] = $personil_array;
                }
            }
            $other_personil = TroubleshootBmPersonil::insert($insert_personil);

            // $notif_email = TroubleshootBm::find($other_form->id);
            // foreach ([
            //     'taufik.ismail@balitower.co.id', 'eri.iskandar@balitower.co.id', 'hilman.fariqi@balitower.co.id',
            //     'ilham.pangestu@balitower.co.id', 'irwan.trisna@balitower.co.id', 'yoga.agus@balitower.co.id', 'yufdi.syafnizal@balitower.co.id',
            //     'khaidir.alamsyah@balitower.co.id', 'hendrik.andy@balitower.co.id', 'bayu.prakoso@balitower.co.id', 'dyah.retno@balitower.co.id',
            // ] as $recipient) {
            //     Mail::to($recipient)->send(new NotifTroubleshootForm($notif_email));
            // }

            $log_troubleshoot = TroubleshootBmHistory::insert([
                'troubleshoot_bm_id' => $other_form->id,
                'created_by' => Auth::user()->id,
                'role_to' => 'review',
                'status' => 'requested',
                'aktif' => true,
                'pdf' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();

            return $log_troubleshoot ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function troubleshoot_approve(Request $request) // Flow Approval form troubleshoot
    {
        $last_update = TroubleshootBmHistory::where('troubleshoot_bm_id', '=', $request->id)->latest()->first();

        if($last_update->pdf == false) {
            return back()->with('failed', 'failed');
        }

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
            } elseif ($last_update->status == 'final') {
                $full_troubleshoot = TroubleshootBm::find($request->id)->first();
            }

            $notif_email = TroubleshootBm::find($last_update->troubleshoot_bm_id);
            // // Pergantian  role tiap permit & send email notif
            $role_to = '';
            if ($last_update->role_to == 'review') {
                foreach ([
                    'taufik.ismail@balitower.co.id', 'eri.iskandar@balitower.co.id', 'hilman.fariqi@balitower.co.id',
                    'ilham.pangestu@balitower.co.id', 'irwan.trisna@balitower.co.id', 'yoga.agus@balitower.co.id', 'yufdi.syafnizal@balitower.co.id',
                    'khaidir.alamsyah@balitower.co.id', 'hendrik.andy@balitower.co.id', 'bayu.prakoso@balitower.co.id',
                ] as $recipient) {
                    Mail::to($recipient)->send(new NotifTroubleshootForm($notif_email));
                }
                $role_to = 'check';
            } elseif ($last_update->role_to == 'check') {
                foreach (['security.bacep@balitower.co.id'] as $recipient) {
                    Mail::to($recipient)->send(new NotifTroubleshootForm($notif_email));
                }
                $role_to = 'security';
            } elseif ($last_update->role_to == 'security') {
                foreach (['bayu.prakoso@balitower.co.id', 'tofiq.hidayat@balitower.co.id'] as $recipient) {
                    Mail::to($recipient)->send(new NotifTroubleshootForm($notif_email));
                }
                $role_to = 'head';
            } elseif ($last_update->role_to = 'head') {
                $full = TroubleshootBm::find($request->id);
                foreach (['dc@balitower.co.id'] as $recipient) {
                    Mail::to($recipient)->send(new NotifTroubleshootFull($full));
                }
                $role_to = 'all';

                $full_troubleshoot = TroubleshootBm::where('id', $request->id)->first();
                // dd($full_troubleshoot);
                TroubleshootBmFull::create([
                    'troubleshoot_bm_id' => $full_troubleshoot->id,
                    'work' => $full_troubleshoot->work,
                    'request' => $full_troubleshoot->created_at,
                    'visit' => $full_troubleshoot->visit,
                    'leave' => $full_troubleshoot->leave,
                    'link' => ("https://dcops.balifiber.id/troubleshoot-pdf/$full_troubleshoot->id"),
                    // 'link' => ("http://localhost:8000/troubleshoot-pdf/$full_troubleshoot->id"),
                    'note' => null,
                    'status' => 'Full Approved',
                ]);
            }

            // Simpan tiap perubahan permit ke table CLeaningHistory
            $log = TroubleshootBmHistory::create([
                'troubleshoot_bm_id' => $request->id,
                'created_by' => Auth::user()->id,
                'role_to' => $role_to,
                'status' => $status,
                'aktif' => true,
                'pdf' => false,
            ]);

            DB::commit();
            return $log->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function troubleshoot_reject(Request $request) // Reject permit troubleshoot
    {
        dd($request->all());
        $lastupdate = TroubleshootBmHistory::where('troubleshoot_bm_id', '=', $request->id)->latest()->first();
        if ($lastupdate->pdf == false) {
            return back()->with('failed', 'Failed');
        }

        DB::beginTransaction();

        try {

            $lastupdate->update(['aktif' => false]);

            // Simpan tiap perubahan permit ke table CleaningHistory
            $history = TroubleshootBmHistory::create([
                'troubleshoot_bm_id' => $request->id,
                'created_by' => Auth::user()->id,
                'role_to' => 0,
                'status' => 'rejected',
                'aktif' => true,
                'pdf' => false,
            ]);

            // Get permit yang di reject & kirim notif email
            $notif_email = TroubleshootBm::find($request->id);
            foreach (['bayu.prakoso@balitower.co.id', 'badai.sino@balitower.co.id'] as $recipient) {
                Mail::to($recipient)->send(new NotifTroubleshootReject($notif_email));
            }

            DB::commit();
            return $history->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }



    // Update Checkin Checkout Troubleshoot
    public function troubleshoot_checkin_update(Request $request, $id)
    {
        // dd($request->all());

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'number' => ['required', 'string', 'max:255'],
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

        Storage::disk('troubleshootCheckin')->put($imageName, base64_decode($image));

        DB::beginTransaction();

        try {

            $getVisitor = TroubleshootBmPersonil::findOrFail($id);
            $getVisitor->update([
                'nama' => $request->name,
                'company' => $request->company,
                'department' => $request->department,
                'respon' => $request->respon,
                'phone' => $request->phone,
                'numberId' => $request->number,
                'checkin' => $request->checkin,
                'photo_checkin' => $imageName,
            ]);

            Visitor::firstOrCreate([
                'visit_nama' => $request->name,
                'visit_company' => $request->company,
                'visit_department' => $request->department,
                'visit_respon' => $request->respon,
                'visit_phone' => $request->phone,
                'visit_nik' => $request->number,
            ]);

            DB::commit();
            return redirect()->route('logall')->with('success', 'Checkin Successful');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function troubleshoot_checkout_update(Request $request, $id)
    {
        // dd($request->all());

        $request->validate([
            'checkout' => ['required'],
            'photo_checkout' => ['required'],
        ]);

        $extension = explode('/', explode(':', substr($request->photo_checkout, 0, strpos($request->photo_checkout, ';')))[1])[1];   // .jpg .png .pdf
        $replace = substr($request->photo_checkout, 0, strpos($request->photo_checkout, ',') + 1);
        $image = str_replace($replace, '', $request->photo_checkout);
        $image = str_replace(' ', '+', $image);
        $imageName = Str::random(200) .  '.' . $extension;
        // dd($imageName);

        Storage::disk('troubleshootCheckout')->put($imageName, base64_decode($image));

        DB::beginTransaction();

        try {

            $update = TroubleshootBmPersonil::findOrFail($id);
            $update->update([
                'checkout' => $request->checkout,
                'photo_checkout' => $imageName,
            ]);

            DB::commit();
            return redirect()->route('logall')->with('success', 'Checkout Successful');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function troubleshoot_checkin_cancel($id)
    {
        // dd($id);

        DB::beginTransaction();

        try {

            TroubleshootBmPersonil::findOrFail($id)->delete();

            DB::commit();

            return redirect()->route('logall')->with('success', 'Canceled');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }



    // convet pdf
    public function troubleshoot_pdf($id) // Convert PDF permit troubleshoot
    {
        $getForm = TroubleshootBm::find($id);
        $getLastHistory = TroubleshootBmHistory::where('troubleshoot_bm_id', $id)->where('aktif', 1)->first();
        $getEntry = DB::table('troubleshoot_bm_entries')->where('troubleshoot_bm_id', $id)->first();
        $getLastHistory->update(['pdf' => true]);

        $getHistory = DB::table('troubleshoot_bm_histories')
            ->join('troubleshoot_bms', 'troubleshoot_bms.id', '=', 'troubleshoot_bm_histories.troubleshoot_bm_id')
            ->where('troubleshoot_bm_histories.troubleshoot_bm_id', '=', $id)
            ->select('troubleshoot_bm_histories.*')
            ->get();
        $pdf = PDF::loadview('other.troubleshoot_pdf', compact('getForm', 'getLastHistory', 'getHistory'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream();
    }




    public function troubleshoot_export_full_approval()
    {
        return Excel::download(new TroubleshootExport, 'Troubleshoot Full Approval.xlsx');
    }



    // Yajra
    public function yajra_troubleshoot_history() // Get data log permit troubleshoot
    {
        $log_troubleshoot = DB::table('troubleshoot_bm_histories')
            ->join('troubleshoot_bms', 'troubleshoot_bms.id', 'troubleshoot_bm_histories.troubleshoot_bm_id')
            ->select('troubleshoot_bm_histories.*', 'troubleshoot_bms.visit')
            ->orderBy('troubleshoot_bm_id', 'desc');
        return Datatables::of($log_troubleshoot)
            ->editColumn('updated_at', function ($log_troubleshoot) {
                return $log_troubleshoot->updated_at ? with(new Carbon($log_troubleshoot->updated_at))->format('d/m/Y') : '';
            })
            ->editColumn('visit', function ($log_troubleshoot) {
                return $log_troubleshoot->visit ? with(new Carbon($log_troubleshoot->visit))->format('d/m/Y') : '';
            })
            ->make(true);
    }

    public function troubleshoot_yajra_full_approval() // Get data permit troubleshoot full approval view untuk approval
    {
        // $full_approval = DB::table('troubleshoot_bm_fulls')
        //     ->join('troubleshoot_bms', 'troubleshoot_bms.id', '=', 'troubleshoot_bm_fulls.troubleshoot_bm_id')
        //     ->select('troubleshoot_bm_fulls.*')
        //     ->orderBy('troubleshoot_bm_id', 'desc');
        $full = DB::table('troubleshoot_bms')
                ->join('troubleshoot_bm_personils', 'troubleshoot_bms.id', '=', 'troubleshoot_bm_personils.troubleshoot_bm_id')
                ->join('troubleshoot_bm_fulls', 'troubleshoot_bms.id', '=', 'troubleshoot_bm_fulls.troubleshoot_bm_id')
                ->where('troubleshoot_bm_personils.deleted_at', null)
                ->select('troubleshoot_bm_personils.*', 'troubleshoot_bm_fulls.visit', 'troubleshoot_bm_fulls.leave', 'troubleshoot_bm_fulls.link', 'troubleshoot_bm_fulls.work');
        return Datatables::of($full)
            ->editColumn('visit', function ($full) {
                return $full->visit ? with(new Carbon($full->visit))->format('d/m/Y') : '';
            })
            ->addColumn('action', 'other.troubleshootActionLink')
            ->make(true);
    }

    public function troubleshoot_yajra_full_visitor()
    {
        $full = DB::table('troubleshoot_bms')
                ->join('troubleshoot_bm_personils', 'troubleshoot_bms.id', '=', 'troubleshoot_bm_personils.troubleshoot_bm_id')
                ->join('troubleshoot_bm_fulls', 'troubleshoot_bms.id', '=', 'troubleshoot_bm_fulls.troubleshoot_bm_id')
                ->where('troubleshoot_bm_personils.checkout', null)
                ->where('troubleshoot_bm_fulls.status', 'Full Approved')
                ->where('troubleshoot_bm_personils.deleted_at', null)
                ->select(
                    'troubleshoot_bm_fulls.visit',
                    'troubleshoot_bm_fulls.leave',
                    'troubleshoot_bm_fulls.work',
                    'troubleshoot_bm_personils.nama',
                    'troubleshoot_bm_personils.checkin',
                    'troubleshoot_bm_personils.checkout',
                    'troubleshoot_bm_personils.id'
                );
        return Datatables::of($full)
            ->editColumn('visit', function ($full) {
                return $full->visit ? with(new Carbon($full->visit))->format('d/m/Y') : '';
            })
            ->addColumn('action', 'other.troubleshootActionEdit')
            ->make(true);
    }
}
