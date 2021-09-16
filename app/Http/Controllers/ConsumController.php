<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session};
use App\Models\{ConsumMasuk, Consum, User};
use Illuminate\Http\Request;

class ConsumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consum = Consum::all();
        return view('consum.stock', ['consum' => $consum]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('consum.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|unique:stock_barangs',
            'jumlah' => 'required|numeric',
            'satuan' => 'required',
            'notes' => 'required',
            'lokasi' => 'required',
        ]);

        $input = $request->all();

        $consum = Consum::create($input);
        // dd($consum);
        if ($consum->exists) {
            $masukHistory = ConsumMasuk::create([
                'stock_barang_id' => $consum->stock_barang_id,
                'masuk' => $consum->nama_barang,
                'jumlah' => $consum->jumlah,
                'ket' => $consum->notes,
                'pencatat' => Auth::user()->name,
            ]);
        }
        return back()->with('success', ' Data baru berhasil ditambah.');
        // return $masukHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consum = Consum::findOrFail($id);

        return view('consum.edit', ['consum' => $consum]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:150',
            'body' => 'required',
        ]);

        $consum = Consum::find($id)->update($request->all());

        return back()->with('success', ' Data consum diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
