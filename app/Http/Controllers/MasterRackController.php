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
            'company_id' => ['required', 'numeric'],
            'room_id' => ['required', 'numeric'],
        ]);

        DB::beginTransaction();

        try {

            MasterRack::firstOrCreate([
                'number' => $request->number,
                'm_company_id' => $request->company_id,
                'm_room_id' => $request->room_id,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);

            DB::commit();
            return redirect()->route('rack')->with('success', 'Data Has Been Submited');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('failed', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        dd($request->all());
        $request->validate([
            'number' => ['required', 'numeric'],
            'company_id' => ['required', 'numeric'],
            'room_id' => ['required', 'numeric'],
        ]);

        DB::beginTransaction();

        try {

            $updateRack = MasterRack::findOrFail($id);
            $updateRack->update([
                'number' => $request->number,
                'm_company_id' => $request->company_id,
                'm_room_id' => $request->room_id,
            ]);

            DB::commit();

            return redirect()->route('rack')->with('success', 'Data Has Been Submited');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('failed', $e->getMessage());
        }
    }

    public function table()
    {
        $getRooms = MasterRoom::all();
        $getCompanies = MasterCompany::all();
        return view('rack.table', compact('getCompanies', 'getRooms'));
    }

    public function yajra()
    {
        $getRacks = DB::table('m_racks')
            ->join('m_companies', 'm_racks.m_company_id', '=', 'm_companies.id')
            ->join('m_rooms', 'm_racks.m_room_id', '=', 'm_rooms.id')
            ->join('users', 'm_racks.updated_by', '=', 'users.id')
            ->select('m_racks.*', 'm_companies.name AS company_name', 'm_rooms.name AS room_name', 'users.name AS updatedBy');
            // ->where('m_racks.deleted_at', null);

        return Datatables::of($getRacks)
            ->addColumn('action', 'rack.actionEdit')
            ->make(true);
    }
}
