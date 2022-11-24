<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMasterDepartmentCardRequest;
use App\Models\DepartmentCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Email};
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class MasterDepartmentCardController extends Controller
{

    public function show()
    {
        return view('access_card.table');
    }

    public function store(StoreMasterDepartmentCardRequest $request)
    {
        // $request->validated();

        DB::beginTransaction();

        try {

            DepartmentCard::create([
                'name' => $request->name,
                'updated_by' => auth()->user()->id,
                'created_by' => auth()->user()->id,
            ]);

            DB::commit();
            return redirect()->route('departmentCardShow', 'Success');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('departmentCardShow', $e->getMessage());
        }
    }

    public function update(StoreMasterDepartmentCardRequest $request, $id)
    {
        $request->validated();

        DB::beginTransaction();

        try {

            $getData = DepartmentCard::find($id);
            $getData->update([
                'name' => $request->name,
                'updated_by' => auth()->user()->id,
            ]);

            DB::commit();
            return redirect()->route('departmentCardShow', 'Success');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('departmentCardShow', $e->getMessage());
        }
    }

    public function yajra()
    {
        $getData = DepartmentCard::with('updatedBy:id,name')->get();

        return Datatables::of($getData)->make();
    }
}
