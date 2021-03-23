<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CleaningController extends Controller
{
    public function submit_data_cleaning()
    {
        if (Auth::user()->role == 'bm')
            $cleaning = Cleaning::create($request->all());
        if ($cleaning->exists) {
            $cleaningHistory = cleaningHistory::create([
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
