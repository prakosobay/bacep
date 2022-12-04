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
        $getData = DepartmentCard::with('updatedby:id,name')->select('department_cards.*');

        return Datatables::of($getData)
            ->editColumn('updated_at', function ($getData) {
                return $getData->updated_at ? with(new Carbon($getData->updated_at))->format('d/m/Y - H:i:s') : '';
            })
            // ->addColumn('action', 'access_card.actionEdit')
            ->make();
    }
}
