<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    public function index()
    {
        return view('other.form');
    }

    public function store_other(Request $request)
    {
        dd($request->all());
    }
}
