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
        // dd($request->all());
        $request->validate([
            'company' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'website' => ['required', 'url', 'max:255'],
            'phone' => ['required'],
            'email' => ['required', 'email', 'max:255'],
        ]);

        DB::beginTransaction();

        try {
            MasterCompany::firstOrCreate([
                'name' => $request->company,
                'address' => $request->address,
                'website' => $request->website,
                'phone' => $request->phone,
                'email' => $request->email,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);

            DB::commit();
            return redirect()->route('company')->with('success', 'Data Has Been Submited');
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
            'address' => ['required', 'string'],
            'website' => ['required', 'url', 'max:255'],
            'phone' => ['required'],
            'email' => ['required', 'email', 'max:255'],
        ]);

        DB::beginTransaction();

        try {

            $getCompany = MasterCompany::findOrFail($id);
            $getCompany->update([
                'name' => $request->name,
                'address' => $request->address,
                'website' => $request->website,
                'phone' => $request->phone,
                'email' => $request->email,
                'updated_by' => auth()->user()->id,
            ]);

            DB::commit();

            return redirect()->route('company')->with('success', 'Data Has Been Updated');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {

            $getCompany = MasterCompany::findOrFail($id);
            $getCompany->delete();

            DB::commit();

            return redirect()->route('company')->with('success', 'Deleted');
        } catch (\Exception $e){
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
        $getRooms = DB::table('m_companies')
            ->join('users', 'users.id', '=', 'm_companies.created_by')
            ->select('m_companies.*', 'users.name as createdby')
            ->where('m_companies.deleted_at', null);
        return Datatables::of($getRooms)
        ->addColumn('action', 'company.actionEdit')
        ->make(true);

    }
}
