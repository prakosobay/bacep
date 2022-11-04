<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Mail};
use App\Models\{Internal, Eksternal};

class LogBookConttroller extends Controller
{
    public function internal_export(Request $request)
    {
        // $getLog = Internal::where('requestor_id', $request->requestor)
        //         ->where('reject_note', null)
        //         ->where()
        //         ->get();
        $getLog = Internal::with(['visitors', 'histories'])
                ->where('reject_note', null)
                ->where('requestor_id', $request->requestor)
                ->select('')
                ->get();
        dd($getLog);
    }
}
