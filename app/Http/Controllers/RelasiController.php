<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class RelasiController extends Controller
{
    public function ambil()
    {
        // $user = User::find(3);
        // dd($user->role);

        $role = Duty::find(4);
        dd($role->user);
    }
}
