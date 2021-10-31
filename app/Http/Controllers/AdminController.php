<?php

namespace App\Http\Controllers;

use App\Models\Cleaning;
use App\Models\{User, Role};
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\{DB, Auth, Gate, Validator, Hash};
use Laravel\Fortify\Contracts\CreatesNewUsers;

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
        $credentials = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email:dns',
                'max:255',
                Rule::unique(User::class),
            ],
            'phone' => ['required', 'numeric'],
            'department' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'password' => ['required'],
        ]);
        // dd($request->all());
        $role = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'department' => $request->department,
            'slug' => $request->slug,
            'password' => Hash::make($request['password']),
        ]);
        Alert::success('Success', 'Role has been submited');
        return back();
    }

    public function store_relasi(Request $request)
    {
        $request->validate([
            'role_id' => ['required', 'numeric'],
            'user_id' => ['required', 'numeric'],
        ]);

        $user = DB::table('role_user')->where('user_id', '=', $request->user_id)->where('role_id', '=', $request->role_id)->get();
        if (count($user) > 1) {
            Alert::error('Error', 'Relasi sudah ada !');
            return back();
        } else {
            $users = User::find($request->user_id);
            $role_new = $request->role_id;
            $users->roles()->attach($role_new);
            Alert::success('Success', 'Relasi has been submited');
            return back();
        }
    }

    public function show_edit($id)
    {
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
        } else {
            abort(403);
        }
    }

    public function user_update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric'],
        ]);

        $user = User::find($id);

        $user->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'department' => $request->department,
            'phone' => $request->phone,
        ]);

        Alert::success('Success', 'Data has been updated');
        return back();
    }

    public function delete_user($id)
    {
        //Prod = 15
        if ($id != 15) {
            User::find($id)->delete();
            Alert::success('Success', 'User has been deleted');
            return back();
        } else {
            Alert::error('Failed', 'Cant Delete This !');
            return back();
        }
    }

    public function delete_role($id)
    {
        if ($id != 6) {
            Role::find($id)->delete();
            Alert::success('Success', 'Role has been deleted');
            return back();
        } else {
            Alert::error('Failed', 'Cant Delete This !');
            return back();
        }
    }

    public function delete_relasi($id)
    {
        DB::table('role_user')->where('id', $id)->delete();
        Alert::success('Success', 'Role has been deleted');
        return back();
    }

    // CLEANING
    public function update_cleaning()
    {
        $revisi = Cleaning::all();
        return view('cleaning.revisi', compact('revisi'));
    }
}
