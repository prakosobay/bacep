<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cleaning;
use App\Models\CleaningHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

class CleaningController extends Controller
{
    public function submit_data_cleaning(Request $request)
    {
        // dd($request);
        if (Auth::user()->role == 'bm')
            $cleaning = Cleaning::create($request->all());
        if ($cleaning->exists) {
            $cleaningHistory = CleaningHistory::create([
                'cleaning_id' => $cleaning->cleaning_id,
                'created_by' => Auth::user()->id,
                'role_to' => 'review',
                'status' => 'created',
                'aktif' => 1
            ]);

            return $cleaningHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
        }

        return response()->json(['status' => 'FAILED']);
    }
}
