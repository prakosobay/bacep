<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Mail\{NotifEmail, NotifReject, NotifFull};
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session};
use App\Models\{Other, OtherHistory, Gambar, Time};
use Svg\Tag\Rect;

class OtherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Gate::allows('isBm')){
        return view('other.form');
        } else{
            abort(403);
        }
    }

    public function files(Request $request)
    {
        // dd($request);
        $request->validate([
            'pict' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:500'],
        ]);

        $file = $request->file('pict');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'gambar';
	    $file->move($tujuan_upload,$file->getClientOriginalName());

        Gambar::create([
            'file' => $nama_file,
        ]);
    }

    public function time(Request $request)
    {
        // dd($request);
        $request->validate([
            'jam1' => ['required'],
            'jam2' => ['required'],
        ]);

        // $jam_end = (00:10:00);

        $time = Time::create([
            'jam1' => $request->jam1,
            'jam2' => $request->jam2
        ]);
    }

    public function liat()
    {
        $jam = Time::all();
        return view('other.gambar', compact('jam'));
        // return isset($jam) && !empty($jam) ? response()->json(['status' => 'SUCCESS', 'jam' => $jam]) : response()->json(['status' => 'FAILED', 'jam' => []]);
    }

    public function store_other(Request $request)
    {
        dd($request->all());
        if(Gate::allows('isBm')){
            $request->validate([
                'other_work' => ['required', 'string', 'max:255'],
                'val_from' => ['required', 'date'],
                'val_to' => ['required', 'date'],
                'server' => ['boolean'],
                'genset' => ['boolean'],
                'mmr1' => ['boolean'],
                'mmr2' => ['boolean'],
                'panel' => ['boolean'],
                'batre' => ['boolean'],
                'ups' => ['boolean'],
                'fss' => ['boolean'],
                '2nd' => ['boolean'],
                '3rd' => ['boolean'],
                'trafo' => ['boolean'],
                'yard' => ['boolean'],
                'parking' => ['boolean'],
                'other' => ['string', 'max:255'],
                'desc' => ['required', 'string', 'max:255'],
                'time_1' => ['required', 'timezone'],
                'time_2' => ['required', 'timezone'],
                'time_3' => ['timezone'],
                'time_4' => ['timezone'],
                'time_5' => ['timezone'],
                'item_1' => ['required', 'string', 'max:255'],
                'item_2' => ['required', 'string', 'max:255'],
                'item_3' => ['string', 'max:255'],
                'item_4' => ['string', 'max:255'],
                'item_5' => ['string', 'max:255'],
                'procedure_1' => ['required', 'string', 'max:255'],
                'procedure_2' => ['required', 'string', 'max:255'],
                'procedure_3' => ['string', 'max:255'],
                'procedure_4' => ['string', 'max:255'],
                'procedure_5' => ['string', 'max:255'],
                'risk_1' => ['required', 'string', 'max:255'],
                'risk_2' => ['required', 'string', 'max:255'],
                'risk_3' => ['string', 'max:255'],
                'risk_4' => ['string', 'max:255'],
                'risk_5' => ['string', 'max:255'],
                'poss_1' => ['required', 'string', 'max:255'],
                'poss_2' => ['required', 'string', 'max:255'],
                'poss_3' => ['string', 'max:255'],
                'poss_4' => ['string', 'max:255'],
                'poss_5' => ['string', 'max:255'],
                'impact_1' => ['required', 'string', 'max:6'],
                'impact_2' => ['required', 'string', 'max:6'],
                'impact_3' => ['string', 'max:6'],
                'impact_4' => ['string', 'max:6'],
                'impact_5' => ['string', 'max:6'],
                'mitigation_1' => ['required', 'string', 'max:255'],
                'mitigation_2' => ['required', 'string', 'max:255'],
                'mitigation_3' => ['string', 'max:255'],
                'mitigation_4' => ['string', 'max:255'],
                'mitigation_5' => ['string', 'max:255'],
                'testing' => ['string', 'max:255'],
                'rollback' => ['string', 'max:255'],
                'name_1' => ['required', 'string', 'max:255'],
                'name_2' => ['string', 'max:255'],
                'name_3' => ['string', 'max:255'],
                'name_4' => ['string', 'max:255'],
                'name_5' => ['string', 'max:255'],
                'company_1' => ['required', 'string', 'max:255'],
                'company_2' => ['string', 'max:255'],
                'company_3' => ['string', 'max:255'],
                'company_4' => ['string', 'max:255'],
                'company_5' => ['string', 'max:255'],
                'department_1' => ['required', 'string', 'max:255'],
                'department_2' => ['string', 'max:255'],
                'department_3' => ['string', 'max:255'],
                'department_4' => ['string', 'max:255'],
                'department_5' => ['string', 'max:255'],
                'respon_1' => ['required', 'string', 'max:255'],
                'respon_2' => ['string', 'max:255'],
                'respon_3' => ['string', 'max:255'],
                'respon_4' => ['string', 'max:255'],
                'respon_5' => ['string', 'max:255'],
                'phone_1' => ['required', 'string', 'max:15'],
                'phone_2' => ['string', 'max:15'],
                'phone_3' => ['string', 'max:15'],
                'phone_4' => ['string', 'max:15'],
                'phone_5' => ['string', 'max:15'],
                'id_1' => ['required', 'numeric', 'max:17'],
                'id_2' => ['numeric', 'max:17'],
                'id_3' => ['numeric', 'max:17'],
                'id_4' => ['numeric', 'max:17'],
                'id_5' => ['numeric', 'max:17'],
            ]);

            // if ($other->exists) {
            //     $val = OtherHistory::create([
            //         'other_id' => $other->other_id,
            //         'created_by' => Auth::user()->id,
            //         'role_to' => 'review',
            //         'status' => 'requested',
            //         'aktif' => '1',
            //         'pdf' => false
            //     ]);
            // }
            // return $val->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
        } else{
            abort(403);
        }
    }

    public function approve_other()
    {
        return "good";
    }
}
