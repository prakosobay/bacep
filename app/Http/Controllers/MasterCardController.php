<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterCard;
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

    public function store(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            $request->validate([
                'number' => ['required', 'numeric'],
            ]);

            DB::beginTransaction();

            try {
                MasterCard::create([
                    'number' => $request->number,
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
}
