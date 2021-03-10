<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisController extends Controller
{

    protected function validator(array $request)
    {
        return Validator::make($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string']
        ]);
    }

    protected function sign_up(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = implode(',', $request->roles);
        $user->password = Hash::make($request->password);
        // dd($request, $request->roles, $user);

        $save = $user->save();
        if (!$save) {
            return redirect('/login')->with(['failed' => 'Failed to saving data']);
        } else {
            return redirect('/login')->with(['success' => 'Saving data success']);
        }
    }
}
