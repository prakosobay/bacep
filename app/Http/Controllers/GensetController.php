<?php

namespace App\Http\Controllers;

use App\Models\Genset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class GensetController extends Controller
{
    public function show_warming()
    {
        return view('checklist.form');
    }

    public function store_warming(Request $request)
    {
        // dd($request->all());
        // var_dump($request->all());
        // die;
        $this->validate($request, [
            '1' => ['required', 'boolean'],
            '2' => ['required', 'boolean'],
            '3' => ['required', 'boolean'],
            '4' => ['required', 'boolean'],
            '5' => ['required', 'boolean'],
            '6' => ['required', 'boolean'],
            '7' => ['required', 'boolean'],
            '8' => ['required', 'boolean'],
            '9' => ['required', 'boolean'],
            '10' => ['required', 'boolean'],
            '1a' => ['required', 'boolean'],
            '2a' => ['required', 'boolean'],
            '3a' => ['required', 'boolean'],
            '4a' => ['required', 'boolean'],
            '5a' => ['required', 'boolean'],
            '6a' => ['required', 'boolean'],
            '7a' => ['required', 'boolean'],
            '8a' => ['required', 'boolean'],
            '9a' => ['required', 'boolean'],
            '10a' => ['required', 'boolean'],
            '11a' => ['required', 'boolean'],
            'remark1' => ['required', 'string'],
            'remark2' => ['required', 'string'],
            'remark3' => ['required', 'string'],
            'remark4' => ['required', 'string'],
            'remark5' => ['required', 'string'],
            'remark6' => ['required', 'string'],
            'remark7' => ['required', 'string'],
            'remark8' => ['required', 'string'],
            'remark9' => ['required', 'string'],
            'remark10' => ['required', 'string'],
            'remark11' => ['required', 'string'],
            'remark1a' => ['required', 'string'],
            'remark2a' => ['required', 'string'],
            'remark3a' => ['required', 'string'],
            'remark4a' => ['required', 'string'],
            'remark5a' => ['required', 'string'],
            'remark6a' => ['required', 'string'],
            'remark7a' => ['required', 'string'],
            'remark8a' => ['required', 'string'],
            'remark9a' => ['required', 'string'],
            'remark10a' => ['required', 'string'],
            'remark11a' => ['required', 'string'],
            'date1' => ['required', 'string'],
            'date2' => ['required', 'string'],
            'time1' => ['required', 'string'],
            'time2' => ['required', 'string'],
        ]);

        $check = Genset::create($request);
        Alert::success('Success', 'Good');
        return back();
    }
}
