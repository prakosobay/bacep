<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, DB};
use App\Models\{MasterCompany, User};
use Yajra\DataTables\Datatables;
use Carbon\Carbon;

class MasterCompanyController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'website' => ['required', 'url', 'max:255'],
            'phone' => ['required'],
            'created_by' => ['required'],
        ]);

        $getUser = User::where('name', $request->created_by)->first();

        DB::beginTransaction();

        try {
            MasterCompany::create([
                'name' => $request->name,
                'address' => $request->address,
                'website' => $request->website,
                'phone' => $request->phone,
                'created_by' => $getUser->id,
                'updated_by' => $getUser->id,
            ]);

            DB::commit();
            return redirect()->route('company')->with('success', 'Data Has Been Submited');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function table()
    {
        return view('company.table');
    }

    public function yajra()
    {
        $getRooms = DB::table('m_companies')->select('m_companies.*');

        return Datatables::of($getRooms)
        // ->addColumn('room.actionEdit')
        ->make(true);

    }
}
