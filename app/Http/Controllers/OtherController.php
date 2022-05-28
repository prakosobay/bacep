<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session, Storage};
use App\Models\{RiskBm, Other, OtherEntry, OtherPersonil, Rutin, Visitor};
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseFormatSame;

class OtherController extends Controller
{
    // Show Pages
    public function show_troubleshoot_form()
    {
        return view();
    }

    public function show_maintenance_form()
    {
        $personil = Visitor::where('visit_company', 'PT Calmic')->orWhere('visit_company', 'PT TNN Indonesia')->orWhere('visit_company', 'PT DAIKIN')->orWhere('visit_company', 'PT KONE')->orWhere('visit_company', 'PT ENLULU')->get();
        $pilihanwork = Rutin::all();
        return view('other.maintenance_form', compact('personil', 'pilihanwork'));
    }



    // Retrieving Data From DB
    public function getRutin($id) //Rutin
    {
        $permit = Rutin::findOrFail($id);
        return isset($permit) && !empty($permit) ? response()->json(['status' => 'SUCCESS', 'permit' => $permit]) : response(['status' => 'FAILED', 'permit' => []]);
    }

    public function getVisitor($id) //Visitor
    {
        $visitor = Visitor::findOrFail($id);
        return isset($visitor) && !empty($visitor) ? Response()->json(['status' => 'SUCCESS', 'visitor' => $visitor]) : response(['status' => 'FAILED', 'visitor' => []]);
    }




    // Submit Form
    public function create_maintenance(Request $request)
    {

        $data = $request->all();
        $data['work'] = Rutin::find($data['work'])->work;
        foreach ($data['visit_nama'] as $p){
            $p = Visitor::find($p)->visit_nama;
            echo ($p);
        }

        $validate = $request->validate([
            'visit' => 'required',
            'leave' => ['required', 'after_or_equal:visit'],
        ]);

        // $otherForm = Other::create($data
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
        // );


        return "sukses";
    }
}
