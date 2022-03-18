<?php

namespace App\Http\Controllers;

use App\Models\Genset;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class GensetController extends Controller
{
    public function show_warming()
    {
        return view('checklist.form');
    }

    public function index()
    {
        $table = Genset::all();
        // dd($table);
        return view('checklist.table', compact('table'));
    }

    public function show($id)
    {
        $show = Genset::find($id);
        // dd($show);
        return view('checklist.show', compact('show'));
    }

    public function store_warming(Request $request)
    {
        // dd($request->all());
        $form = $request->all();
        $check = Genset::create($form);
        Alert::success('Success', 'Data has been submited');
        return redirect()->route('table_barang');
    }

    public function pdf($id)
    {
        $genset = Genset::find($id);
        // dd($genset);
        $pdf = PDF::loadview('checklist.pdf', compact('genset'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream();
    }
}
