<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail};
use Barryvdh\DomPDF\Facade as PDF;
use App\Mail\{NotifEmail, NotifReject, NotifFull};
use App\Models\{Other, Rutin, Personil};
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
        dd($request);
        // $request->validate([
        //     'other_work'
        // ]);

        $other = Other::create([
            'other_work' => $request->other_work,
            'val_from' => $request->val_from,
            'val_to' => $request->val_to,
            'loc5' => $request->loc1,
            'loc2' => $request->loc2,
            'loc3' => $request->loc3,
            'loc4' => $request->loc4,
            'loc5' => $request->loc5,
            'loc6' => $request->loc6,
            'loc7' => $request->loc7,
            'loc8' => $request->loc8,
            'loc9' => $request->loc9,
            'loc10' => $request->loc10,
            'loc11' => $request->loc11,
            'loc12' => $request->loc12,
            'loc13' => $request->loc13,
            'loc14' => $request->loc14,
            'time_1' => $request->time_1,
            'time_2' => $request->time_2,
            'time_3' => $request->time_3,
            'time_4' => $request->time_4,
            'time_5' => $request->time_5,
            'procedure_1' => $request->procedure_1,
            'procedure_2' => $request->procedure_2,
            'procedure_3' => $request->procedure_3,
            'procedure_4' => $request->procedure_4,
            'procedure_5' => $request->procedure_5,
            'item_1' => $request->item_1,
            'item_2' => $request->item_2,
            'item_3' => $request->item_3,
            'item_4' => $request->item_4,
            'item_5' => $request->item_5,
            'risk_1' => $request->risk_1,
            'risk_2' => $request->risk_2,
            'risk_3' => $request->risk_3,
            'risk_4' => $request->risk_4,
            'risk_5' => $request->risk_5,
        ]);
    }

}
