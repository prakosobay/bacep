<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterCardType;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class MasterCardTypeController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        DB::beginTransaction();

        try {

            MasterCardType::create([
                'name' => $request->name,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);

            DB::commit();

            return redirect()->route('cardType')->with('success', 'Success');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        DB::beginTransaction();

        try {

            $data = MasterCardType::findOrFail($id);
            $data->update([
                'name' => $request->name,
                'updated_by' => auth()->user()->id,
            ]);

            DB::commit();

            return redirect()->route('cardType')->with('success', 'Success');
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {

            $data = MasterCardType::findOrFail($id);
            $data->delete();

            DB::commit();

            return redirect()->route('cardType')->with('success', 'Success');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function yajra()
    {
        $data = DB::table('m_card_types')
                // ->join('users', 'm_card_types.created_by', '=', 'users.id')
                ->join('users', 'm_card_types.updated_by', '=', 'users.id')
                ->select('m_card_types.*', 'users.name as updatedBy')
                ->where('deleted_at', null);

        return Datatables::of($data)
                ->editColumn('created_at', function ($data) {
                    return $data->created_at ? with(new Carbon($data->created_at))->format('d/m/Y') : '';
                })
                ->editColumn('updated_at', function ($data) {
                    return $data->updated_at ? with(new Carbon($data->updated_at))->format('d/m/Y') : '';
                })
                ->addColumn('action', 'cardType.actionEdit')
                ->make(true);
    }

    public function show()
    {
        return view('cardType.show');
    }
}
