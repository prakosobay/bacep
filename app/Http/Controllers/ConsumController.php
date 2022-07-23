<?php

namespace App\Http\Controllers;

use App\Exports\{ConsumKeluarExport, ConsumExport, ConsumMasukExport};
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Imports\{ConsumImport, ConsumKeluarImport, ConsumMasukImport};
use Maatwebsite\Excel\Facades\Excel;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session};
use App\Models\{ConsumMasuk, Consum, ConsumKeluar};
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;

class ConsumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    // Show Pages
    public function consum_table_show() // Menampilkan data barang consumable
    {
        if ((Gate::allows('isHead')) || (Gate::allows('isApproval'))) {
            return view('consum.table');
        } else {
            abort(403);
        }
    }

    public function consum_create_show() // Tampilan untuk menginput barang consum baru
    {
        if ((Gate::allows('isAdmin')) || (Gate::allows('isApproval')) || (Gate::allows('isHead'))) {
            return view('consum.new');
        } else {
            abort(403, 'Anda Tidak Punya Akses Ke Halaman Ini');
        }
    }

    public function consum_masuk_show() // Tampilan untuk data barang masuk
    {
        if (Gate::allows('isHead') || (Gate::allows('isApproval')) || (Gate::allows('isAdmin'))) {
            return view('consum.masuk');
        } else {
            abort(403,  'Anda Tidak Punya Akses Ke Halaman Ini');
        }
    }

    public function consum_keluar_show() // Tampilan untuk data barang keluar
    {
        if (Gate::allows('isHead') || (Gate::allows('isApproval')) || (Gate::allows('isAdmin'))) {
            return view('consum.keluar');
        } else {
            abort(403,  'Anda Tidak Punya Akses Ke Halaman Ini');
        }
    }

    public function consum_edit_masuk($id) // Tampilan untuk update barang masuk
    {
        if (Gate::allows('isAdmin') || (Gate::allows('isApproval')) || (Gate::allows('isHead'))) {
            $consum = Consum::find($id);
            return view('consum.tambah', compact('consum'));
        } else {
            abort(403,  'Anda Tidak Punya Akses Ke Halaman Ini');
        }
    }

    public function consum_edit_keluar($id) // Tampilan untuk update barang keluar
    {
        if (Gate::allows('isAdmin') || (Gate::allows('isApproval')) || (Gate::allows('isHead'))) {
            $consum = Consum::find($id);
            // dd($consum);
            return view('consum.kurang', compact('consum'));
        } else {
            abort(403,  'Anda Tidak Punya Akses Ke Halaman Ini');
        }
    }

    public function consum_edit_itemcode($id)
    {
        if (Gate::allows('isAdmin') || (Gate::allows('isApproval')) || (Gate::allows('isHead'))) {
            $consum = Consum::find($id);
            return view('consum.itemcode', compact('consum'));
        } else {
            abort(403,  'Anda Tidak Punya Akses Ke Halaman Ini');
        }
    }



    // Submit data
    public function consum_update_masuk(Request $request, $id) // Update barang masuk
    {
        $this->validate($request, [
            'jumlah' => ['numeric', 'required', 'min:1'],
            'ket' => 'required',
        ]);

        $consum = Consum::find($id);
        $consum->update([
            'nama_barang' => $consum->nama_barang,
            'jumlah' => $consum->jumlah + $request->jumlah,
        ]);

        $consummasuk = ConsumMasuk::create([
            'nama_barang' => $request->nama_barang,
            'consum_id' => $request->consum_id,
            'jumlah' => $request->jumlah,
            'ket' => $request->ket,
            'pencatat' => $request->pencatat,
            'tanggal' => date('d/m/Y'),
        ]);

        return redirect()->route('consumTable')->with('success', 'Barang Consum Berhasil di Tambah');
    }

    public function consum_update_keluar(Request $request, $id) // Update barang keluar
    {
        // dd($request->all());
        $this->validate($request, [
            'jumlah' => ['numeric', 'required', 'min:1'],
            'ket' => 'required',
        ]);

        $consum = Consum::find($id);
        if ($consum->jumlah >= $request->jumlah) {
            $consum->update([
                'nama_barang' => $consum->nama_barang,
                'jumlah' => $consum->jumlah - $request->jumlah,
            ]);

            $consumkeluar = ConsumKeluar::create([
                'nama_barang' => $request->nama_barang,
                'consum_id' => $request->id,
                'jumlah' => $request->jumlah,
                'ket' => $request->ket,
                'pencatat' => $request->pencatat,
                'tanggal' => date('d/m/Y'),
            ]);

        } else {
            return back()->with('Gagal', 'Stock Kosong/Kurang');
        }
        return redirect()->route('consumTable')->with('success', 'Data Berhasil di Submit');
    }

    public function consum_create_submit(Request $request) // Create barang baru
    {
        $this->validate($request, [
            'nama_barang' => ['required', 'unique:consums', 'max:200'],
            'jumlah' => ['required', 'numeric', 'min:1'],
            'note' => ['max:255'],
            'lokasi' => 'required',
            'satuan' => ['required', 'string'],
            'itemcode' => ['numeric', 'digits:6'],
        ]);

        $consum = Consum::create([
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'note' => $request->note,
            'satuan' => $request->satuan,
            'lokasi' => $request->lokasi,
            'itemcode' => $request->itemcode,
        ]);

        $consummasuk = ConsumMasuk::create([
            'nama_barang' => $request->nama_barang,
            'consum_id' => $consum->id,
            'jumlah' => $request->jumlah,
            'ket' => $request->note,
            'pencatat' => $request->pencatat,
            'tanggal' => date('d/m/Y'),
        ]);

        return redirect()->route('consumTable')->with('success', 'Barang Consum Berhasil di Tambah');
    }

    public function consum_update_itemcode(Request $request, $id)
    {
        $validate = $request->validate([
            'itemcode' => ['required', 'numeric', 'digits:6'],
        ]);

        $getItemcode = Consum::findOrFail($id);
        $getItemcode->update([
            'itemcode' => $request->itemcode,
        ]);

        if($getItemcode){
            return redirect()->route('consumTable')->with('success', 'Itemcode Berhasil di Update');
        } else{
            return back()->with('Gagal', 'Itemcode Gagal di Update');
        }
    }



    // Excel
    public function csv(Request $request) // Import csv to database barang consumable
    {
        Excel::import(new ConsumImport, $request->file('file'));
        return back()->with('success', 'Data Consum Berhasil di Import');
    }

    public function import_masuk(Request $request)
    {
        Excel::import(new ConsumMasukImport, $request->file('file'));
        return back()->with('success', 'Consum Masuk Berhasil di Import');
    }

    public function import_keluar(Request $request)
    {
        Excel::import(new ConsumKeluarImport, $request->file('file'));
        return back()->with('success', 'Consum Keluar Berhasil di Import');
    }

    public function export_consum() // Export data consumable to excel
    {
        return Excel::download(new ConsumExport, 'Consum.xlsx');
    }

    public function export_consum_masuk() // Export data consum masuk to excel
    {
        return Excel::download(new ConsumMasukExport, 'ConsumMasuk.xlsx');
    }

    public function export_consum_keluar() // Export data consum keluar to excel
    {
        return Excel::download(new ConsumKeluarExport, 'ConsumKeluar.xlsx');
    }



    // Yajra Datatable
    public function consum_yajra_show() // Get seluruh data consumable
    {
        $consum = DB::table('consums')
            ->select('consums.*')
            ->orderBy('id', 'desc');
            return DataTables::of($consum)
            ->addColumn('action', 'consum.update')
            ->make(true);
    }

    public function consum_yajra_masuk() // Get seluruh data barang masuk consumable
    {
        $masuk = DB::table('consum_masuks')
            ->select('consum_masuks.*')
            ->orderBy('consum_id', 'desc');
            return Datatables::of($masuk)
            ->make(true);
    }

    public function consum_yajra_keluar() // Get seluruh data barang keluar consumable
    {
        $keluar = DB::table('consum_keluars')
            ->select('consum_keluars.*')
            ->orderBy('consum_id', 'desc');
            return Datatables::of($keluar)
            ->make(true);
    }
}
