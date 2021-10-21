<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GensetController extends Controller
{
    public function show_warming()
    {
        return view('checklist.form');
    }

    public function store_warming(Request $request)
    {
        dd($request);
    }
}
