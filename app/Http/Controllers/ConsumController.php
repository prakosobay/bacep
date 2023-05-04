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
    public function table_show() // Menampilkan data barang consumable
    {
        if ((Gate::allows('isHead')) || (Gate::allows('isApproval'))) {
            return view('consum.table');
        } else {
            abort(403);
        }
    }

    public function create_show() // Tampilan untuk menginput barang consum baru
    {
        if ((Gate::allows('isAdmin')) || (Gate::allows('isApproval')) || (Gate::allows('isHead'))) {
            return view('consum.new');
        } else {
            abort(403, 'Anda Tidak Punya Akses Ke Halaman Ini');
        }
    }

    public function masuk_show() // Tampilan untuk data barang masuk
    {
        if (Gate::allows('isHead') || (Gate::allows('isApproval')) || (Gate::allows('isAdmin'))) {
            return view('consum.masuk');
        } else {
            abort(403,  'Anda Tidak Punya Akses Ke Halaman Ini');
        }
    }

    public function keluar_show() // Tampilan untuk data barang keluar
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
    public function update_masuk(Request $request, $id) // Update barang masuk
    {
        $this->validate($request, [
            'jumlah' => ['numeric', 'required', 'min:1'],
            'ket' => ['required', 'nullable'],
        ]);

        DB::beginTransaction();

        try {

            $consum = Consum::findOrFail($id);
            $consum->update([
                'nama_barang' => $consum->nama_barang,
                'jumlah' => $consum->jumlah + $request->jumlah,
            ]);

            ConsumMasuk::create([
                'nama_barang' => $request->nama_barang,
                'consum_id' => $request->consum_id,
                'jumlah' => $request->jumlah,
                'ket' => $request->ket,
                'pencatat' => $request->pencatat,
                'tanggal' => date('d/m/Y'),
            ]);

            $kondisi = $consum->jumlah;

            if($kondisi == 0) {

                $consum->update([
                    'kondisi' => 'Stock Habis',
                ]);

            } elseif(($kondisi > 0) && ($kondisi <= 5)){

                $consum->update([
                    'kondisi' => 'Stock Sedikit',
                ]);

            } elseif($kondisi > 5) {

                $consum->update([
                    'kondisi' => 'Stock Banyak',
                ]);

            }

            DB::commit();

            return redirect()->route('consumTable')->with('success', 'Barang Consum Berhasil di Tambah');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }


    }

    public function update_keluar(Request $request, $id) // Update barang keluar
    {
        // dd($request->all());
        $this->validate($request, [
            'jumlah' => ['numeric', 'required', 'min:1'],
            'ket' => ['required', 'nullable'],
        ]);

        DB::beginTransaction();

        try {

            $consum = Consum::find($id);

            if ($consum->jumlah >= $request->jumlah) {

                $consum->update([
                    'nama_barang' => $consum->nama_barang,
                    'jumlah' => $consum->jumlah - $request->jumlah,
                ]);

                ConsumKeluar::create([
                    'nama_barang' => $request->nama_barang,
                    'consum_id' => $request->id,
                    'jumlah' => $request->jumlah,
                    'ket' => $request->ket,
                    'pencatat' => $request->pencatat,
                    'tanggal' => date('d/m/Y'),
                ]);

            } else {
                return back()->with('gagal', 'Failed');
            }

            $kondisi = $consum->jumlah;

            if($kondisi == 0) {

                $consum->update([
                    'kondisi' => 'Stock Habis',
                ]);

            } elseif(($kondisi > 0) && ($kondisi <= 5)){

                $consum->update([
                    'kondisi' => 'Stock Sedikit',
                ]);

            } elseif($kondisi > 5) {

                $consum->update([
                    'kondisi' => 'Stock Banyak',
                ]);

            }

            DB::commit();
            return redirect()->route('consumTable')->with('success', 'Data Berhasil di Submit');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function store(Request $request) // Create barang baru
    {
        $request->validate([
            'nama_barang' => ['required', 'unique:consums', 'max:200'],
            'jumlah' => ['required', 'numeric', 'min:1'],
            'note' => ['max:255', 'nullable', 'string'],
            'lokasi' => ['required', 'string', 'max:255'],
            'satuan' => ['required', 'string', 'max:255'],
            'itemcode' => ['numeric', 'digits:6', 'required'],
            'pencatat' => ['required', 'string', 'max:255'],
        ]);

        DB::beginTransaction();

        try {

            $consum = Consum::create([
                'nama_barang' => $request->nama_barang,
                'jumlah' => $request->jumlah,
                'note' => $request->note,
                'satuan' => $request->satuan,
                'lokasi' => $request->lokasi,
                'itemcode' => $request->itemcode,
            ]);

            ConsumMasuk::create([
                'nama_barang' => $request->nama_barang,
                'consum_id' => $consum->id,
                'jumlah' => $request->jumlah,
                'ket' => $request->note,
                'pencatat' => $request->pencatat,
                'tanggal' => date('d/m/Y'),
            ]);

            $kondisi = $consum->jumlah;

            if($kondisi == 0) {

                $consum->update([
                    'kondisi' => 'Stock Habis',
                ]);

            } elseif(($kondisi <= 5) && ($kondisi > 0)) {

                $consum->update([
                    'kondisi' => "Stock Sedikit"
                ]);

            } elseif($kondisi > 5) {

                $consum->update([
                    'kondisi' => "Stock Banyak"
                ]);
            }

            DB::commit();

            return redirect()->route('consumTable')->with('success', 'Barang Consum Berhasil di Tambah');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }


    }

    public function update_itemcode(Request $request, $id)
    {
        $request->validate([
            'itemcode' => ['required', 'numeric', 'digits:6'],
            'satuan' => ['required', 'string', 'max:255'],
            'consum_id' => ['required', 'numeric'],
            'nama_barang' => ['required', 'string', 'max:255'],
            'lokasi' => ['required', 'string', 'max:255'],
        ]);

        DB::beginTransaction();

        try {

            $getItemcode = Consum::findOrFail($id);
            $kondisi = $getItemcode->jumlah;

            if($kondisi == 0){

                $getItemcode->update([
                    'itemcode' => $request->itemcode,
                    'satuan' => $request->satuan,
                    'consum_id' => $request->consum_id,
                    'nama_barang' => $request->nama_barang,
                    'lokasi' => $request->lokasi,
                    'kondisi' => "Stock Habis"
                ]);

            } elseif(($kondisi <= 5) && ($kondisi > 0)) {

                $getItemcode->update([
                    'itemcode' => $request->itemcode,
                    'satuan' => $request->satuan,
                    'consum_id' => $request->consum_id,
                    'nama_barang' => $request->nama_barang,
                    'lokasi' => $request->lokasi,
                    'kondisi' => "Stock Sedikit"
                ]);

            } elseif($kondisi > 5) {

                $getItemcode->update([
                    'itemcode' => $request->itemcode,
                    'satuan' => $request->satuan,
                    'consum_id' => $request->consum_id,
                    'nama_barang' => $request->nama_barang,
                    'lokasi' => $request->lokasi,
                    'kondisi' => "Stock Banyak"
                ]);
            }

            DB::commit();

            return redirect()->route('consumTable')->with('success', 'Data Berhasil di Update');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }



    // Import From Excel
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



    // Export From Excel
    public function export_table() // Export data consumable to excel
    {
        $consum = Consum::select('id', 'nama_barang', 'itemcode', 'jumlah', 'satuan', 'kondisi', 'note', 'lokasi')->get();
        return Excel::download(new ConsumExport($consum), 'Consumable.xlsx');
    }

    public function export_masuk() // Export data consum masuk to excel
    {
        $masuk = ConsumMasuk::select('id', 'consum_id', 'nama_barang', 'jumlah', 'ket', 'pencatat', 'tanggal')->get();
        return Excel::download(new ConsumMasukExport($masuk), 'ConsumMasuk.xlsx');
    }

    public function export_keluar() // Export data consum keluar to excel
    {
        $keluar = ConsumKeluar::select('id', 'consum_id', 'nama_barang', 'jumlah', 'ket', 'pencatat', 'tanggal')->get();
        return Excel::download(new ConsumKeluarExport($keluar), 'ConsumKeluar.xlsx');
    }




    // Export PDF
    public function export_pdf()
    {

    }



    // Yajra Datatable
    public function consum_yajra_show() // Get seluruh data consumable
    {
        $consum = DB::table('consums')
            ->select('consums.*');
            return DataTables::of($consum)
            ->addColumn('action', 'consum.update')
            ->make(true);
    }

    public function consum_yajra_masuk() // Get seluruh data barang masuk consumable
    {
        $masuk = DB::table('consum_masuks')
            ->select('consum_masuks.*');
            return Datatables::of($masuk)
            ->make(true);
    }

    public function consum_yajra_keluar() // Get seluruh data barang keluar consumable
    {
        $keluar = DB::table('consum_keluars')
            ->select('consum_keluars.*');
            return Datatables::of($keluar)
            ->make(true);
    }
}
