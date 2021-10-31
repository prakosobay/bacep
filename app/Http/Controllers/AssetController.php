<?php

namespace App\Http\Controllers;

use App\Exports\{AssetExport, AssetMasukExport, AssetKeluarExport};
use App\Imports\AssetImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\{Asset, AssetMasuk, AssetKeluar};
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session};

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
        $this->validate($request, [
            'nama_barang' => ['required'],
            'asset_id' => ['required', 'numeric'],
            'jumlah' => ['numeric', 'required', 'min:1'],
            'ket' => 'required',
            'pencatat' => ['required', 'string']
        ]);

        $asset = Asset::find($id);
        $asset->update([
            'jumlah' => $asset->jumlah + $request->jumlah,
        ]);

        if ($asset->jumlah >= 1) {
            $asset->update([
                'kondisi' => 'Tersedia',
            ]);
        } elseif ($asset->jumlah == 0) {
            $asset->update([
                'kondisi' => 'Stock Habis',
            ]);
        }

        $assetmasuk = AssetMasuk::create([
            'nama_barang' => $request->nama_barang,
            'asset_id' => $request->asset_id,
            'jumlah' => $request->jumlah,
            'ket' => $request->ket,
            'pencatat' => $request->pencatat,
            'tanggal' => date('d/m/Y'),
        ]);

        Alert::success('Success', 'Data has been submited');
        return back();
    }

    public function update_keluar(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            'nama_barang' => ['required'],
            'asset_id' => ['required', 'numeric'],
            'jumlah' => ['numeric', 'required', 'min:1'],
            'ket' => 'required',
            'pencatat' => ['required', 'string']
        ]);

        $asset = Asset::find($id);
        if ($asset->jumlah >= $request->jumlah) {
            $asset->update([
                'jumlah' => $asset->jumlah - $request->jumlah,
            ]);

            $assetkeluar = AssetKeluar::create([
                'nama_barang' => $request->nama_barang,
                'asset_id' => $request->asset_id,
                'jumlah' => $request->jumlah,
                'ket' => $request->ket,
                'pencatat' => $request->pencatat,
                'tanggal' => date('d/m/Y'),
            ]);

            Alert::success('Success', 'Data has been submited');
        } else {
            Alert::error('Error', 'Stock Kosong/Kurang !');
        }
        return back();
    }

    public function store_asset(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'nama_barang' => ['required', 'unique:assets', 'max:200'],
            'jumlah' => ['required', 'numeric', 'min:1'],
            'note' => ['max:255'],
            'lokasi' => 'required',
            'satuan' => ['required', 'string'],
            'pencatat' => ['required', 'string']
        ]);

        $asset = Asset::create([
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'note' => $request->note,
            'lokasi' => $request->lokasi,
            'satuan' => $request->satuan,
        ]);

        $assetmasuk = AssetMasuk::create([
            'nama_barang' => $request->nama_barang,
            'asset_id' => $asset->id,
            'jumlah' => $request->jumlah,
            'ket' => $request->note,
            'pencatat' => $request->pencatat,
            'tanggal' => date('d/m/Y'),
        ]);
        Alert::success('Success', 'Data has been submited');
        return back();
    }

    public function export_asset()
    {
        return Excel::download(new AssetExport, 'Asset.xlsx');
    }

    public function export_asset_masuk()
    {
        return Excel::download(new AssetMasukExport, 'AssetMasuk.xlsx');
    }

    public function export_asset_keluar()
    {
        return Excel::download(new AssetkeluarExport, 'AssetKeluar.xlsx');
    }
}
