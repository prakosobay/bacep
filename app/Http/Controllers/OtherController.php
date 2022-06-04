<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session, Storage};
use App\Models\{Other, OtherHistory, OtherPersonil, Rutin, Visitor};
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
        return view();
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
            $data_kosong = [];
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
                ];

                $p[] = $data_dump;
            }
        }

        $personil = OtherPersonil::insert($p);

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

    public function approve_maintenance(Request $request) // Flow Approval form maintenance
    {
        $lastupdate = OtherHistory::where('other_id', '=', $request->other_id)->latest()->first();
        if ($lastupdate->pdf == true) {
            $lastupdate->update(['aktif' => false]);

            // Perubahan status tiap permit
            $status = '';
            if ($lastupdate->status == 'requested') {
                $status = 'reviewed';
            } elseif ($lastupdate->status == 'reviewed'){
                $status = 'checked';
            } elseif ($lastupdate->status == 'checked'){
                $status = 'acknowledge';
            } elseif ($lastupdate->status == 'acknowledge'){
                $status = 'final';
            } elseif ($lastupdate->status == 'final'){
                $maintenance = Other::find($request->other_id)->first();
            }

            // // Pergantian role tiap permit & send email notif
            $role_to = '';
            if ($lastupdate->role_to == 'review') {
                $role_to = 'check';
            } elseif ($lastupdate->role_to == 'check'){
                $role_to = 'security';
            } elseif ($lastupdate->role_to == 'security'){
                $role_to = 'head';
            } elseif($lastupdate->role_to = 'head'){
                $role_to = 'all';
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

    public function reject_maintenance(Request $request)
    {
        // Get permit terbaru by ID Permit
        $lastupdate = OtherHistory::where('other_id', '=', $request->other_id)->latest()->first();
        // dd($lastupdate);
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
                // $cleaning = Cleaning::find($request->cleaning_id);
                // foreach (['badai.sino@balitower.co.id'] as $recipient) {
                //     Mail::to($recipient)->send(new NotifReject($cleaning));
                // }
                return $history->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
            } else {
                abort(403);
            }
        }
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




}
