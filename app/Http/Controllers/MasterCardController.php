<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterCard;
use App\Models\MasterCardType;
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
            $getTypes = MasterCardType::all();
            return view('card.show', compact('getTypes'));
        } else {
            abort(403);
        }
    }

    public function store(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            $request->validate([
                'number' => ['required', 'numeric'],
                'card_type_id' => ['required'],
            ]);

            DB::beginTransaction();

            try {

                MasterCard::create([
                    'number' => $request->number,
                    'card_type_id' => $request->card_type_id,
                    'created_by' => auth()->user()->id,
                    'updated_by' => auth()->user()->id,
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
                'card_type_id' => ['required'],
            ]);

            // dd($request->all());

            DB::beginTransaction();

            try {

                $getCard = MasterCard::findOrFail($id);
                $getCard->update([
                    'number' => $request->number,
                    'card_type_id' => $request->card_type_id,
                    'updated_by' => auth()->user()->id,
                ]);

                DB::commit();

                return redirect()->route('card')->with('success', 'Success');
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
        } else {
            abort(403);
        }
    }

    public function edit($id)
    {
        $getCard = MasterCard::findOrFail($id);
        $getTypes = MasterCardType::all();
        return view('card.edit', compact('getCard', 'getTypes'));
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {

            $getCard = MasterCard::findOrFail($id);
            $getCard->delete();

            DB::commit();
            return redirect()->route('card')->with('success', 'Success');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function yajra()
    {
        $data = DB::table('m_cards')
            ->join('m_card_types', 'm_cards.card_type_id', '=', 'm_card_types.id')
            ->join('users', 'm_cards.updated_by', '=', 'users.id')
            ->where('m_cards.deleted_at', null)
            ->select('m_cards.*', 'm_card_types.name as type_name', 'users.name as updatedBy');
        return Datatables::of($data)
            ->editColumn('created_at', function ($data) {
                return $data->created_at ? with(new Carbon($data->created_at))->format('d/m/Y') : '';
            })
            ->editColumn('updated_at', function ($data) {
                return $data->updated_at ? with(new Carbon($data->updated_at))->format('d/m/Y') : '';
            })
            ->addColumn('action', 'card.actionEdit')
            ->make(true);

    }
}
