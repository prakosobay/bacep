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
        if ((Gate::allows('isHead')) || (Gate::allows('isApproval')) || (Gate::allows('isAdmin'))) {
            return view('asset.new');
        } else {
            abort(403);
        }
    }

    public function csv(Request $request)
    {
        $i = Excel::import(new AssetImport, $request->file('file'));
        return back()->with('success', 'Excel Data Imported successfully.');
    }

    public function edit_masuk($id)
    {
        if ((Gate::allows('isApproval') || (Gate::allows('isHead')) || (Gate::allows('isAdmin')))) {
            $asset = Asset::find($id);
            return view('asset.tambah', compact('asset'));
        } else {
            abort(403);
        }
        // return $cleaningHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
    }

    public function edit_keluar($id)
    {
        if ((Gate::allows('isApproval') || (Gate::allows('isHead')) || (Gate::allows('isAdmin')))) {
            $asset = Asset::find($id);
            return view('asset.kurang', compact('asset'));
        } else {
            abort(403);
        }
    }

    public function update_masuk(Request $request, $id)
    {
        dd($request->all());
        $request->validate([
            'nama_barang' => 'required',
            'consum_id' => 'required|numeric',
            'jumlah' => 'numeric|required',
            'ket' => 'required',
            'pencatat' => 'required'
        ]);

        $asset = Asset::find($id);
        $asset->update([
            'jumlah' => $asset->jumlah + $request->jumlah,
        ]);

        $assetmasuk = AssetMasuk::create([
            'nama_barang' => $request->nama_barang,
            'asset_id' => $request->asset_id,
            'jumlah' => $request->jumlah,
            'ket' => $request->ket,
            'pencatat' => $request->pencatat,
        ]);

        return $assetmasuk->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
    }

    public function update_keluar(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'nama_barang' => 'required',
            'consum_id' => 'required|numeric',
            'jumlah' => 'numeric|required',
            'ket' => 'required',
            'pencatat' => 'required'
        ]);

        $asset = Asset::find($id);
        if ($asset->jumlah >= $request->jumlah) {
            $asset->update([
                'jumlah' => $asset->jumlah - $request->jumlah,
            ]);
        }

        $assetkeluar = AssetKeluar::create([
            'nama_barang' => $request->nama_barang,
            'asset_id' => $request->asset_id,
            'jumlah' => $request->jumlah,
            'ket' => $request->ket,
            'pencatat' => $request->pencatat,
        ]);

        return $assetkeluar->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
    }
}
