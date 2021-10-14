<?php

namespace App\Http\Controllers;

use App\Models\{User, Role};
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\{DB, Auth, Gate};

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Gate::allows('isAdmin')) {
            // $join = DB::table('users')
            //     ->join('roles', 'roles.id', '=', 'users.id')
            //     // ->where('')
            //     ->select('users.*', 'roles.name as rolename', 'roles.id')
            //     ->get();
            $user = User::all();
            $role = Role::all();
            return view('admin.index', compact('user', 'role'));
        } else {
            abort(403);
        }
    }

    public function show_relasi()
    {
        if (Gate::allows('isAdmin')) {
            $ru = DB::table('role_user')->get();
            return view('admin.relasi', compact('ru'));
        } else {
            abort(403);
        }
    }

    public function store_role(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required'
        ]);

        $role = Role::create([
            'name' => $request->name,
        ]);
        Alert::success('Success', 'Role has been submited');

        return back();
    }

    public function show_edit($id)
    {
        // dd($id);
        if (Gate::allows('isAdmin')) {
            $join = DB::table('users')
                ->join('roles', 'roles.id', '=', 'users.id')
                ->where('users.id', '=', $id)
                ->select('users.*', 'roles.name as rolename', 'roles.id')
                ->get();

            return view('admin.edit', compact('join'));
        } else {
            abort(403);
        }
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
