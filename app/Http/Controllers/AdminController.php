<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_user()
    {
        if (Auth::user()->role1 == 'admin') {
            $user = User::all();
            return view('admin.show', ['user' => $user]);
        }
    }
}
