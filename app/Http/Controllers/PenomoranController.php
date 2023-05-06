<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\{AccessRequestNumber, ChangeRequestNumber};
use Illuminate\Http\Request;

class PenomoranController extends Controller
{
    public function showAR()
    {
        $ar = AccessRequestNumber::orderBy('number', 'desc')->get();
        return view('penomoran.ar', compact('ar'));
    }

    public function showCR()
    {
        $cr = ChangeRequestNumber::orderBy('number', 'desc')->get();
        return view('penomoran.cr', compact('cr'));
    }
}
