<?php

namespace App\Http\Controllers;

use App\Exports\{ConsumKeluarExport, ConsumExport, ConsumMasukExport};
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Imports\ConsumImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session};
use App\Models\{ConsumMasuk, Consum, ConsumKeluar};
use Illuminate\Http\Request;

class ConsumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if ((Gate::allows('isHead')) || (Gate::allows('isApproval')) || (Gate::allows('isAdmin'))) {
            $consum = Consum::all();
            return view('consum.table', ['consum' => $consum]);
        } else {
            abort(403, 'Anda Tidak Punya Akses Ke Halaman Ini');
        }
    }

    public function show_new()
    {
        if ((Gate::allows('isAdmin')) || (Gate::allows('isApproval')) || (Gate::allows('isHead'))) {
            return view('consum.new');
        } else {
            abort(403, 'Anda Tidak Punya Akses Ke Halaman Ini');
        }
    }

    public function show_in()
    {
        if (Gate::allows('isHead') || (Gate::allows('isApproval')) || (Gate::allows('isAdmin'))) {
            $in = ConsumMasuk::all();
            return view('consum.masuk', ['in' => $in]);
        } else {
            abort(403,  'Anda Tidak Punya Akses Ke Halaman Ini');
        }
    }

    public function show_out()
    {
        if (Gate::allows('isHead') || (Gate::allows('isApproval')) || (Gate::allows('isAdmin'))) {
            $out = ConsumKeluar::all();
            return view('consum.keluar', ['out' => $out]);
        } else {
            abort(403,  'Anda Tidak Punya Akses Ke Halaman Ini');
        }
    }

    public function edit_masuk($id)
    {
        if (Gate::allows('isAdmin') || (Gate::allows('isApproval')) || (Gate::allows('isHead'))) {
            $consum = Consum::find($id);
            return view('consum.tambah', compact('consum'));
        } else {
            abort(403,  'Anda Tidak Punya Akses Ke Halaman Ini');
        }
    }

    public function edit_keluar($id)
    {
        if (Gate::allows('isAdmin') || (Gate::allows('isApproval')) || (Gate::allows('isHead'))) {
            $consum = Consum::find($id);
            // dd($consum);
            return view('consum.kurang', compact('consum'));
        } else {
            abort(403,  'Anda Tidak Punya Akses Ke Halaman Ini');
        }
    }

    public function update_masuk(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            'nama_barang' => ['required'],
            'consum_id' => ['required', 'numeric'],
            'jumlah' => ['numeric', 'required', 'min:1'],
            'ket' => 'required',
            'pencatat' => ['required', 'string'],
            // 'itemcode' => ['required', 'numeric'],
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

    public function update_keluar(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            'nama_barang' => ['required'],
            'consum_id' => ['required', 'numeric'],
            'jumlah' => ['numeric', 'required', 'min:1'],
            'ket' => 'required',
            'pencatat' => ['required', 'string'],
            // 'itemcode' => ['required', 'numeric'],
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

    public function store_consum(Request $request)
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

    public function csv(Request $request)
    {
        $i = Excel::import(new ConsumImport, $request->file('file'));
        return back()->with('success', 'Excel Data Imported successfully.');
    }

    public function export_consum()
    {
        return Excel::download(new ConsumExport, 'Consum.xlsx');
    }

    public function export_consum_masuk()
    {
        return Excel::download(new ConsumMasukExport, 'ConsumMasuk.xlsx');
    }

    public function export_consum_keluar()
    {
        return Excel::download(new ConsumKeluarExport, 'ConsumKeluar.xlsx');
    }
}
