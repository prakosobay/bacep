<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, DB};
use App\Models\{MasterRoom, User};
use Yajra\DataTables\Datatables;
use Carbon\Carbon;

class MasterRoomController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        DB::beginTransaction();

        try {
            MasterRoom::firstOrCreate([
                'name' => $request->name,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);

            DB::commit();
            return redirect()->route('room')->with('success', 'Data Has Been Submited');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        DB::beginTransaction();

        try {

            $updateRoom = MasterRoom::findOrFail($id);
            $updateRoom->update([
                'name' => $request->name,
                'updated_by' => auth()->user()->id,
            ]);

            DB::commit();
            return redirect()->route('room')->with('success', 'Data Has Been Updated');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {
            $getRoom = MasterRoom::findOrFail($id);
            $getRoom->delete();

            DB::commit();

            return back()->with('success', 'Data Has Been Deleted');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function table()
    {
        return view('room.table');
    }

    public function yajra()
    {
        $getRooms = DB::table('m_rooms')
            ->join('users', 'users.id', '=', 'm_rooms.created_by')
            ->where('m_rooms.deleted_at', null)
            ->select('m_rooms.*', 'users.name as createdby');
        return Datatables::of($getRooms)
            // ->editColumn('created_at', function ($getRooms) {
            //     return $getRooms->created_at ? with(new Carbon($getRooms->created_at))->format('d/m/Y') : '';
            // })
            // ->editColumn('updated_at', function ($getRooms) {
            //     return $getRooms->updated_at ? with(new Carbon($getRooms->updated_at))->format('d/m/Y') : '';
            // })
            ->addColumn('action', 'room.actionEdit')
            ->make(true);
    }
}
