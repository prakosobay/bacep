<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Role};
use Illuminate\Support\Facades\{DB, Auth, Gate};

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show_user()
    {
        if (Gate::allows('isAdmin')) {
            $user = User::all();
            return view('admin.user', compact('user'));
        } else {
            abort(403);
        }
    }

    public function show_role()
    {
        if (Gate::allows('isAdmin')) {
            $role = Role::all();
            return view('admin.role', compact('role'));
        } else {
            abort(403);
        }
    }

    public function user_edit($id)
    {
        if (Gate::allows('isAdmin')) {
            $user = User::find($id);
            return view('admin.edit', compact('user'));
        }
    }

    public function user_update(Request $request, $id)
    {
        dd($request->all());
        $request->validate([
            'nama_barang' => 'required',
            'consum_id' => 'required|numeric',
            'jumlah' => 'numeric|required',
            'ket' => 'required',
            'pencatat' => 'required'
        ]);
    }
}
