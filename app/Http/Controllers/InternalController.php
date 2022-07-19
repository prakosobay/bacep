<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InternalController extends Controller
{

    // Show Pages
    public function internal_it_form()
    {
        return view('it.form');
    }


}
