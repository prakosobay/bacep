<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session};
use App\Models\{ConsumMasuk, Consum, ConsumGambar, User};
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
            'nama_barang' => 'required|unique:consums',
            'jumlah' => 'required|numeric',
            'satuan' => 'required',
            'notes' => 'required',
            'lokasi' => 'required',
            'file' => 'image|required|file|max:2048',
        ]);

        // dd($request);
        $input = $request->all();

        $consum = Consum::create($input);
        if ($consum->exists) {
            $masukHistory = ConsumMasuk::create([
                'consum_id' => $consum->consum_id,
                'masuk' => $consum->nama_barang,
                'jumlah' => $consum->jumlah,
                'ket' => $consum->notes,
                'pencatat' => Auth::user()->name,
            ]);

            $gambarHistory = ConsumGambar::create([
                'consum_id' => $consum->consum_id,
                'nama_barang' => $consum->nama_barang,
                'file' => $request->file('file')->store('consum-image'),
            ]);
        }

        // if ($masukHistory->exist) {
        //
        // }
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
            'jumlah' => 'required|numeric',
            'ket' => 'required',
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
