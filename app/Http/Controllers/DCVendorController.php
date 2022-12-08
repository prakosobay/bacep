<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInternalRequest;
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session, Storage, Crypt};
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\{vendor, VendorDetail, VendorFull, VendorHistory, VendorRisk, MasterCard, MasterCompany, MasterRack, MasterRisks, MasterRoom, Entry, EntryRack, MasterCardType};

class DCVendorController extends Controller
{
    public function dashboard()
    {
        // $company = auth()->user()->company;
        return view('dcvendor.form');
    }


    public function show_form()
    {
        $risks = MasterRisks::all();
        $getDC = DB::table('m_racks')
            ->join('m_rooms', 'm_racks.m_room_id', '=', 'm_rooms.id')
            ->select('m_racks.*', 'm_rooms.name as room_name')
            ->where('m_rooms.name', 'Server Room')
            ->orderBy('id', 'asc' )
            ->get();

        $getMMR1 = DB::table('m_racks')
            ->join('m_rooms', 'm_racks.m_room_id', '=', 'm_rooms.id')
            ->select('m_racks.*', 'm_rooms.name as room_name')
            ->where('m_rooms.name', 'MMR 1')
            ->get();

        $getMMR2 = DB::table('m_racks')
            ->join('m_rooms', 'm_racks.m_room_id', '=', 'm_rooms.id')
            ->select('m_racks.*', 'm_rooms.name as room_name')
            ->where('m_rooms.name', 'MMR 2')
            ->get();

        return view('dcvendor.form', compact('getDC', 'risks', 'getMMR1', 'getMMR2'));
    }

    public function finished_show()
    {
        // $company = auth()->user()->company;
        return view('dcvendor.finished');
    }


    public function store(Request $request)
    {
        $getForm = $request->all();
        // $company = auth()->user()->company;
        dd($getForm);

        DB::beginTransaction();
        try {
            $insert = vendor::create([
                'requestor_id' => $request->id,
                'work' => $request->work,
                'visit' => $request->visit,
                'leave' => $request->leave,
                'background' => $request->background,
                'desc' => $request->desc,
                'testing' => $request->testing,
                'rollback' => $request->rollback,
            ]);

            Entry::create([
                'id' => '',
                'vendor_id' => $insert->id,
                'dc' => $request->dc,
                'mmr1' => $request->mmr1,
                'mmr2' => $request->mmr2,
                'cctv' => null,
                'genset' => null,
                'panel' => null,
                'baterai' => null,
                'trafo' => null,
                'office1' => null,
                'fss' => null,
                'ups' => null,
                'yard' => null,
                'parking' => null,
                'lain' => null,
            ]);

            $arrayDetail = [];
            foreach ($getForm['time_start'] as $k => $v) {
                $insertArray = [];
                if (isset($getForm['time_start'][$k])) {

                    $insertArray = [
                        'vendor_id' => $insert->id,
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
            VendorDetail::insert($arrayDetail);


            $arrayRisk = [];
            foreach ($getForm['risk'] as $k => $v) {
                $insertArray = [];
                if (isset($getForm['risk'][$k])) {

                    $insertArray = [
                        'vendor_id' => $insert->id,
                        'm_risk_id' => $getForm['risk'][$k],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $arrayRisk[] = $insertArray;
                }
            }
            VendorRisk::insert($arrayRisk);

            $arrayVisitor = [];
            foreach ($getForm['name'] as $k => $v) {
                $insertArray = [];
                if (isset($getForm['name'][$k])) {

                    $insertArray = [
                        'vendor_id' => $insert->id,
                        'name' => $getForm['name'][$k],
                        'phone' => $getForm['phone'][$k],
                        'nik' => $getForm['number'][$k],
                        'respon' => $getForm['respon'][$k],
                        'department' => $getForm['department'][$k],
                        'company' => $getForm['company'][$k],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $arrayVisitor[] = $insertArray;
                }
            }
            VendorVisitor::insert($arrayVisitor);

            VendorHistory::create([
                'vendor_id' => $insert->id,
                'created_by' => $request->id,
                'role_to' => 'review',
                'status' => 'requested',
                'aktif' => true,
                'pdf' => false,
            ]);

            DB::commit();
            return redirect()->route('/dcvendor/dashboard')->with('success', 'Submited');
        }
        catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}

