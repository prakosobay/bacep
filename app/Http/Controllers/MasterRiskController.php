<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterRisks;
use Illuminate\Support\Facades\{DB, Email};
use Yajra\DataTables\Datatables;

class MasterRiskController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'risk' => ['required', 'string', 'max:255'],
            'poss' => ['required', 'string', 'max:255'],
            'impact' => ['required', 'string', 'max:255'],
            'mitigation' => ['required', 'string', 'max:255'],
        ]);

        DB::beginTransaction();

        try {

            MasterRisks::firstOrCreate([
                'risk' => $request->risk,
                'poss' => $request->poss,
                'impact' => $request->impact,
                'mitigation' => $request->mitigation,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);

            DB::commit();

            return redirect()->route('risk')->with('success', 'Successful');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('failed', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'risk' => ['required', 'string', 'max:255'],
            'poss' => ['required', 'string', 'max:255'],
            'impact' => ['required', 'string', 'max:255'],
            'mitigation' => ['required', 'string', 'max:255'],
        ]);

        DB::beginTransaction();

        try {

            $getRisk = MasterRisks::findOrFail($id);
            $getRisk->update([
                'risk' => $request->risk,
                'poss' => $request->poss,
                'impact' => $request->impact,
                'mitigation' => $request->mitigation,
                'updated_by' => auth()->user()->id,
            ]);

            DB::commit();

            return redirect()->route('risk')->with('success', 'Successful');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('failed', $e->getMessage());
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {

            $getRisk = MasterRisks::findOrFail($id);
            $getRisk->delete();

            DB::commit();

            return redirect()->route('risk')->with('success', 'Deleted');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('failed', $e->getMessage());
        }
    }

    public function table()
    {
        return view('risk.table');
    }

    public function yajra()
    {
        $risk = DB::table('m_risks')
            ->join('users', 'users.id', '=', 'm_risks.created_by')
            ->select('m_risks.*', 'users.name as updatedby')
            ->where('m_risks.deleted_at', null);
        return Datatables::of($risk)
            ->addColumn('action', 'risk.actionEdit')
            ->make(true);
    }
}
