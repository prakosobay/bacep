<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail};
use Barryvdh\DomPDF\Facade as PDF;
use App\Mail\{NotifEmail, NotifReject, NotifFull};
use App\Models\{Rutin, Personil};
use Faker\Provider\ar_JO\Person;

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

    public function rutin($id)
    {
        $data = Rutin::findOrFail($id);
        dd($data);
        return isset($data) && !empty($data) ? response()->json(['status' => 'SUCCESS', 'data' => $data]) : response()->json(['status' => 'FAILED', 'data' => []]);
    }

    public function personil($id)
    {
        $permit = Personil::findOrFail($id);
        dd($permit);
        return isset($permit) && !empty($permit) ? response()->json(['status' => 'SUCCESS', 'permit' => $permit]) : response()->json(['status' => 'FAILED', 'data' => []]);
    }

    public function store_rutin(Request $request)
    {
        dd($request);
    }
}
