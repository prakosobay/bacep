<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session};
use App\Imports\ConsumImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\{Consum, ConsumKeluar, ConsumMasuk};
use Illuminate\Http\Request;

class TesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Gate::allows('isHead') || (Gate::allows('isApproval'))) {
            // $consum = Consum::all();
            return view('item.input');
        } else {
            abort(403);
        }
    }

    public function data_consum()
    {
        return Datatables::of(Consum::query())->make(true);
    }

    public function data_keluar()
    {
        return Datatables::of(ConsumKeluar::query())->make(true);
    }

    public function data_masuk()
    {
        return Datatables::of(ConsumMasuk::query())->make(true);
    }

    public function update()
    {
        $ck = ConsumKeluar::all();
        return view('consum.keluar', ['ck' => $ck]);
    }

    public function store()
    {
        $masuk = ConsumMasuk::all();
        return view('consum.masuk', ['masuk' => $masuk]);
    }

    public function gambar()
    {
        $gambar = Consum::all();
        return view('consum.gambar', ['gambar' => $gambar]);
    }

    public function edit_data(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|file|max:248',
        ]);
    }

    public function import_csv(Request $request)
    {
        //
        // validasi
        // $request->validate([
        //     'file' => 'required|mimes:csv,xlsx'
        // ]);

        // dd($request);
        // $this->validate($request, [
        //     'file' => 'required|mimes:csv'
        // ]);

        $i = Excel::import(new ConsumImport, $request->file('file'));
        // dd($i);
        return back();
        // menangkap file excel
        // $file = $request->file('file');

        // // membuat nama file unik
        // $nama_file = rand() . $file->getClientOriginalName();

        // // upload ke folder file_siswa di dalam folder public
        // $file->move('consum_gambar', $nama_file);

        // // import data
        // Excel::import(new ConsumImport, public_path('/consum_gambar/' . $nama_file));

        // // notifikasi dengan session
        // Session::flash('sukses', 'Data Siswa Berhasil Diimport!');

        // alihkan halaman kembali
        // return view('consum.create');

        // return view('consum.create');
    }
}
