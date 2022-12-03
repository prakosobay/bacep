<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMasterEmployeeRequest;
use App\Models\{DepartmentCard, EmployeeCard};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use App\Imports\EmployeeCardImport;
use Maatwebsite\Excel\Facades\Excel;

class MasterEmployeeController extends Controller
{
    public function show()
    {
        $getDepts = DepartmentCard::select('id', 'name')->get();
        return view('access_card.employee.table', compact('getDepts'));
    }

    public function store(StoreMasterEmployeeRequest $request)
    {
        DB::beginTransaction();

        try {

            EmployeeCard::create([
                'name' => $request->name,
                'number_card' => $request->number_card,
                'is_intern' => $request->is_intern,
                'dept_card' => $request->dept,
                'updated_by' => auth()->user()->id,
                'created_by' => auth()->user()->id,
            ]);

            DB::commit();
            return redirect()->route('employeeShow')->with('success', 'Yeayy');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('failed', $e->getMessage());
        }
    }

    public function update(StoreMasterEmployeeRequest $request, $id)
    {
        DB::beginTransaction();

        try {

            $get = EmployeeCard::findOrFail($id);
            $get->update([
                'name' => $request->name,
                'number_card' => $request->number_card,
                'is_intern' => $request->is_intern,
                'dept_card' => $request->dept,
                'updated_by' => auth()->user()->id,
            ]);
            DB::commit();
            return redirect()->route('employeeShow')->with('success', 'yeyy');
        } catch (\Exception $e) {
            DB::rollBack();
            return back();
        }
    }

    public function import(Request $request)
    {
        Excel::import(new EmployeeCardImport, $request->file('file'));
        return back()->with('success', 'Excel Data Imported successfully.');
    }

    public function yajra()
    {
        $employees = EmployeeCard::with('updatedby:id,name')->select('employee_cards.*')->where('deleted_card', null);

        return Datatables::of($employees)
            ->editColumn('updated_at', function ($employees) {
                return $employees->updated_at ? with(new Carbon($employees->updated_at))->format('d/m/Y - H:i:s') : '';
            })
            // ->addColumn('action', 'access_card.actionEdit')
            ->make();
    }
}
