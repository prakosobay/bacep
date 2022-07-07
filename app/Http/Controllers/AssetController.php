<?php

namespace App\Http\Controllers;

use App\Exports\{AssetExport, AssetMasukExport, AssetKeluarExport};
use App\Imports\{AssetImport, AssetKeluarImport, AssetMasukImport, AssetUseImport};
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

    public function asset_masuk_show() // Menampilkan table barang masuk asset
    {
        if (Gate::allows('isApproval') || (Gate::allows('isHead')) || (Gate::allows('isAdmin'))) {
            return view('asset.masuk');
        } else {
            abort(403);
        }
    }

    public function asset_keluar_show() // Menampilkan table barang keluar asset
    {
        if (Gate::allows('isApproval') || (Gate::allows('isHead')) || (Gate::allows('isAdmin'))) {
            return view('asset.keluar');
        } else {
            abort(403);
        }
    }

    public function asset_uses_show() // Menampilkan table barang digunakan
    {
        if (Gate::allows('isApproval') || (Gate::allows('isHead')) || (Gate::allows('isAdmin'))){
            return view('asset.digunakan');
        }
        else{
            abort(403);
        }
    }

    public function asset_create_show() // Menampilkan form barang asset baru
    {
        if ((Gate::allows('isHead')) || (Gate::allows('isApproval')) || (Gate::allows('isAdmin'))) {
            return view('asset.new');
        } else {
            abort(403);
        }
    }

    public function asset_edit_show($id) // Menampilkan data barang asset masuk berdasarkan kode barang
    {
        if ((Gate::allows('isApproval') || (Gate::allows('isHead')) || (Gate::allows('isAdmin')))) {
            $asset = Asset::findOrFail($id);
            return view('asset.tambah', compact('asset'));
        } else {
            abort(403);
        }
    }

    public function asset_edit_keluar($id) // Menampilkan data barang asset keluar berdasarkan kode barang
    {
        if ((Gate::allows('isApproval') || (Gate::allows('isHead')) || (Gate::allows('isAdmin')))) {
            $asset = Asset::find($id);
            return view('asset.kurang', compact('asset'));
        } else {
            abort(403);
        }
    }

    public function asset_edit_digunakan($id) // Menampilkan data barang asset digunakan berdasarkan kode barang
    {
        if((Gate::allows('isApproval') || (Gate::allows('isHead')) || (Gate::allows('isAdmin')))){
            $use = Asset::find($id);
            return view('asset.pakai', compact('use'));
        } else{
            abort(403);
        }
    }




    // Submit data
    public function asset_update_masuk(Request $request, $id) // Update data barang asset masuk
    {
        $this->validate($request, [
            'jumlah' => ['numeric', 'required', 'min:1'],
            'ket' => 'required',
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

        return redirect()->route('assetTable')->with('success', 'Barang Asset Berhasil di Tambah');
    }

    public function asset_update_keluar(Request $request, $id) // Update data barang asset keluar
    {
        $this->validate($request, [
            'jumlah' => ['numeric', 'required', 'min:1'],
            'ket' => 'required',
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

        } else {
            return back()->with('Gagal', 'Stock Kosong/Kurang');
        }
        return redirect()->route('assetTable')->with('success', 'Data Berhasil di Update');
    }

    public function asset_update_digunakan(Request $request, $id) // Update data barang asset digunakan
    {
        // dd($request->all());
        $this->validate($request, [
            'jumlah' => ['numeric', 'required', 'min:1'],
            'ket' => 'required',
        ]);

        $asset = Asset::find($id);
        if ($asset->jumlah >= $request->jumlah) {

            if($asset->digunakan < 1){
                $asset->update([
                    'digunakan' => $request->jumlah,
                ]);
                $sisa = $asset->jumlah - $asset->digunakan;
                $asset->update([
                    'sisa' => $sisa,
                ]);
            }
            elseif($asset->digunakan >= 1){
                $asset->update([
                    'digunakan' => $asset->digunakan + $request->jumlah,
                ]);
                $sisa = $asset->jumlah - $asset->digunakan;
                $asset->update([
                    'sisa' => $sisa,
                ]);
            }

            $assetuse = AssetUse::create([
                'nama_barang' => $request->nama_barang,
                'asset_id' => $request->asset_id,
                'jumlah' => $request->jumlah,
                'ket' => $request->ket,
                'pencatat' => $request->pencatat,
                'tanggal' => date('d/m/Y'),
            ]);

        } else {
            return back()->with('Gagal', 'Stock Kosong/Kurang');
        }
        return redirect()->route('assetTable')->with('success', 'Data telah di update');
    }

    public function asset_create_store(Request $request) // Create data barang asset baru
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
            'digunakan' => 0,
            'sisa' => 0,
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
        return redirect()->route('assetTable')->with('success', 'Barang Asset Berhasil di Tambah');
    }




    // Import csv to database
    public function asset_import_table(Request $request) // Import data barang asset to database
    {
        Excel::import(new AssetImport, $request->file('file'));
        return back()->with('success', 'Excel Data Imported successfully.');
    }

    public function asset_import_masuk(Request $request)
    {
        Excel::import(new AssetMasukImport, $request->file('file'));
        return back();
    }

    public function asset_import_keluar(Request $request)
    {
        Excel::import(new AssetKeluarImport, $request->file('file'));
        return back();
    }

    public function asset_import_uses(Request $request)
    {
        Excel::import(new AssetUseImport, $request->file('file'));
        return back();
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
    public function asset_yajra_show() // Datatable dengan yajra barang asset
    {
        $asset = DB::table('assets')
            ->select('assets.*')
            ->orderBy('id', 'desc');
            return Datatables::of($asset)
            ->addColumn('action', 'asset.update')
            ->make(true);
    }

    public function asset_yajra_masuk() // Datatable dengan yajra barang asset masuk
    {
        $masuk = DB::table('asset_masuks')
            ->select('asset_masuks.*')
            ->orderBy('asset_id', 'desc');
            return Datatables::of($masuk)
            ->make(true);
    }

    public function asset_yajra_keluar() // Datatable dengan yajra barang asset keluar
    {
        $keluar = DB::table('asset_keluars')
            ->select('asset_keluars.*')
            ->orderBy('asset_id', 'desc');
            return Datatables::of($keluar)
            ->make(true);
    }

    public function asset_yajra_uses() // Datatable dengan yajra barang digunakan
    {
        $digunakan = DB::table('asset_uses')
            ->select('asset_uses.*')
            ->orderBy('asset_id', 'desc');
            return Datatables::of($digunakan)
            ->make(true);
    }
}
