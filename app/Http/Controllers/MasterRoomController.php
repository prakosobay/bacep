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
            'created_by' => ['required'],
        ]);

        $getUser = User::where('name', $request->created_by)->first();

        DB::beginTransaction();

        try {
            MasterRoom::create([
                'name' => $request->name,
                'created_by' => $getUser->id,
                'updated_by' => $getUser->id,
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
        dd($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'updated_by' => ['required'],
        ]);

        DB::beginTransaction();

        try {
            $updateRoom = MasterRoom::findOrFail($id);
            $updateRoom->update([
                'name' => $request->name,
                'updated_by' => $request->updated_by,
            ]);

            DB::commit();
            return redirect('room')->with('success', 'Data Has Been Updated');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function delete($id)
    {
        dd($id);
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
                ->select('m_rooms.id', 'm_rooms.name', 'm_rooms.created_by', 'm_rooms.updated_by', 'm_rooms.created_at', 'm_rooms.updated_at');
                return Datatables::of($getRooms)
                ->editColumn('created_at', function ($getRooms) {
                    return $getRooms->created_at ? with(new Carbon($getRooms->created_at))->format('d/m/Y') : '';
                })
                ->editColumn('updated_at', function ($getRooms) {
                    return $getRooms->updated_at ? with(new Carbon($getRooms->updated_at))->format('d/m/Y') : '';
                })
                // ->addColumn('room.actionEdit')
                ->make(true);

    }
}
