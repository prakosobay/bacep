<?php

namespace App\Http\Controllers;

use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Models\User;

class ItController extends Controller
{
    public function anyData()
    {
        return Datatables::of(User::query())->make(true);
    }
}
