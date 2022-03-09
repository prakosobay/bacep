<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail};
use Barryvdh\DomPDF\Facade as PDF;
use App\Mail\{NotifEmail, NotifReject, NotifFull};
use App\Models\{Other, Rutin, Personil, OtherHistory, OtherFull};

class RutinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Gate::allows('isBm')) {
            $rutin = Rutin::all();
            $personil = Personil::all();
            return view('other.rutin', compact('rutin', 'personil'));
        } else {
            abort(403);
        }
    }

    public function form_perbaikan()
    {
        if(Gate::allows('isBm')){
            return view('other.perbaikan');
        }
    }

    public function rutin($id)
    {
        $data = Rutin::findOrFail($id);
        // dd($data);
        return isset($data) && !empty($data) ? response()->json(['status' => 'SUCCESS', 'data' => $data]) : response()->json(['status' => 'FAILED', 'data' => []]);
    }

    public function personil($id)
    {
        $personil = Personil::findOrFail($id);
        // dd($personil);
        return isset($personil) && !empty($personil) ? response()->json(['status' => 'SUCCESS', 'personil' => $personil]) : response()->json(['status' => 'FAILED', 'data' => []]);
    }

    public function store_rutin(Request $request)
    {
        $data = $request->all();
        $data['other_work'] = Rutin::find($data['other_work'])->work;
        $data['pic1'] = Personil::find($data['pic1'])->nama;
        if($data['pic2']){
            $data['pic2'] = Personil::find($data['pic2'])->nama;
            if($data['pic3']){
                $data['pic3'] = Personil::find($data['pic3'])->nama;
                if($data['pic4']){
                    $data['pic4'] = Personil::find($data['pic4'])->nama;
                    if($data['pic5']){
                        $data['pic5'] = Personil::find($data['pic5'])->nama;
                    }
                }
            }
        }

        // dd($data);
        $other = Other::create($data);
        if ($other->exists) {
            $otherHistory = OtherHistory::create([
                'other_id' => $other->other_id,
                'created_by' => Auth::user()->id,
                'role_to' => 'bm',
                'status' => 'created',
                'aktif' => '1',
                'pdf' => false
            ]);
        }
        return $otherHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
    }

    public function other_pdf($id)
    {
        $other = Other::find($id);
        // dd($other);
        $lasthistoryC = OtherHistory::where('other_id', '=', $id)->where('aktif', 1)->first();
        $lasthistoryC->update(['pdf' => true]);
        // dd($lasthistoryC);

        $otherHistory = DB::table('other_histories')
            ->join('other', 'other.other_id', '=', 'other_histories.other_id')
            ->join('users', 'users.id', '=', 'other_histories.created_by')
            ->where('other_histories.other_id', '=', $id)
            ->where('other_histories.status', '!=', 'visitor')
            ->select('other_histories.*', 'users.name', 'created_by')
            ->get();
        $pdf = PDF::loadview('other.pdf', compact('other', 'lasthistoryC', 'otherHistory'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream();
    }

    public function detail_permit_other($id)
    {
        dd($id);
        $cleaningHistory = DB::table('cleaning_histories')
            ->join('cleanings', 'cleanings.cleaning_id', '=', 'cleaning_histories.cleaning_id')
            ->join('users', 'users.id', '=', 'cleaning_histories.created_by')
            ->where('cleaning_histories.cleaning_id', '=', $id)
            ->select('cleaning_histories.*', 'users.name', 'cleanings.cleaning_work')
            ->get();
        return view('detail_cleaning', ['cleaningHistory' => $cleaningHistory]);
    }

    public function approve_other(Request $request)
    {
        // dd($request);
        $lasthistoryC = OtherHistory::where('other_id', '=', $request->other_id)->latest()->first();
        // dd($lasthistoryC);
        if($lasthistoryC->pdf == true)
        {
            $lasthistoryC->update(['aktif' => false]);
            $status = '';
            if ($lasthistoryC->status == 'created') {
                $status = 'requested';
            } elseif($lasthistoryC->status == 'requested'){
                $status = 'reviewed';
            } elseif ($lasthistoryC->status == 'reviewed') {
                $status = 'checked';
            } elseif ($lasthistoryC->status == 'checked') {
                $status = 'acknowledge';
            } elseif ($lasthistoryC->status == 'acknowledge') {
                $status = 'final';
            } elseif ($lasthistoryC->status == 'final') {
                $other = Other::find($request->other_id)->first();
            }

            $role_to = '';
            if ($lasthistoryC->role_to == 'bm') {
                $role_to = 'review';
            } elseif($lasthistoryC->role_to == 'review'){
                // foreach ([
                //     'aurellius.putra@balitower.co.id', 'taufik.ismail@balitower.co.id', 'eri.iskandar@balitower.co.id', 'hilman.fariqi@balitower.co.id',
                // 'ilham.pangestu@balitower.co.id', 'irwan.trisna@balitower.co.id', 'yoga.agus@balitower.co.id', 'yufdi.syafnizal@balitower.co.id'
                // ,'khaidir.alamsyah@balitower.co.id', 'hendrik.andy@balitower.co.id',
                // ] as $recipient) {
                //     Mail::to($recipient)->send(new NotifEmail());
                // }
                $role_to = 'check';
            } elseif ($lasthistoryC->role_to == 'check') {
                // foreach (['security.bacep@balitower.co.id'] as $recipient) {
                //     Mail::to($recipient)->send(new NotifEmail());
                // }
                $role_to = 'security';
            } elseif ($lasthistoryC->role_to == 'security') {
                // foreach (['bayu.prakoso@balitower.co.id'] as $recipient) {
                //     Mail::to($recipient)->send(new NotifEmail());
                // }
                $role_to = 'head';
            } elseif($lasthistoryC->role_to == 'head'){
                $other = Other::find($request->other_id);
                foreach (['bayu.prakoso@balitower.co.id'] as $recipient) {
                    Mail::to($recipient)->send(new NotifFull($other));
                }
                $pick = Other::where('other_id', $request->other_id)->first();
                // dd($pick);
                $full = OtherFull::create([
                    'other_id' => $pick->other_id,
                    'other_name' => $pick->pic1,
                    'other_name2' => $pick->pic2,
                    'other_work' => $pick->other_work,
                    'val_from' => $pick->val_from,
                    'other_date' => $pick->updated_at,
                    'status' => 'Full Approved',
                    'link' => ("http://127.0.0.1:8000/other_pdf/$other->other_id"),
                    // 'link' => ("http://172.16.45.195:8000/cleaning_pdf/$cleaning->cleaning_id"),
                ]);
                // dd($full);
            }

            $otherhistory = OtherHistory::create([
                'other_id' => $request->other_id,
                'created_by' => Auth::user()->id,
                'role_to' => $role_to,
                'status' => $status,
                'aktif' => true,
                'pdf' => false,
            ]);

            // dd($otherhistory);
        } else{
            abort(403);
        }
        return $otherhistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
    }

    public function other()
    {

        // $revisi = DB::table('other_histories')
        //             ->join('other', 'other.other_id', '=', 'other_histories.other_id')
        //             // ->where('other_histories.other_id', '=', $id)
        //             ->where('other_histories.status', '=', 'Revisi')
        //             ->select('other_histories.*', 'other.other_work')
        //             ->get();
        // dd($revisi);
        // return view('other.revisi', compact('revisi'));
    }

    public function reject(Request $request)
    {
        $other_history = OtherHistory::where('other_id', '=', $request->other_id)->latest()->first();
        if (Gate::denies('isSecurity')) {
            // dd($other_history);
            if ($other_history->pdf == true) {
                $other_history->update(['aktif' => false]);

                $otherHistory = OtherHistory::create([
                    'other_id' => $request->other_id,
                    'created_by' => Auth::user()->id,
                    'role_to' => 'bm',
                    'status' => 'revisi',
                    'aktif' => true,
                    'pdf' => false,
                ]);

                // $other = Other::find($request->other_id);
                // foreach (['bayu.prakoso@balitower.co.id'] as $recipient) {
                //     Mail::to($recipient)->send(new NotifReject($other));
                // }
                return $otherHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
            } else {
                abort(404);
            }
        } else{
            abort(403);
        }
    }
}
            // 'other_work' => $data->other_work,
            // 'val_from' => $data->val_from,
            // 'val_to' => $data->val_to,
            // 'loc5' => $data->loc1,
            // 'loc2' => $data->loc2,
            // 'loc3' => $data->loc3,
            // 'loc4' => $data->loc4,
            // 'loc5' => $data->loc5,
            // 'loc6' => $data->loc6,
            // 'loc7' => $data->loc7,
            // 'loc8' => $data->loc8,
            // 'loc9' => $data->loc9,
            // 'loc10' => $data->loc10,
            // 'loc11' => $data->loc11,
            // 'loc12' => $data->loc12,
            // 'loc13' => $data->loc13,
            // 'loc14' => $data->loc14,
            // 'time_1' => $data->time_1,
            // 'time_2' => $data->time_2,
            // 'time_3' => $data->time_3,
            // 'time_4' => $data->time_4,
            // 'time_5' => $data->time_5,
            // 'procedure_1' => $data->procedure_1,
            // 'procedure_2' => $data->procedure_2,
            // 'procedure_3' => $data->procedure_3,
            // 'procedure_4' => $data->procedure_4,
            // 'procedure_5' => $data->procedure_5,
            // 'item_1' => $data->item_1,
            // 'item_2' => $data->item_2,
            // 'item_3' => $data->item_3,
            // 'item_4' => $data->item_4,
            // 'item_5' => $data->item_5,
            // 'risk_1' => $data->risk_1,
            // 'risk_2' => $data->risk_2,
            // 'risk_3' => $data->risk_3,
            // 'risk_4' => $data->risk_4,
            // 'risk_5' => $data->risk_5,
            // 'poss_1' => $data->poss_1,
            // 'poss_2' => $data->poss_2,
            // 'poss_3' => $data->poss_3,
            // 'poss_4' => $data->poss_4,
            // 'poss_5' => $data->poss_5,
            // 'impact_1' => $data->impact_1,
            // 'impact_2' => $data->impact_2,
            // 'impact_3' => $data->impact_3,
            // 'impact_4' => $data->impact_4,
            // 'impact_5' => $data->impact_5,
            // 'mitigation_1' => $data->mitigation_1,
            // 'mitigation_2' => $data->mitigation_2,
            // 'mitigation_3' => $data->mitigation_3,
            // 'mitigation_4' => $data->mitigation_4,
            // 'mitigation_5' => $data->mitigation_5,
            // 'desc' => $data->desc,
            // 'testing' => $data->testing,
            // 'rollback' => $data->rollback,
