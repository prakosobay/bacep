<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function store(Request $request)
    {
        $get = $request->all();
        dd($get);
    }
}
