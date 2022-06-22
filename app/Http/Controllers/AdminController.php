<?php

namespace App\Http\Controllers;

use App\Models\Cleaning;
use App\Models\{User, Role, Visitor};
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use Yajra\DataTables\Datatables;
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



    // Show Pages
    public function show_relasi() // Menampilkan table relasi user dan role
    {
        if (Gate::allows('isAdmin')) {
            return view('admin.relasi');
        } else {
            abort(403);
        }
    }

    public function show_edit($id) // Menampilkan data dari user yang akan di edit
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

    public function show_user() // Menampilkan table data user web permit
    {
        if (Gate::allows('isAdmin')) {
            return view('admin.user');
        } else {
            abort(403);
        }
    }

    public function show_role() // Menampilkan table data role web permit
    {
        if (Gate::allows('isAdmin')) {
            $role = Role::all();
            return view('admin.role', compact('role'));
        } else {
            abort(403);
        }
    }

    public function user_edit($id) // Menampilkan tampilan edit user
    {
        if (Gate::allows('isAdmin')) {
            $user = User::find($id);
            return view('admin.edit', compact('user'));
        } else {
            abort(403);
        }
    }



    // Submit Data
    public function store_role(Request $request) // Membuat role baru
    {
        // Validasi data dari request
        $request->validate([
            'name' => ['string', 'required', 'max:255', Rule::unique(Role::class)]
        ]);

        // Save to table Role
        $role = Role::create([
            'name' => $request->name,
        ]);
        Alert::success('Success', 'Role has been submited');
        return back();
    }

    public function store_user(Request $request) // Membuat user baru
    {
        // Validasi data dari request
        $request->validate([
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
            'company' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'password' => ['required'],
        ]);

        // Save to table user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'department' => $request->department,
            'company' => $request->company,
            'slug' => $request->slug,
            'password' => Hash::make($request['password']),
        ]);
        Alert::success('Success', 'User has been submited');
        return back();
    }

    public function store_relasi(Request $request) // Membuat relasi baru
    {
        // Validasi data validasi dari request
        $request->validate([
            'role_id' => ['required', 'numeric'],
            'user_id' => ['required', 'numeric'],
        ]);

        // Simpan data relasi baru
        $user = DB::table('role_user')->where('user_id', '=', $request->user_id)->where('role_id', '=', $request->role_id)->get();
        if (count($user) > 1) {
            // Kondisi ketika relasinya double atau data yang di input sudah ada
            Alert::error('Error', 'Relasi sudah ada !');
            return back();
        } else {
            // kondisi data relasi akan di save ke table pivot
            $users = User::find($request->user_id);
            $role_new = $request->role_id;
            $users->roles()->attach($role_new);
            Alert::success('Success', 'Relasi has been submited');
            return back();
        }
    }

    public function user_update(Request $request, $id) // Update data setiap user
    {
        // Validasi data request
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string'],
            'phone' => ['required', 'numeric'],
        ]);

        // Cari id dari user yang akan di update
        $user = User::find($id);

        // Update data user yang terpilih berdasarkan idnya
        $user->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'department' => $request->department,
            'company' => $request->company,
            'phone' => $request->phone,
        ]);

        Alert::success('Success', 'Data has been updated');
        return back();
    }

    public function delete_user($id) // Menghapus user SELAMANYA
    {
        // dd($id);
        //Prod = 15
        if ($id != 15) { // id ini punya admin, jadi jangan sampai TERHAPUS
            // Kondisi data user akan terhapus
            User::find($id)->delete();
            Alert::success('Success', 'User has been deleted');
            return back();
        } else {
            // Kondisi data user gagal terhapus
            Alert::error('Failed', 'Cant Delete This !');
            return back();
        }
    }

    public function delete_role($id) // Menghapus data role
    {
        // prod = 6
        if ($id != 6) { // id ini punya admin, jadi jangan sampai TERHAPUS
            // Kondisi data role akan terhapus
            Role::find($id)->delete();
            Alert::success('Success', 'Role has been deleted');
            return back();
        } else {
            // Kondisi data role tidak dapat terhapus
            Alert::error('Failed', 'Cant Delete This !');
            return back();
        }
    }

    public function delete_relasi($id) // Menghapus data relasi
    {
        DB::table('role_user')->where('id', $id)->delete();
        // Alert::success('Success', 'Role has been deleted');
        return back();
    }



    // Yajra Datatable
    public function yajra_show_user() // Get seluruh data user
    {
        $users = DB::table('users')
            ->select('users.*')
            ->orderBy('id', 'asc');
            return Datatables::of($users)
            ->addColumn('action', 'admin.update')
            ->make(true);
    }

    public function yajra_show_relasi() // Get seluruh data relasi
    {
        $relasi = DB::table('role_user')
            ->select('role_user.*')
            ->orderBy('id', 'asc');
            return Datatables::of($relasi)
            ->addColumn('action', 'admin.actionRelasi')
            ->make(true);
    }
}
