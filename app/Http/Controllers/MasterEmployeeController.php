<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeCardExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMasterEmployeeRequest;
use App\Models\{EmployeeCard, EmployeeHistory};
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
        return view('access_card.employee.table');
    }

    public function resign()
    {
        return view('access_card.employee.resign');
    }

    public function logs()
    {
        return view('access_card.employee.logs');
    }

    public function store(StoreMasterEmployeeRequest $request)
    {
        DB::beginTransaction();

        try {

            $create = EmployeeCard::create([
                'name' => $request->name,
                'number_card' => $request->number_card,
                'dept_card' => $request->dept_card,
                'status_employee' => $request->status,
                'updated_by' => auth()->user()->id,
                'created_by' => auth()->user()->id,
            ]);

            EmployeeHistory::create([
                'name' => $request->name,
                'employee_card_id' => $create->id,
                'last_card' => $request->number_card,
                'status' => 'Registered',
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
        $ak = EmployeeCard::find($id);
        DB::beginTransaction();

        try {

            $get = EmployeeCard::findOrFail($id);
            $get->update([
                'name' => $request->name,
                'number_card' => $request->number_card,
                'status_employee' => $request->status,
                'dept_card' => $request->dept_card,
                'updated_by' => auth()->user()->id,
            ]);

            if($request->status == 'Resign') {

                EmployeeHistory::create([
                    'name' => $request->name,
                    'employee_card_id' => $get->id,
                    'last_card' => $ak->number_card,
                    'status' => $request->status_card,
                ]);
            } else {

                if($request->status_card == 'Lost') {

                    EmployeeHistory::create([
                        'name' => $request->name,
                        'employee_card_id' => $get->id,
                        'last_card' => $ak->number_card,
                        'status' => $request->status_card,
                    ]);

                    EmployeeHistory::create([
                        'name' => $request->name,
                        'employee_card_id' => $get->id,
                        'last_card' => $request->number_card,
                        'status' => 'Registered',
                    ]);
                } else {

                    EmployeeHistory::create([
                        'name' => $request->name,
                        'employee_card_id' => $get->id,
                        'last_card' => $request->number_card,
                        'status' => $request->status_card,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('employeeShow')->with('success', 'yeyy');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('failed', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $get = EmployeeCard::find($id);
        return view('access_card.employee.edit', compact('get'));
    }

    public function import(Request $request)
    {
        Excel::import(new EmployeeCardImport, $request->file('file'));
        return back()->with('success', 'Excel Data Imported successfully.');
    }

    public function export()
    {
        return Excel::download(new EmployeeCardExport, 'Employee Card.xlsx');
    }

    public function yajra()
    {
        // $employees = EmployeeCard::with('updatedBy:id,name')->where('deleted_card', null);
        $employees = DB::table('employee_cards')
            ->leftJoin('users', 'employee_cards.updated_by', '=', 'users.id')
            ->where('status_employee', '!=', 'Resign')
            ->select('employee_cards.*', 'users.name as updatedby');

        return Datatables::of($employees)
            ->editColumn('updated_at', function ($employees) {
                return $employees->updated_at ? with(new Carbon($employees->updated_at))->format('d/m/Y - H:i:s') : '';
            })
            ->addColumn('action', 'access_card.employee.actionEdit')
            ->make();
    }

    public function yajra_resign()
    {
        $get = DB::table('employee_cards')
            ->leftJoin('users', 'employee_cards.updated_by', '=', 'users.id')
            ->where('status_employee', 'Resign')
            ->select('employee_cards.*', 'users.name as updatedby');

        return Datatables::of($get)
        ->editColumn('updated_at', function ($get) {
            return $get->updated_at ? with(new Carbon($get->updated_at))->format('d/m/Y - H:i:s') : '';
        })
        ->addColumn('action', 'access_card.employee.actionEdit')
        ->make();
    }

    public function yajra_logs()
    {
        $get = DB::table('employee_histories')
            ->join('employee_cards', 'employee_histories.employee_card_id', '=', 'employee_cards.id')
            ->select('employee_histories.*', 'employee_cards.dept_card as dept');
            return Datatables::of($get)
            // ->editColumn('updated_at', function ($get) {
            //     return $get->updated_at ? with(new Carbon($get->updated_at))->format('d/m/Y') : '';
            // })
            ->make();
    }
}
