<?php

namespace App\Http\Controllers;

use App\Exports\{AssetExport, AssetMasukExport, AssetKeluarExport, AssetDigunakanExport};
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

    public function masuk_show() // Menampilkan table barang masuk asset
    {
        if (Gate::allows('isApproval') || (Gate::allows('isHead')) || (Gate::allows('isAdmin'))) {
            return view('asset.masuk');
        } else {
            abort(403);
        }
    }

    public function keluar_show() // Menampilkan table barang keluar asset
    {
        if (Gate::allows('isApproval') || (Gate::allows('isHead')) || (Gate::allows('isAdmin'))) {
            return view('asset.keluar');
        } else {
            abort(403);
        }
    }

    public function uses_show() // Menampilkan table barang digunakan
    {
        if (Gate::allows('isApproval') || (Gate::allows('isHead')) || (Gate::allows('isAdmin'))){
            return view('asset.digunakan');
        }
        else{
            abort(403);
        }
    }

    public function create_show() // Menampilkan form barang asset baru
    {
        if ((Gate::allows('isHead')) || (Gate::allows('isApproval')) || (Gate::allows('isAdmin'))) {
            return view('asset.new');
        } else {
            abort(403);
        }
    }



    public function edit_show($id) // Menampilkan data barang asset masuk berdasarkan kode barang
    {
        if ((Gate::allows('isApproval') || (Gate::allows('isHead')) || (Gate::allows('isAdmin')))) {
            $asset = Asset::findOrFail($id);
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

    public function edit_digunakan($id) // Menampilkan data barang asset digunakan berdasarkan kode barang
    {
        if((Gate::allows('isApproval') || (Gate::allows('isHead')) || (Gate::allows('isAdmin')))){
            $use = Asset::find($id);
            return view('asset.pakai', compact('use'));
        } else{
            abort(403);
        }
    }

    public function edit_itemcode($id)
    {
        if((Gate::allows('isApproval') || (Gate::allows('isHead')) || (Gate::allows('isAdmin')))){
            $getItemcode = Asset::find($id);
            return view('asset.itemcode', compact('getItemcode'));
        } else{
            abort(403);
        }
    }




    // Submit data
    public function update_masuk(Request $request, $id) // Update data barang asset masuk
    {
        $this->validate($request, [
            'jumlah' => ['numeric', 'required', 'min:1'],
            'ket' => ['required', 'nullable'],
        ]);

        DB::commit();

        try {

            $asset = Asset::findOrFail($id);
            $asset->update([
                'jumlah' => $asset->jumlah + $request->jumlah,
                'sisa' => $asset->sisa + $request->jumlah,
            ]);

            AssetMasuk::create([
                'nama_barang' => $request->nama_barang,
                'asset_id' => $asset->id,
                'jumlah' => $request->jumlah,
                'ket' => $request->ket,
                'pencatat' => $request->pencatat,
                'tanggal' => date('d/m/Y'),
            ]);

            $kondisi = $asset->jumlah;

            if($kondisi == 0) {

                $asset->update([
                    'kondisi' => 'Stock Habis',
                ]);

            } elseif(($kondisi > 0) && ($kondisi <= 5)){

                $asset->update([
                    'kondisi' => 'Stock Sedikit',
                ]);

            } elseif($kondisi > 5) {

                $asset->update([
                    'kondisi' => 'Stock Banyak',
                ]);

            }

            DB::commit();

            return redirect()->route('assetTable')->with('success', 'Barang Asset Berhasil di Tambah');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('failed', $e->getMessage());
        }


    }

    public function update_keluar(Request $request, $id) // Update data barang asset keluar
    {
        $this->validate($request, [
            'jumlah_sisa' => ['numeric', 'required'],
            'jumlah_digunakan' => ['numeric', 'required'],
            'ket' => ['required'],
        ]);

        DB::beginTransaction();

        try {

            $asset = Asset::findOrFail($id);

            if($asset->digunakan >= $request->jumlah_digunakan) {
                $digunakan = $asset->digunakan - $request->jumlah_digunakan;
            }

            if($asset->sisa >= $request->jumlah_sisa) {
                $sisa = $asset->sisa - $request->jumlah_sisa;
            }

            if($asset->sisa > $asset->digunakan) {
                $asset->update([
                    'sisa' => $sisa,
                    'digunakan' => $digunakan,
                    'jumlah' => $sisa - $digunakan,
                    'note' => $request->ket,
                ]);

            } elseif($asset->digunakan > $asset->sisa) {
                $asset->update([
                    'sisa' => $sisa,
                    'digunakan' => $digunakan,
                    'jumlah' => $digunakan - $sisa,
                    'note' => $request->ket,
                ]);
            }

            $kondisi = $asset->jumlah;

            if($kondisi == 0) {

                $asset->update([
                    'kondisi' => 'Stock Habis',
                ]);

            } elseif(($kondisi > 0) && ($kondisi <= 5)){

                $asset->update([
                    'kondisi' => 'Stock Sedikit',
                ]);

            } elseif($kondisi > 5) {

                $asset->update([
                    'kondisi' => 'Stock Banyak',
                ]);
            }

            $his = $request->jumlah_sisa + $request->jumlah_digunakan;

            AssetKeluar::create([
                'nama_barang' => $request->nama_barang,
                'asset_id' => $request->asset_id,
                'jumlah' => $his,
                'ket' => $request->ket,
                'pencatat' => $request->pencatat,
                'tanggal' => date('d/m/Y'),
            ]);

            DB::commit();

            return redirect()->route('assetTable')->with('success', 'Data Berhasil Di Update');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('failed', $e->getMessage());
        }
    }

    public function update_digunakan(Request $request, $id) // Update data barang asset digunakan
    {
        // dd($request->all());
        $this->validate($request, [
            'jumlah' => ['numeric', 'required', 'min:1'],
            'ket' => ['required'],
        ]);

        DB::beginTransaction();

        try {

            $asset = Asset::findOrFail($id);

            if($asset->sisa >= $request->jumlah) {
                $sisa = $asset->sisa - $request->jumlah;

                $asset->update([
                    'digunakan' => $asset->digunakan + $request->jumlah,
                    'sisa' => $sisa,
                    'note' => $request->ket,
                ]);
            }

            $kondisi = $asset->jumlah;

            if($kondisi == 0) {

                $asset->update([
                    'kondisi' => 'Stock Habis',
                ]);

            } elseif(($kondisi > 0) && ($kondisi <= 5)){

                $asset->update([
                    'kondisi' => 'Stock Sedikit',
                ]);

            } elseif($kondisi > 5) {

                $asset->update([
                    'kondisi' => 'Stock Banyak',
                ]);
            }

            AssetUse::create([
                'nama_barang' => $request->nama_barang,
                'asset_id' => $request->asset_id,
                'jumlah' => $request->jumlah,
                'ket' => $request->ket,
                'pencatat' => $request->pencatat,
                'tanggal' => date('d/m/Y'),
            ]);

            DB::commit();
            return redirect()->route('assetTable')->with('success', 'Data Berhasil di Update');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('failed', $e->getMessage());
        }
    }

    public function create_store(Request $request) // Create data barang asset baru
    {
        $this->validate($request, [
            'nama_barang' => ['required', 'unique:assets', 'max:200'],
            'jumlah' => ['required', 'numeric', 'min:1'],
            'note' => ['max:255', 'nullable'],
            'lokasi' => ['required', 'string', 'max:255'],
            'satuan' => ['required', 'string'],
            'pencatat' => ['required', 'string'],
            'itemcode' => ['required', 'numeric', 'digits:6'],
        ]);

        DB::beginTransaction();

        try {

            $asset = Asset::create([
                'nama_barang' => $request->nama_barang,
                'jumlah' => $request->jumlah,
                'note' => $request->note,
                'lokasi' => $request->lokasi,
                'satuan' => $request->satuan,
                'itemcode' => $request->itemcode,
                'digunakan' => 0,
                'sisa' => $request->jumlah,
            ]);

            AssetMasuk::create([
                'nama_barang' => $request->nama_barang,
                'asset_id' => $asset->id,
                'jumlah' => $request->jumlah,
                'ket' => $request->note,
                'pencatat' => $request->pencatat,
                'tanggal' => date('d/m/Y'),
            ]);

            $kondisi = $asset->jumlah;

            if($kondisi == 0) {

                $asset->update([
                    'kondisi' => 'Stock Habis',
                ]);

            } elseif(($kondisi > 0) && ($kondisi <= 5)){

                $asset->update([
                    'kondisi' => 'Stock Sedikit',
                ]);

            } elseif($kondisi > 5) {

                $asset->update([
                    'kondisi' => 'Stock Banyak',
                ]);

            }

            DB::commit();

            return redirect()->route('assetTable')->with('success', 'Barang Asset Berhasil di Tambah');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update_itemcode(Request $request, $id)
    {
        $validate = $request->validate([
            'itemcode' => ['required', 'numeric', 'digits:6'],
        ]);

        $insertItemcode = Asset::findOrFail($id);
        $insertItemcode->update([
            'itemcode' => $request->itemcode,
        ]);

        if($insertItemcode){
            return redirect()->route('assetTable')->with('success', 'Itemcode Berhasil di Update');
        } else{
            return back()->with('Gagal', 'Update Gagal');
        }
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
        return Excel::download(new AssetKeluarExport, 'AssetKeluar.xlsx');
    }

    public function export_asset_digunakan()
    {
        return Excel::download(new AssetDigunakanExport, 'AssetDigunakan.xlsx');
    }




    // Yajra Datatable
    public function asset_yajra_show() // Datatable dengan yajra barang asset
    {
        $asset = DB::table('assets')
            ->select('assets.*');
            return Datatables::of($asset)
            ->addColumn('action', 'asset.update')
            ->make(true);
    }

    public function asset_yajra_masuk() // Datatable dengan yajra barang asset masuk
    {
        $masuk = DB::table('asset_masuks')
            ->select('asset_masuks.*');
            return Datatables::of($masuk)
            ->make(true);
    }

    public function asset_yajra_keluar() // Datatable dengan yajra barang asset keluar
    {
        $keluar = DB::table('asset_keluars')
            ->select('asset_keluars.*');
            return Datatables::of($keluar)
            ->make(true);
    }

    public function asset_yajra_uses() // Datatable dengan yajra barang digunakan
    {
        $digunakan = DB::table('asset_uses')
            ->select('asset_uses.*');
            return Datatables::of($digunakan)
            ->make(true);
    }
}
