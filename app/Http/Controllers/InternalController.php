<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InternalController extends Controller
{

    // Show Pages
    public function internal_it_form()
    {
        return view('it.form');
    }


    // Submit
    public function internal_it_create(Request $request)
    {
        // dd($request->all());
        $getForm = $request->all();
        $validated = $request->validate([
            'work' => ['required'],
            'visit' => ['required', 'after:yesterday'],
            'leave' => ['required', 'after_or_equal:visit'],
            'req_name' => ['required'],
            'req_phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'digits_between:10,15'],
            'background' => ['required'],
            'desc' => ['required'],
            'dc' => ['boolean'],
            'mmr1' => ['boolean'],
            'mmr2' => ['boolean'],
            'cctv' => ['boolean'],
        ]);

        if($validated){
            return back()->with('success', 'Berhasil yeeayy');
        }
    }
}
