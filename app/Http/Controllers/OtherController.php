<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Mail\{NotifEmail, NotifReject, NotifFull};
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session};
use App\Models\{Other, OtherHistory, Gambar, Time};

class OtherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Gate::allows('isBm')){
        return view('other.perbaikan');
        } else{
            abort(403);
        }
    }

    // public function files(Request $request)
    // {
    //     // dd($request);
    //     $request->validate([
    //         'pict' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:500'],
    //     ]);

    //     $file = $request->file('pict');
    //     $nama_file = time()."_".$file->getClientOriginalName();
    //     $tujuan_upload = 'gambar';
	//     $file->move($tujuan_upload,$file->getClientOriginalName());

    //     Gambar::create([
    //         'file' => $nama_file,
    //     ]);
    // }

    // public function time(Request $request)
    // {
    //     // dd($request);
    //     $request->validate([
    //         'jam1' => ['required'],
    //         'jam2' => ['required'],
    //     ]);

    //     // $jam_end = (00:10:00);

    //     $time = Time::create([
    //         'jam1' => $request->jam1,
    //         'jam2' => $request->jam2
    //     ]);
    // }

    // public function liat()
    // {
    //     $jam = Time::all();
    //     return view('other.gambar', compact('jam'));
    //     // return isset($jam) && !empty($jam) ? response()->json(['status' => 'SUCCESS', 'jam' => $jam]) : response()->json(['status' => 'FAILED', 'jam' => []]);
    // }

    public function store_other(Request $request)
    {
        dd($request->all());
        if(Gate::allows('isBm')){
            // $form = $request->all();
            // $other = Other::create($form);

            $other = Other::create([
                'other_work' => $request->other_work,
                'val_form' => $request->val_from,
                'val_to' => $request->val_to,
                'server' => $request->server,
                'genset' => $request->genset,
                'mmr1' => $request->mmr1,
                'mmr2' => $request->mmr2,
                'fss' => $request->fss,
                'batre' => $request->batre,
                'ups' => $request->ups,
                'lt2' => $request->lt2,
                'lt3' => $request->lt3,
                'trafo' => $request->trafo,
                'parking' => $request->parking,
                'yard' => $request->yard,
                'panel' => $request->panel,
                'other' => $request->other,
                'time_1' => $request->time_1,
                'time_2' => $request->time_2,
                'time_3' => $request->time_3,
                'time_4' => $request->time_4,
                'time_5' => $request->time_5,
                'procedure_1' => $request->procedure_1,
                'time_5' => $request->time_5,
                'time_5' => $request->time_5,
                'time_5' => $request->time_5,
                'time_5' => $request->time_5,

            ]);





            if($other->exists){
                $log = OtherHistory::create([
                    'other_id' => $other->other_id,
                    'created_by' => Auth::user()->id,
                    'role_to' => 'review',
                    'status' => 'requested',
                    'aktif' => '1',
                    'pdf' => false
                ]);
            }
            return $log->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
        } else{
            abort(403);
        }
    }

    public function detail($id)
    {
        $details = DB::table('other_histories')
            ->join('other', 'other.other_id', '=', 'other_histories.other_id')
            ->join('users', 'users.id', '=', 'other_histories.created_by')
            ->where('other_histories.other_id', '=', $id)
            ->select('other_histories.*', 'users.name', 'other.other_work')
            ->get();
        // $details = OtherHistory::all($id);
        return view('other.detail', compact('details'));
    }

    public function approve_other(Request $request)
    {
        if(Gate::allows('isApproval') || Gate::allows('isHead') || Gate::allows('isSecurity')){
            $log = OtherHistory::where('other_id', '=', $request->other_id)->latest()->first();
            if ($log->pdf == false) {
                $log->update(['aktif' => false]);

                $status = '';
                if ($log->status == 'requested') {
                    $status = 'reviewed';
                } elseif ($log->status == 'reviewed') {
                    $status = 'checked';
                } elseif ($log->status == 'checked') {
                    $status = 'acknowledge';
                } elseif ($log->status == 'acknowledge') {
                    $status = 'final';
                } elseif ($log->status == 'final') {
                    $other = Other::find($request->other_id)->first();
                }

                $role_to = '';
                if (($log->role_to == 'review')) {
                    // foreach ([
                    //     'bayu.prakoso@balitower.co.id', 'yona.ayu@balitower.co.id', 'taufik.ismail@balitower.co.id', 'rizky.anindya@balitower.co.id',
                    //     'rafli.ashshiddiqi@balitower.co.id', 'darajat.indraputra@balitower.co.id', 'lingga.anugerah@balitower.co.id'
                    // ] as $recipient) {
                    //     Mail::to($recipient)->send(new NotifEmail());
                    // }
                    $role_to = 'check';
                } elseif (($log->role_to == 'check')) {
                    // foreach (['security.bacep@balitower.co.id'] as $recipient) {
                    //     Mail::to($recipient)->send(new NotifEmail());
                    // }
                    $role_to = 'security';
                } elseif (($log->role_to == 'security')) {
                    // foreach (['rio.christian@balitower.co.id', 'lingga.anugerah@balitower.co.id'] as $recipient) {
                    //     Mail::to($recipient)->send(new NotifEmail());
                    // }
                    $role_to = 'head';
                }
                $otherHistory = OtherHistory::create([
                    'other_id' => $request->other_id,
                    'created_by' => Auth::user()->id,
                    'role_to' => $role_to,
                    'status' => $status,
                    'aktif' => true,
                    'pdf' => false,
                ]);
            } else{
                return response()->json(['status' => 'failed']);
            }

            if ($log->role_to == 'head') {
                $other = Other::find($request->other_id);
                foreach (['bayu.prakoso@balitower.co.id'] as $recipient) {
                    Mail::to($recipient)->send(new NotifFull($other));
                }
                $other = Other::where('other_id', $request->other_id)->first();
                // $cleaningFull = CleaningFull::create([
                //     'cleaning_id' => $cleaning->cleaning_id,
                //     'cleaning_name' => $cleaning->cleaning_name,
                //     'cleaning_name2' => $cleaning->cleaning_name2,
                //     'cleaning_work' => $cleaning->cleaning_work,
                //     'validity_from' => $cleaning->validity_from,
                //     'cleaning_date' => $cleaning->created_at,
                //     'status' => 'Full Approved',
                //     // 'link' => ("http://127.0.0.1:8000/cleaning_pdf/$cleaning->cleaning_id"),
                //     'link' => ("http://172.16.45.195:8000/cleaning_pdf/$cleaning->cleaning_id"),
                // ]);
            } else {
                abort(403);
            }
            return $log->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
        } else{
            abort(403);
        }
    }

    public function pdf($id)
    {
        $other = Other::find($id);
        dd($other);
        $lasthistoryC = OtherHistory::where('other_id', $id)->where('aktif', 1)->first();
        $lasthistoryC->update(['pdf' => true]);

        $otherHistory = DB::table('other_histories')
            ->join('other', 'other.other_id', '=', 'other_histories.other_id')
            ->join('users', 'users.id', '=', 'other_histories.created_by')
            ->where('other_histories.other_id', '=', $id)
            ->where('other_histories.status', '!=', 'visitor')
            ->select('other_histories.*', 'users.name', 'created_by')
            ->get();
        $pdf = PDF::loadview('other.pdf', compact('other', 'otherHistory', 'lasthistoryC'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream();
    }
}
// $request->validate([
            //     'other_work' => ['required', 'string', 'max:255'],
            //     'val_from' => ['required', 'date'],
            //     'val_to' => ['required', 'date'],
            //     'server' => ['boolean'],
            //     'genset' => ['boolean'],
            //     'mmr1' => ['boolean'],
            //     'mmr2' => ['boolean'],
            //     'panel' => ['boolean'],
            //     'batre' => ['boolean'],
            //     'ups' => ['boolean'],
            //     'fss' => ['boolean'],
            //     '2nd' => ['boolean'],
            //     '3rd' => ['boolean'],
            //     'trafo' => ['boolean'],
            //     'yard' => ['boolean'],
            //     'parking' => ['boolean'],
            //     'other' => ['string', 'max:255'],
            //     'desc' => ['required', 'string', 'max:255'],
            //     'time_1' => ['required', 'timezone'],
            //     'time_2' => ['required', 'timezone'],
            //     'time_3' => ['timezone'],
            //     'time_4' => ['timezone'],
            //     'time_5' => ['timezone'],
            //     'item_1' => ['required', 'string', 'max:255'],
            //     'item_2' => ['required', 'string', 'max:255'],
            //     'item_3' => ['string', 'max:255'],
            //     'item_4' => ['string', 'max:255'],
            //     'item_5' => ['string', 'max:255'],
            //     'procedure_1' => ['required', 'string', 'max:255'],
            //     'procedure_2' => ['required', 'string', 'max:255'],
            //     'procedure_3' => ['string', 'max:255'],
            //     'procedure_4' => ['string', 'max:255'],
            //     'procedure_5' => ['string', 'max:255'],
            //     'risk_1' => ['required', 'string', 'max:255'],
            //     'risk_2' => ['required', 'string', 'max:255'],
            //     'risk_3' => ['string', 'max:255'],
            //     'risk_4' => ['string', 'max:255'],
            //     'risk_5' => ['string', 'max:255'],
            //     'poss_1' => ['required', 'string', 'max:255'],
            //     'poss_2' => ['required', 'string', 'max:255'],
            //     'poss_3' => ['string', 'max:255'],
            //     'poss_4' => ['string', 'max:255'],
            //     'poss_5' => ['string', 'max:255'],
            //     'impact_1' => ['required', 'string', 'max:6'],
            //     'impact_2' => ['required', 'string', 'max:6'],
            //     'impact_3' => ['string', 'max:6'],
            //     'impact_4' => ['string', 'max:6'],
            //     'impact_5' => ['string', 'max:6'],
            //     'mitigation_1' => ['required', 'string', 'max:255'],
            //     'mitigation_2' => ['required', 'string', 'max:255'],
            //     'mitigation_3' => ['string', 'max:255'],
            //     'mitigation_4' => ['string', 'max:255'],
            //     'mitigation_5' => ['string', 'max:255'],
            //     'testing' => ['string', 'max:255'],
            //     'rollback' => ['string', 'max:255'],
            //     'name_1' => ['required', 'string', 'max:255'],
            //     'name_2' => ['string', 'max:255'],
            //     'name_3' => ['string', 'max:255'],
            //     'name_4' => ['string', 'max:255'],
            //     'name_5' => ['string', 'max:255'],
            //     'company_1' => ['required', 'string', 'max:255'],
            //     'company_2' => ['string', 'max:255'],
            //     'company_3' => ['string', 'max:255'],
            //     'company_4' => ['string', 'max:255'],
            //     'company_5' => ['string', 'max:255'],
            //     'department_1' => ['required', 'string', 'max:255'],
            //     'department_2' => ['string', 'max:255'],
            //     'department_3' => ['string', 'max:255'],
            //     'department_4' => ['string', 'max:255'],
            //     'department_5' => ['string', 'max:255'],
            //     'respon_1' => ['required', 'string', 'max:255'],
            //     'respon_2' => ['string', 'max:255'],
            //     'respon_3' => ['string', 'max:255'],
            //     'respon_4' => ['string', 'max:255'],
            //     'respon_5' => ['string', 'max:255'],
            //     'phone_1' => ['required', 'string', 'max:15'],
            //     'phone_2' => ['string', 'max:15'],
            //     'phone_3' => ['string', 'max:15'],
            //     'phone_4' => ['string', 'max:15'],
            //     'phone_5' => ['string', 'max:15'],
            //     'id_1' => ['required', 'numeric', 'max:17'],
            //     'id_2' => ['numeric', 'max:17'],
            //     'id_3' => ['numeric', 'max:17'],
            //     'id_4' => ['numeric', 'max:17'],
            //     'id_5' => ['numeric', 'max:17'],
            // ]);
