<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session};
use App\Imports\AssetImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\{Asset, AssetMasuk, AssetKeluar};
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Gate::allows('isApproval') || (Gate::allows('isHead')) || (Gate::allows('isAdmin'))) {
            $asset = Asset::all();
            return view('asset.table', ['asset' => $asset]);
        } else {
            abort(403);
        }
    }
    public function show_in()
    {
        if (Gate::allows('isApproval') || (Gate::allows('isHead')) || (Gate::allows('isAdmin'))) {
            $in = AssetMasuk::all();
            return view('asset.masuk', ['in' => $in]);
        } else {
            abort(403);
        }
    }

    public function show_out()
    {
        if (Gate::allows('isApproval') || (Gate::allows('isHead')) || (Gate::allows('isAdmin'))) {
            $out = AssetKeluar::all();
            return view('asset.keluar', ['out' => $out]);
        } else {
            abort(403);
        }
    }

    public function show_new()
    {
        return view('asset.new');
    }

    public function csv(Request $request)
    {
        $i = Excel::import(new AssetImport, $request->file('file'));
        return back()->with('success', 'Excel Data Imported successfully.');
    }

    public function store_asset(Request $request)
    {
    }

    public function update_masuk(Request $request, $id)
    {
        dd($request);
        $request->validate([
            'pencatat' => 'required',
            'jumlah' => 'required|numeric',
            'ket' => 'required',
        ]);

        // $exist = DB::select('asset_masuks')->
        $new_input = AssetMasuk::find($id)->update([
            'pencatat' => $request->pencatat,
            'jumlah' => $request->jumlah,
            'ket' => $request->ket,
        ]);
        return redirect()->view('asset.table')
            ->with('success', 'Barang Berhasil Di Tambah');
    }

    public function update_keluar(Request $request, $id)
    {
        $request->validate([
            'pencatat' => 'required',
            'jumlah' => 'required|numeric',
            'ket' => 'required',
        ]);

        $new_output = AssetMasuk::find($id)->update($request->all());
        return redirect()->view('asset.table')
            ->with('success', 'Barang Berhasil Di Kurang');
    }
    // public function data_asset()
    // {
    //     return Datatables::of(Asset::query())->make(true);
    // }
}
