<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Rutin};

class OtherController extends Controller
{

    // Show Pages
    public function show_troubleshoot_form()
    {
        return view();
    }

    public function show_maintenance_form()
    {
        return view('other.maintenance_form');
    }



    // Retrieving Data From DB
    public function getWork($id)
    {
        $getWork = Rutin::findOrFail($id);
        return isset($getWork) && !empty($getWork) ? response()->json(['status' => 'SUCCESS', 'getW$getWork' => $getWork]) : response(['status' => 'FAILED', 'getW$getWork' => []]);
    }
}
