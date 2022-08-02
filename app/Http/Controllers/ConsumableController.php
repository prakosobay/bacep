<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsumableController extends Controller
{
    // show pages
    public function consumable_form()
    {
        return view('consumableForm');
    }




    // Submit
    public function consumable_store(Request $request)
    {
        // dd($request->all());

        $validated = $request->validate([
            'req_name' => ['required', 'max:255'],
            'req_email' => ['required', 'email', 'max:255'],
            'req_phone' => ['required', 'max:255'],
            'req_company' => ['required', 'max:255'],
            'req_dept' => ['required', 'max:255'],

        ]);

        return $validated;
    }
}
