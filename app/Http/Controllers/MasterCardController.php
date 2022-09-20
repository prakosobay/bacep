<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterCard;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use Illuminate\Support\Facades\{DB, Mail, Gate};

class MasterCardController extends Controller
{
    public function form()
    {
        if (Gate::allows('isAdmin')) {
            return view('card.form');
        } else {
            abort(403);
        }
    }

    public function show()
    {
        if (Gate::allows('isAdmin')) {
        return view('card.show');
        } else {
            abort(403);
        }
    }

    public function store(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            $request->validate([
                'number' => ['required', 'numeric'],
                'type' => ['required', 'string', 'max:255'],
            ]);

            DB::beginTransaction();

            try {

                MasterCard::create([
                    'number' => $request->number,
                    'type' => $request->type,
                    // 'created_by' => auth()->user()->id,
                    // 'updated_by' => auth()->user()->id,
                ]);

                DB::commit();
                return back()->with('success', 'Successfully');
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
        } else {
            abort(403);
        }
    }

    public function update(Request $request, $id)
    {
        if(Gate::allows('isAdmin')) {

            $request->validate([
                'number' => ['required', 'numeric'],
                'type' => ['required', 'string', 'max:255'],
            ]);

            DB::beginTransaction();

            try {

                $getCard = MasterCard::findOrFail($id);
                $getCard->update([
                    'number' => $request->number,
                    'type' => $request->type,
                ]);

                DB::commit();

                return back()->with('success', 'Success');
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
        } else {
            abort(403);
        }
    }

    public function yajra()
    {
        $data = DB::table('m_cards')
            ->join('m_card_types', 'm_card_types.id', '=', 'm_cards.type')
            ->join('users', 'users.id', '=', 'm_cards.created_by.')
            ->join('users', 'users.id', '=', 'm_cards.updated_by')
            ->where('deleted_at', null)
            ->select('m_cards.*', 'm_card_types.name as type_name', 'm_cards.created_by as createdBy', 'm_cards.updated_by as updatedBy');
        return Datatables::of($data)
            ->editColumn('created_at', function ($data) {
                return $data->created_at ? with(new Carbon($data->created_at))->format('d/m/Y') : '';
            })
            ->editColumn('updated_at', function ($data) {
                return $data->updated_at ? with(new Carbon($data->updated_at))->format('d/m/Y') : '';
            })
            ->make(true);

    }
}
