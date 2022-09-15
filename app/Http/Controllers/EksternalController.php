<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EksternalController extends Controller
{

    // show pages
    public function dashboard()
    {
        return view('eksternal.dashboard');
    }

    public function show_form()
    {
        // $racks = Auth::user()->
        return view('eksternal.form');
    }






    //store data
    public function store(Request $request)
    {
        $request->validate([
            ''
        ]);
    }
}
