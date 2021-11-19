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
        if(Gate::allows('isBm')){
            $data = $request->all();
            dd($data);
            $other = Other::create($data);

            if ($other->exists) {
                $val = OtherHistory::create([
                    'other_id' => $other->other_id,
                    'created_by' => Auth::user()->id,
                    'role_to' => 'review',
                    'status' => 'requested',
                    'aktif' => '1',
                    'pdf' => false
                ]);
            }
            return $val->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
        } else{
            abort(403);
        }
    }

    public function approve_other()
    {
        return "good";
    }
}
