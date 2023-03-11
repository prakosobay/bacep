<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterRisks;
use Illuminate\Support\Facades\{DB};
use Yajra\DataTables\Datatables;

class MasterRiskController extends Controller
{
    public function getUserId()
    {
        $get = auth()->user()->id;
        return $get;
    }

    public function store(Request $request)
    {

        $request->validate([
            'risk' => ['required', 'string', 'max:255'],
            'poss' => ['required', 'string', 'max:255'],
            'impact' => ['required', 'string', 'max:255'],
            'mitigation' => ['required', 'string', 'max:255'],
        ]);
        // dd($request->all());
        DB::beginTransaction();

        try {

            MasterRisks::create([
                'risk' => $request->risk,
                'poss' => $request->poss,
                'impact' => $request->impact,
                'mitigation' => $request->mitigation,
                'created_by' => $this->getUserId(),
                'updated_by' => $this->getUserId(),
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
                'updated_by' => $this->getUserId(),
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
        $risks = MasterRisks::with('updatedBy:id,name')->get();
        return view('risk.table', compact('risks'));
    }

    public function get_risk($id) // Data Visitor
    {
        $risk = MasterRisks::findOrFail($id);
        return isset($risk) && !empty($risk) ? Response()->json(['status' => 'SUCCESS', 'risk' => $risk]) : response(['status' => 'FAILED', 'risk' => []]);
    }

    public function yajra()
    {
        $risk = MasterRisks::with('createdBy:id,name')->get();
        return Datatables::of($risk)
            ->addColumn('action', 'risk.actionEdit')
            ->make(true);
    }
}
