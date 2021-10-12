<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\ConsumImport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session};
use App\Models\{ConsumMasuk, Consum, ConsumGambar, ConsumKeluar, User};
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
            return view('consum.kurang', compact('consum'));
        } else {
            abort(403,  'Anda Tidak Punya Akses Ke Halaman Ini');
        }
    }

    public function update_masuk(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'nama_barang' => 'required',
            'consum_id' => 'required|numeric',
            'jumlah' => 'numeric|required',
            'ket' => 'required',
            'pencatat' => 'required'
        ]);

        $consum = Consum::find($id);
        $consum->update([
            'jumlah' => $consum->jumlah + $request->jumlah,
        ]);

        $consummasuk = ConsumMasuk::create([
            'nama_barang' => $request->nama_barang,
            'consum_id' => $request->consum_id,
            'jumlah' => $request->jumlah,
            'ket' => $request->ket,
            'pencatat' => $request->pencatat,
        ]);

        return $consummasuk->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
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

        $consum = Consum::find($id);
        if ($consum->jumlah >= $request->jumlah) {
            $consum->update([
                'jumlah' => $consum->jumlah - $request->jumlah,
            ]);
        }

        $consumkeluar = ConsumKeluar::create([
            'nama_barang' => $request->nama_barang,
            'consum_id' => $request->consum_id,
            'jumlah' => $request->jumlah,
            'ket' => $request->ket,
            'pencatat' => $request->pencatat,
        ]);

        return $consumkeluar->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
    }

    public function csv(Request $request)
    {
        $i = Excel::import(new ConsumImport, $request->file('file'));
    }
}
