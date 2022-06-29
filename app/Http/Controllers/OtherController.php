<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session, Storage};
use App\Models\{Other, OtherFull, OtherHistory, OtherPersonil, Rutin, TroubleshootBm, TroubleshootBmDetail, TroubleshootBmEntry, TroubleshootBmHistory, TroubleshootBmPersonil, TroubleshootBmRisk, Visitor};
use App\Mail\{NotifMaintenanceForm, NotifMaintenanceFull, NotifMaintenanceReject, NotifTroubleshootForm};
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseFormatSame;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;

class OtherController extends Controller
{
    // Show Pages
    public function show_troubleshoot_form() // Menampilkan form troubleshoot
    {
        $personil = Visitor::all();
        return view('other.troubleshoot_form', compact('personil'));
    }

    public function show_maintenance_form() // Menampilkan form maintenance
    {
        $personil = Visitor::where('visit_company', 'PT Calmic')
            ->orWhere('visit_company', 'PT TNN Indonesia')
            ->orWhere('visit_company', 'PT DAIKIN')
            ->orWhere('visit_company', 'PT KONE')
            ->orWhere('visit_company', 'PT ENLULU')
            ->orWhere('visit_company', 'PT Bali Towerindo Sentra')
            ->get();
        $pilihanwork = Rutin::all();
        return view('other.maintenance_form', compact('personil', 'pilihanwork'));
    }

    public function show_maintenance_full() // Menampilkan list permit full approved dari sisi visitor
    {
        return view('cleaning.full_visitor');
    }

    public function show_maintenance_reject() // Menampilkan list permit reject dari sisi visitor
    {
        return view('other.maintenance_listReject');
    }

    public function show_maintenance_checkin($id) // Menampilkan form maintenance untuk view checkin
    {
        $form = Other::findOrFail($id);
        $other_personil = OtherPersonil::where('other_id', $id)->get();
        $personil = Visitor::all();

        $pic = [];
        foreach ($other_personil as $k => $nama) {
            $data_nama = [];
            if (isset($other_personil[$k])) {
                $data_nama = [
                    'name' => $nama['name'],
                    'company' => $nama['company'],
                    'department' => $nama['department'],
                    'respon' => $nama['respon'],
                    'phone' => $nama['phone'],
                    'number' => $nama['number'],
                ];
                $pic[] = $data_nama;
            }
        }
        return view('other.maintenance_checkin', compact('form', 'personil', 'pic'));
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



    // Submit Form
    public function create_maintenance(Request $request) // Submit form maintenance
    {
        // Get all data request
        $data = $request->all();
        $work = Rutin::find($data['work'])->work;

        $validate = $request->validate([
            'visit' => 'required',
            'leave' => ['required', 'after_or_equal:visit'],
        ]);

        $otherForm = Other::create([
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
        // $notif_email = Other::find
        // Send email notification
        foreach ([
            'aurellius.putra@balitower.co.id', 'taufik.ismail@balitower.co.id', 'eri.iskandar@balitower.co.id', 'hilman.fariqi@balitower.co.id',
            'ilham.pangestu@balitower.co.id', 'irwan.trisna@balitower.co.id', 'yoga.agus@balitower.co.id', 'yufdi.syafnizal@balitower.co.id', 'khaidir.alamsyah@balitower.co.id', 'hendrik.andy@balitower.co.id', 'bayu.prakoso@balitower.co.id',
        ] as $recipient) {
            Mail::to($recipient)->send(new NotifMaintenanceForm($otherForm));
        }

        if ($personil) {
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

            return $log ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
        }
    }

    public function create_troubleshoot(Request $request) // Submit form troubleshoot
    {
        // var_dump($request->all());
        // Validasi data dari request
        $validate = $request->validate([
            'work' => ['required'],
            'visit' => ['required'],
            'leave' => ['required', 'after_or_equal:visit'],
            'background' => ['required'],
            'desc' => ['required'],
        ]);

        $input = $request->all();
        $other_form = TroubleshootBm::create([
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
            'cctv' => $request->cctv,
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
                    'procedure' => $input['procedure'][$k],
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

        $notif_troubleshoot = TroubleshootBm::find($other_form->id);
        foreach ([
            'bayu.prakoso@balitower.co.id',
        ] as $recipient) {
            Mail::to($recipient)->send(new NotifTroubleshootForm($notif_troubleshoot));
        }

        $log_troubleshoot = TroubleshootBmHistory::insert([
            'troubleshoot_bm_id' => $other_form->id,
            'created_by' => Auth::user()->name,
            'role_to' => 'review',
            'status' => 'requested',
            'aktif' => true,
            'pdf' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $log_troubleshoot ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
    }

    public function approve_maintenance(Request $request) // Flow Approval form maintenance
    {
        $lastupdate = OtherHistory::where('other_id', '=', $request->other_id)->latest()->first();
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
            // dd($notif_email);
            // // Pergantian  role tiap permit & send email notif
            $role_to = '';
            if ($lastupdate->role_to == 'review') {
                foreach ([
                    'aurellius.putra@balitower.co.id', 'taufik.ismail@balitower.co.id', 'eri.iskandar@balitower.co.id', 'hilman.fariqi@balitower.co.id',
                    'ilham.pangestu@balitower.co.id', 'irwan.trisna@balitower.co.id', 'yoga.agus@balitower.co.id', 'yufdi.syafnizal@balitower.co.id', 'khaidir.alamsyah@balitower.co.id', 'hendrik.andy@balitower.co.id', 'bayu.prakoso@balitower.co.id',
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
                foreach (['tofiq.hidayat@balitower.co.id', 'bayu.prakoso@balitower.co.id'] as $recipient) {
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
                // dd($full_maintenance);
                $full_approve = OtherFull::create([
                    'other_id' => $full_maintenance->id,
                    'work' => $full_maintenance->work,
                    'request' => $full_maintenance->created_at,
                    'visit' => $full_maintenance->visit,
                    'leave' => $full_maintenance->leave,
                    'link' => ("https://dcops.balifiber.id/other/maintenance/pdf/$full_maintenance->id"),
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
        } else {
            abort(403);
        }
        return $otherHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
    }

    public function reject_maintenance(Request $request) // Untuk reject permit
    {
        // Get permit terbaru by ID Permit
        $lastupdate = OtherHistory::where('other_id', '=', $request->other_id)->latest()->first();
        if (Gate::denies('isSecurity')) {
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
                return $history->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
            } else {
                abort(403);
            }
        }
    }

    public function update_reject_maintenance(Request $request, $id) // Untuk reject ketika sudah full approval versi visitor
    {
        $maintenance_full = OtherFull::where('other_id', $id)->first();
        $update_reject = OtherHistory::where('other_id', $id)->where('aktif', 1)->first();

        $update_reject->update([
            'aktif' => false,
        ]);

        // Simpan perubahan tiap permit ke table OtherHistory
        $update_reject = OtherHistory::create([
            'other_id' => $id,
            'created_by' => Auth::user()->name,
            'role_to' => 0,
            'status' => 'Full Rejected',
            'aktif' => true,
            'pdf' => false,
        ]);

        // Update alasan reject di colum note
        $maintenance_full->update([
            'status' => 'Full Rejected',
            'note' => $request->note,
        ]);

        if (($update_reject) && ($maintenance_full)) {
            return redirect('logall')->with('status', 'Berhasil di Reject!');
        } else {
            return redirect('logall')->with('status', 'gagal');
        }
    }

    public function update_checkin_maintenance(Request $request) // Untuk update checkin personil form maintenance
    {
        dd($request->all());
        $validate = $request->validate([
            'visit' => ['required'],
            'leave' => ['required', 'after_or_equal:visit'],
        ]);
    }



    // Convert pdf
    public function pdf_maintenance($id) // Convert PDF permit maintenance
    {
        $getOther = Other::find($id);
        $getLastOther = OtherHistory::where('other_id', $id)->where('aktif', 1)->first();
        $getPersonil = OtherPersonil::where('other_id', $id)->get();
        $getLastOther->update(['pdf' => true]);

        $getHistory = DB::table('other_histories')
            ->join('others', 'others.id', '=', 'other_histories.other_id')
            ->where('other_histories.other_id', '=', $id)
            ->select('other_histories.*')
            ->get();
        $pdf = PDF::loadview('other.maintenance_pdf', compact('getOther', 'getPersonil', 'getHistory', 'getLastOther'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream();
    }



    // Yajra Datatables
    public function yajra_history() // Get log permit maintenance by yajra
    {
        $history_maintenance = DB::table('other_histories')
            ->join('others', 'others.id', '=', 'other_histories.other_id')
            ->select('other_histories.*', 'others.visit')
            ->orderBy('other_id', 'desc');
        return Datatables::of($history_maintenance)
            ->editColumn('updated_at', function ($history_maintenance) {
                return $history_maintenance->updated_at ? with(new Carbon($history_maintenance->updated_at))->format('d/m/Y') : '';
            })
            ->editColumn('visit', function ($history_maintenance) {
                return $history_maintenance->visit ? with(new Carbon($history_maintenance->visit))->format('d/m/Y') : '';
            })
            ->make(true);
    }

    public function yajra_full_visitor_maintenance() // Get data permit full approve versi visitor
    {
        $full_visitor = DB::table('other_fulls')
            ->join('others', 'others.id', '=', 'other_fulls.other_id')
            ->where('status', '!=', 'Full Rejected')
            ->select('other_fulls.*')
            ->orderBy('other_id', 'desc');
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

    public function yajra_full_approval_maintenance() // Get data permit full approve versi approval
    {
        $full_approval = DB::table('other_fulls')
            ->join('others', 'others.id', '=', 'other_fulls.other_id')
            ->select('other_fulls.*')
            ->orderBy('other_id', 'desc');
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
}
