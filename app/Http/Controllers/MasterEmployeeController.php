<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMasterEmployeeRequest;
use App\Models\DepartmentCard;
use App\Models\EmployeeCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterEmployeeController extends Controller
{
    public function show()
    {
        $getDepts = DepartmentCard::select('id', 'name')->get();
        return view('access_card.employee.table', compact('getDepts'));
    }

    public function store(StoreMasterEmployeeRequest $request)
    {
        dd($request->all());
        DB::beginTransaction();

        try {

            EmployeeCard::firstOrCreate([
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

    public function update(StoreMasterEmployeeRequest $request)
    {
        DB::beginTransaction();
    }

    // public function yajra()
    // {
    //     $employees = EmployeeCard
    // }
}
