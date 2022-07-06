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
    public function consum_show() // Menampilkan data barang consumable
    {
        if ((Gate::allows('isHead')) || (Gate::allows('isApproval'))) {
            $getAllConsum = Consum::all();
            return view('consum.table', compact('getAllConsum'));
        } else {
            abort(403);
        }
    }

    public function show_new() // Tampilan untuk menginput barang consum baru
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
            $getConsumMasuk = ConsumMasuk::all();
            return view('consum.masuk', compact('getConsumMasuk'));
        } else {
            abort(403,  'Anda Tidak Punya Akses Ke Halaman Ini');
        }
    }

    public function consum_keluar_show() // Tampilan untuk data barang keluar
    {
        if (Gate::allows('isHead') || (Gate::allows('isApproval')) || (Gate::allows('isAdmin'))) {
            $out = ConsumKeluar::all();
            return view('consum.keluar', compact('out'));
        } else {
            abort(403,  'Anda Tidak Punya Akses Ke Halaman Ini');
        }
    }

    public function edit_masuk($id) // Tampilan untuk update barang masuk
    {
        if (Gate::allows('isAdmin') || (Gate::allows('isApproval')) || (Gate::allows('isHead'))) {
            $consum = Consum::find($id);
            return view('consum.tambah', compact('consum'));
        } else {
            abort(403,  'Anda Tidak Punya Akses Ke Halaman Ini');
        }
    }

    public function edit_keluar($id) // Tampilan untuk update barang keluar
    {
        if (Gate::allows('isAdmin') || (Gate::allows('isApproval')) || (Gate::allows('isHead'))) {
            $consum = Consum::find($id);
            // dd($consum);
            return view('consum.kurang', compact('consum'));
        } else {
            abort(403,  'Anda Tidak Punya Akses Ke Halaman Ini');
        }
    }



    // Submit data
    public function update_masuk(Request $request, $id) // Update barang masuk
    {
        $this->validate($request, [
            'nama_barang' => ['required'],
            'consum_id' => ['required', 'numeric'],
            'jumlah' => ['numeric', 'required', 'min:1'],
            'ket' => 'required',
            'pencatat' => ['required', 'string'],
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
            // 'itemcode' => $request->itemcode,
            'tanggal' => date('d/m/Y'),
        ]);

        Alert::success('Success', 'Data has been submited');
        return back();
    }

    public function update_keluar(Request $request, $id) // Update barang keluar
    {
        // dd($request->all());
        $this->validate($request, [
            'nama_barang' => ['required'],
            'consum_id' => ['required', 'numeric'],
            'jumlah' => ['numeric', 'required', 'min:1'],
            'ket' => 'required',
            'pencatat' => ['required', 'string'],
        ]);

        $consum = Consum::find($id);
        if ($consum->jumlah >= $request->jumlah) {
            $consum->update([
                'nama_barang' => $consum->nama_barang,
                'jumlah' => $consum->jumlah - $request->jumlah,
            ]);

            $consumkeluar = ConsumKeluar::create([
                'nama_barang' => $request->nama_barang,
                'consum_id' => $request->consum_id,
                'jumlah' => $request->jumlah,
                'ket' => $request->ket,
                'pencatat' => $request->pencatat,
                // 'itemcode' => $request->itemcode,
                'tanggal' => date('d/m/Y'),
            ]);

            Alert::success('Success', 'Data has been submited');
        } else {
            Alert::error('Error', 'Stock Kosong/Kurang !');
        }
        return back();
    }

    public function store_consum(Request $request) // Create barang baru
    {
        // dd($request->all());
        $this->validate($request, [
            'nama_barang' => ['required', 'unique:consums', 'max:200'],
            'jumlah' => ['required', 'numeric', 'min:1'],
            'note' => ['max:255'],
            'lokasi' => 'required',
            'satuan' => ['required', 'string'],
            'pencatat' => ['required', 'string'],
            'itemcode' => ['required', 'numeric', 'digits:6'],
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
            'itemcode' => $request->itemcode,
            'tanggal' => date('d/m/Y'),
        ]);

        Alert::success('Success', 'Data has been submited');
        return back();
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
