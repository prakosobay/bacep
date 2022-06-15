<?php

namespace App\Http\Controllers;

use App\Exports\{AssetExport, AssetMasukExport, AssetKeluarExport};
use App\Imports\AssetImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\Datatables\Datatables;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\{Asset, AssetMasuk, AssetKeluar, AssetUse};
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session};

class AssetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    // Show pages
    public function index() // Menampilkan table barang asset
    {
        if (Gate::allows('isApproval') || (Gate::allows('isHead')) || (Gate::allows('isAdmin'))) {
            return view('asset.table');
        } else {
            abort(403);
        }
    }

    public function show_in() // Menampilkan table barang masuk asset
    {
        if (Gate::allows('isApproval') || (Gate::allows('isHead')) || (Gate::allows('isAdmin'))) {
            $in = AssetMasuk::all();
            return view('asset.masuk', compact('in'));
        } else {
            abort(403);
        }
    }

    public function show_out() // Menampilkan table barang keluar asset
    {
        if (Gate::allows('isApproval') || (Gate::allows('isHead')) || (Gate::allows('isAdmin'))) {
            $out = AssetKeluar::all();
            return view('asset.keluar', compact('out'));
        } else {
            abort(403);
        }
    }

    public function show_use() // Menampilkan table barang digunakan
    {
        if (Gate::allows('isApproval') || (Gate::allows('isHead')) || (Gate::allows('isAdmin'))){
            $use = AssetUse::all();
            return view('asset.digunakan', compact('use'));
        }
        else{
            abort(403);
        }
    }

    public function show_new() // Menampilkan form barang asset baru
    {
        if ((Gate::allows('isHead')) || (Gate::allows('isApproval')) || (Gate::allows('isAdmin'))) {
            return view('asset.new');
        } else {
            abort(403);
        }
    }

    public function edit_masuk($id) // Menampilkan data barang asset masuk berdasarkan kode barang
    {
        if ((Gate::allows('isApproval') || (Gate::allows('isHead')) || (Gate::allows('isAdmin')))) {
            $asset = Asset::find($id);
            return view('asset.tambah', compact('asset'));
        } else {
            abort(403);
        }
    }

    public function edit_keluar($id) // Menampilkan data barang asset keluar berdasarkan kode barang
    {
        if ((Gate::allows('isApproval') || (Gate::allows('isHead')) || (Gate::allows('isAdmin')))) {
            $asset = Asset::find($id);
            return view('asset.kurang', compact('asset'));
        } else {
            abort(403);
        }
    }

    public function edit_use($id) // Menampilkan data barang asset digunakan berdasarkan kode barang
    {
        if((Gate::allows('isApproval') || (Gate::allows('isHead')) || (Gate::allows('isAdmin')))){
            $use = Asset::find($id);
            return view('asset.pakai', compact('use'));
        } else{
            abort(403);
        }
    }




    // Submit data
    public function update_masuk(Request $request, $id) // Update data barang asset masuk
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

    public function update_keluar(Request $request, $id) // Update data barang asset keluar
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

    public function update_use(Request $request, $id) // Update data barang asset digunakan
    {
        // dd($request->all());
        $this->validate($request, [
            'nama_barang' => ['required'],
            'asset_id' => ['required', 'numeric'],
            'banyak' => ['numeric', 'required', 'min:1'],
            'ket' => 'required',
            'pencatat' => ['required', 'string']
        ]);



        $asset = Asset::find($id);
        // dd($asset);
        if ($asset->jumlah >= $request->banyak) {

            if($asset->digunakan < 1){
                $asset->update([
                    'digunakan' => $request->banyak,
                ]);
                $sisa = $asset->jumlah - $asset->digunakan;
                $asset->update([
                    'sisa' => $sisa,
                ]);
            }
            elseif($asset->digunakan >= 1){
                $asset->update([
                    'digunakan' => $asset->digunakan + $request->banyak,
                ]);
                $sisa = $asset->jumlah - $asset->digunakan;
                $asset->update([
                    'sisa' => $sisa,
                ]);
            }

            $assetuse = AssetUse::create([
                'nama_barang' => $request->nama_barang,
                'asset_id' => $request->asset_id,
                'jumlah' => $request->banyak,
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

    public function store_asset(Request $request) // Create data barang asset baru
    {
        // dd($request->all());
        $this->validate($request, [
            'nama_barang' => ['required', 'unique:assets', 'max:200'],
            'jumlah' => ['required', 'numeric', 'min:1'],
            'note' => ['max:255'],
            'lokasi' => 'required',
            'satuan' => ['required', 'string'],
            'pencatat' => ['required', 'string'],
            'itemcode' => ['required', 'numeric', 'digits:6']
        ]);

        $asset = Asset::create([
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'note' => $request->note,
            'lokasi' => $request->lokasi,
            'satuan' => $request->satuan,
            'itemcode' => $request->itemcode,
        ]);

        $assetmasuk = AssetMasuk::create([
            'nama_barang' => $request->nama_barang,
            'asset_id' => $asset->id,
            'jumlah' => $request->jumlah,
            'ket' => $request->note,
            'pencatat' => $request->pencatat,
            'tanggal' => date('d/m/Y'),
            'itemcode' => $asset->itemcode,
        ]);
        Alert::success('Success', 'Data has been submited');
        return back();
    }




    // Import csv to database
    public function csv(Request $request) // Import data barang asset to databse
    {
        Excel::import(new AssetImport, $request->file('file'));
        return back()->with('success', 'Excel Data Imported successfully.');
    }




    // Export excel
    public function export_asset() // Export data barang asset
    {
        return Excel::download(new AssetExport, 'Asset.xlsx');
    }

    public function export_asset_masuk() // Export data barang masuk asset
    {
        return Excel::download(new AssetMasukExport, 'AssetMasuk.xlsx');
    }

    public function export_asset_keluar() // Export data barang keluar asset
    {
        return Excel::download(new AssetkeluarExport, 'AssetKeluar.xlsx');
    }




    // Yajra Datatable
    public function yajra_all_asset() // Datatable dengan yajra barang asset
    {
        $asset = DB::table('assets')
            ->select('assets.*')
            ->orderBy('id', 'asc');
            return Datatables::of($asset)
            ->addColumn('action', 'asset.update')
            ->make(true);
    }

    public function yajra_masuk_asset() // Datatable dengan yajra barang asset masuk
    {
        $masuk = DB::table('asset_masuks')
            ->select('asset_masuks.*')
            ->orderBy('asset_id', 'asc');
            return Datatables::of($masuk)
            ->make(true);
    }

    public function yajra_keluar_asset() // Datatable dengan yajra barang asset keluar
    {
        $keluar = DB::table('asset_keluars')
            ->select('asset_keluars.*')
            ->orderBy('asset_id', 'asc');
            return Datatables::of($keluar)
            ->make(true);
    }

    public function yajra_digunakan_asset() // Datatable dengan yajra barang digunakan
    {
        $digunakan = DB::table('asset_uses')
            ->select('asset_uses.*')
            ->orderBy('asset_id', 'asc');
            return Datatables::of($digunakan)
            ->make(true);
    }
}
