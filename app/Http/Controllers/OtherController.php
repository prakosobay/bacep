<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session, Storage};
use App\Models\{RiskBm, Other, OtherEntry, OtherCr};

class OtherController extends Controller
{
    // Show Pages
    public function show_troubleshoot_form()
    {
        return view();
    }

    public function show_maintenance_form()
    {
        $getRisk = RiskBm::all();
        return view('other.maintenance_form', compact('getRisk'));
    }



    // Retrieving Data From DB
    public function getRisk($id) //Risk
    {
        $risk = RiskBm::findOrFail($id);
        return isset($risk) && !empty($risk) ? response()->json(['status' => 'SUCCESS', 'risk' => $risk]) : response(['status' => 'FAILED', 'risk' => []]);
    }



    // Submit Form
    public function create_maintenance(Request $request)
    {
        // dd($request->all());

        $validate = $request->validate([
            'visit' => 'required',
            'leave' => ['required', 'after_or_equal:visit'],
        ]);

        $otherForm = Other::create($request->all()
            // 'work' => $request->work,
            // 'visit' => $request->visit,
            // 'leave' => $request->leave,
            // 'background' => $request->background,
            // 'describ' => $request->describ,
            // 'server' => $request->server,
            // 'mmr1' => $request->mmr1,
            // 'mmr2' => $request->mmr2,
            // 'fss' => $request->fss,
            // 'ups' => $request->ups,
            // 'cctv' => $request->cctv,
            // 'trafo' => $request->trafo,
            // 'baterai' => $request->baterai,
            // 'panel' => $request->panel,
            // 'generator' => $request->generator,
            // 'yard' => $request->yard,
            // 'parking' => $request->parking,
            // 'lain' => $request->lain,
            // 'option' => 'maintenance',
            // 'created_at' => now()->toDateTimeString(),
            // 'updated_at' => now()->toDateTimeString(),
        );
        return "sukses";
    }
}
