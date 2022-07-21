<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session, Storage};
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;

use App\Models\{Internal, InternalEntry, InternalDetail, InternalRisk, InternalHistory, InternalFull, InternalVisitor};

class InternalController extends Controller
{

    // Show Pages
    public function internal_it_form()
    {
        return view('it.form');
    }



    // Submit
    public function internal_it_create(Request $request)
    {
        // dd($request->all());
        $getForm = $request->all();
        // dd($getForm);
        $validated = $request->validate([
            'work' => ['required'],
            'dc' => ['required_without_all:mmr1,mmr2,cctv,lain'],
            'visit' => ['required', 'after:yesterday'],
            'leave' => ['required', 'after_or_equal:visit'],
            'req_name' => ['required', 'alpha'],
            'req_phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:11'],
            'background' => ['required'],
            'desc' => ['required'],
        ]);

        if($validated){
            $insertForm = Internal::create([
                'req_dept' => $getForm['req_dept'],
                'req_name' => $getForm['req_name'],
                'req_phone' => $getForm['req_phone'],
                'work' => $getForm['work'],
                'visit' => $getForm['visit'],
                'leave' => $getForm['leave'],
                'background' => $getForm['background'],
                'desc' => $getForm['desc'],
                'testing' => $getForm['testing'],
                'rollback' => $getForm['rollback'],
            ]);

            $insertEntries = InternalEntry::insert([
                'internal_id' => $insertForm->id,
                'req_dept' => $insertForm->req_dept,
                'dc' => $request->dc,
                'mmr1' => $request->mmr1,
                'mmr2' => $request->mmr2,
                'cctv' => $request->cctv,
                'lain' => $request->lain,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $arrayDetail = [];
            foreach($getForm['time_start'] as $k => $v){
                $insertArray = [];
                if(isset($getForm['time_start'][$k])){

                    $insertArray = [
                        'internal_id' => $insertForm->id,
                        'req_dept' => $insertForm->req_dept,
                        'time_start' => $getForm['time_start'][$k],
                        'time_end' => $getForm['time_end'][$k],
                        'activity' => $getForm['activity'][$k],
                        'service_impact' => $getForm['service_impact'][$k],
                        'item' => $getForm['item'][$k],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $arrayDetail[] = $insertArray;
                }
            }
            $insertDetail = InternalDetail::insert($arrayDetail);

            $arrayRisk = [];
            foreach($getForm['risk'] as $k => $v){
                $insertArray = [];
                if(isset($getForm['risk'][$k])){

                    $insertArray = [
                        'internal_id' => $insertForm->id,
                        'req_dept' => $insertForm->req_dept,
                        'risk' => $getForm['risk'][$k],
                        'poss' => $getForm['poss'][$k],
                        'impact' => $getForm['impact'][$k],
                        'mitigation' => $getForm['mitigation'][$k],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $arrayRisk[] = $insertArray;
                }
            }
            $insertRisk = InternalRisk::insert($arrayRisk);

            $arrayVisitor = [];
            foreach($getForm['nama'] as $k => $v){
                $insertArray = [];
                if(isset($getForm['nama'][$k])){

                    $insertArray = [
                        'internal_id' => $insertForm->id,
                        'req_dept' => $insertForm->req_dept,
                        'name' => $getForm['nama'][$k],
                        'phone' => $getForm['phone'][$k],
                        'numberId' => $getForm['numberId'][$k],
                        'respon' => $getForm['respon'][$k],
                        'department' => $getForm['department'][$k],
                        'company' => $getForm['company'][$k],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $arrayVisitor[] = $insertArray;
                }
            }

            $insertVisitor = InternalVisitor::insert($arrayVisitor);

            if($insertVisitor ){

                $history = InternalHistory::insert([
                    'internal_id' => $insertForm->id,
                    'req_dept' => $insertForm->req_dept,
                    'created_by' => Auth::user()->name,
                    'role_to' => 'review',
                    'status' => 'requested',
                    'aktif' => true,
                    'pdf' => false,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                if($history){
                    return back()->with('success', 'Berhasil yeeayy');
                }
            }
        }
    }



    // pdf
    public function internal_it_pdf($id)
    {
        dd($id);
        $getForm = Internal::findOrFail($id);
        $getEntries = InternalEntry::where('internal_id', $id)->first();
        $getDetails = InternalDetail::where('internal_id', $id)->get();
        $getRisks = InternalRisk::where('internal_id', $id)->get();
        $getVisisor = InternalVisitor::where('internal_id', $id)->get();
    }
}
