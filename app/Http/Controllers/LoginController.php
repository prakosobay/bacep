<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    function sign_in(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $role = $request->role;
        $user = User::where('email', $email)->first();
        if (isset($user) && !empty($user)) {
            $check_password = Hash::check($password, $user->password);
            if ($check_password) {
                if (count(explode(',', $user->role)) > 1) {
                    return view('milih', ['roles' => $user->role]);
                } else {
                    // dd($check_password, $user);
                    $request->session()->put('email', $email);
                    $request->session()->put('role', $user->role);
                    return redirect('home');
                }
            } else {
                return redirect()->back()->with(['failed' => 'Password not match']);
            }
        } else {
            return redirect()->back()->with(['failed' => 'Email or password wrong']);
        }
    }
}
