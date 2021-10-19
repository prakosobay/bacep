<?php

namespace App\Http\Controllers;

use App\Models\Cleaning;
use App\Models\{User, Role};
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\{DB, Auth, Gate, Validator};

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
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

        $request->validate([
            'name' => ['string', 'required', 'max:255', Rule::unique(Role::class)]
        ]);

        $role = Role::create([
            'name' => $request->name,
        ]);
        Alert::success('Success', 'Role has been submited');
        return back();
    }

    public function store_user(Request $request)
    {
        dd($request->all());
        Validator::make($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email:dns',
                'max:255',
                Rule::unique(User::class),
            ],
            'hp' => ['required', 'numeric'],
            'dept' => ['required', 'string', 'max:255'],
            'password' => $this->passwordRules(),
        ])->validate();

        // $request->validate([
        //     'name' => ['required', 'string', 'max:255', Rule::unique(User::class)],
        //     'slug' => ['required', 'string', 'max:255'],
        //     'dept' => ['required', 'string', 'max:255'],
        //     'hp' => ['required', 'numeric'],
        //     'email' => 'required|string|email:dns|unique:users,email',
        //     ''
        // ]);

        $role = User::create([
            'name' => $request->name,
        ]);
        Alert::success('Success', 'Role has been submited');

        return back();
    }

    public function store_relasi(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'role_id' => ['required', 'numeric'],
            'user_id' => ['required', 'numeric'],
        ]);

        $user = User::find($request->user_id);
        $role_new = $request->role_id;
        // dd($role_new);
        $user->roles()->attach($role_new);
        Alert::success('Success', 'Relasi has been submited');
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
            // return view('admin.edit', compact('user'));
            return isset($user) && !empty($user) ? response()->json(['status' => 'SUCCESS', 'user' => $user]) : response(['status' => 'FAILED', 'user' => []]);
        } else {
            abort(403);
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

    // CLEANING
    public function update_cleaning()
    {
        $revisi = Cleaning::all();
        return view('cleaning.revisi', compact('revisi'));
    }
}
