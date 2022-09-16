<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, DB};
use App\Models\{MasterCompany, MasterRack, MasterRoom, User};
use Yajra\DataTables\Datatables;
use Carbon\Carbon;

class MasterRackController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'number' => ['required', 'numeric'],
            'created_by' => ['required'],
            'm_company_id' => ['required', 'numeric'],
            'm_room_id' => ['required', 'numeric'],
        ]);

        DB::beginTransaction();

        try {
            MasterRack::firstOrCreate([
                'number' => $request->number,
                'm_company_id' => $request->m_company_id,
                'm_room_id' => $request->m_room_id,
                'created_by' => $request->created_by,
                'updated_by' => $request->created_by,
            ]);

            DB::commit();
            return redirect()->route('rack')->with('success', 'Data Has Been Submited');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function create()
    {
        $getCompanies = MasterCompany::all();
        $getRooms = MasterRoom::all();
        return view('rack.create', compact('getCompanies', 'getRooms'));
    }

    public function table()
    {
        // $getRacks = DB::table('m_racks')
        //         ->join('m_rooms', 'm_rooms.id', '=', 'm_racks.m_room_id')
        //         ->join('m_companies', 'm_companies.id', 'm_racks.m_company_id')
        //         ->select('m_rooms.*', 'm_racks.*', 'm_companies.*')
        //         ->get();
        $getRacks = MasterRack::all();
        // dd($getRacks);
        return view('rack.table', compact('getRacks'));
    }

    public function yajra()
    {
        $getRacks = DB::table('m_racks')->select('m_racks.*');

        return Datatables::of($getRacks)->make(true);
    }
}
