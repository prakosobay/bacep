<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DCVendorController extends Controller
{
    public function form()
    {
        return view('dcvendor.form');
    }
}
