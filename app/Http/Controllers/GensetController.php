<?php

namespace App\Http\Controllers;

use App\Models\Genset;
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
        // return $check->exists ? response()->json(['status' => 'FAILED']) : response()->json(['status' => 'SUCEESS']);

        // $this->validate($request, [
        //     '1' => ['required', 'boolean'],
        //     '2' => ['required', 'boolean'],
        //     '3' => ['required', 'boolean'],
        //     '4' => ['required', 'boolean'],
        //     '5' => ['required', 'boolean'],
        //     '6' => ['required', 'boolean'],
        //     '7' => ['required', 'boolean'],
        //     '8' => ['required', 'boolean'],
        //     '9' => ['required', 'boolean'],
        //     '10' => ['required', 'boolean'],
        //     '11' => ['required', 'boolean'],
        //     '1a' => ['required', 'boolean'],
        //     '2a' => ['required', 'boolean'],
        //     '3a' => ['required', 'boolean'],
        //     '4a' => ['required', 'boolean'],
        //     '5a' => ['required', 'boolean'],
        //     '6a' => ['required', 'boolean'],
        //     '7a' => ['required', 'boolean'],
        //     '8a' => ['required', 'boolean'],
        //     '9a' => ['required', 'boolean'],
        //     '10a' => ['required', 'boolean'],
        //     '11a' => ['required', 'boolean'],
        //     'remark1' => ['required', 'string'],
        //     'remark2' => ['required', 'string'],
        //     'remark3' => ['required', 'string'],
        //     'remark4' => ['required', 'string'],
        //     'remark5' => ['required', 'string'],
        //     'remark6' => ['required', 'string'],
        //     'remark7' => ['required', 'string'],
        //     'remark8' => ['required', 'string'],
        //     'remark9' => ['required', 'string'],
        //     'remark10' => ['required', 'string'],
        //     'remark11' => ['required', 'string'],
        //     'remark1a' => ['required', 'string'],
        //     'remark2a' => ['required', 'string'],
        //     'remark3a' => ['required', 'string'],
        //     'remark4a' => ['required', 'string'],
        //     'remark5a' => ['required', 'string'],
        //     'remark6a' => ['required', 'string'],
        //     'remark7a' => ['required', 'string'],
        //     'remark8a' => ['required', 'string'],
        //     'remark9a' => ['required', 'string'],
        //     'remark10a' => ['required', 'string'],
        //     'remark11a' => ['required', 'string'],
        //     'date1' => ['required', 'string'],
        //     'date2' => ['required', 'string'],
        //     'time1' => ['required', 'string'],
        //     'time2' => ['required', 'string'],
        // ]);

    }
}
