<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth, Session};

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials  = $request->validate([
            'email' => ['required', 'email', 'string'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $roles = auth()->user()->roles;
            $arrole = [];
            foreach ($roles as $rolee) {
                $arrole[] = $rolee->name;
            }
            // $role_1 = $arrole;
            Session::put('arrole', $arrole);

            return redirect()->route('homepage');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function homepage()
    {
        return view('homepage');
    }
}
