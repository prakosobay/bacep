<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\{DB, Auth, Gate};

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_user()
    {
        if (Gate::allows('isAdmin')) {
            $user = User::all();
            return view('admin.show', ['user' => $user]);
        } else {
            abort(403);
        }
    }
}
