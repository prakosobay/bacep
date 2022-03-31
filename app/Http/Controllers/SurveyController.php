<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class SurveyController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name-req' => ['required', 'string', 'max:100'],
            'date_visit' => 'required',
            'date_leave' => ['required', 'date', 'after:date_visit'],
            'dept-req' => ['required', 'string', 'max:200'],
            'phone-req' => ['required', 'numeric', 'max:14'],
            'name1' => ['required', 'string', 'max:100'],
            'nik1' => ['required', 'numeric', 'max:14'],
            'phone1' => ['required', 'numeric', 'max:14'],
            'company1' => ['required', 'string', 'max:200'],
            'dept1' => ['required', 'string', 'max:200'],
            'name2' => ['string', 'max:100'],
            'nik2' => ['numeric', 'max:14'],
            'phone2' => ['numeric', 'max:14'],
            'company2' => ['string', 'max:200'],
            'dept2' => ['string', 'max:200'],
            'name3' => ['string', 'max:100'],
            'nik3' => ['numeric', 'max:14'],
            'phone3' => ['numeric', 'max:14'],
            'company3' => ['string', 'max:200'],
            'dept3' => ['string', 'max:200'],
            'name4' => ['string', 'max:100'],
            'nik4' => ['numeric', 'max:14'],
            'phone4' => ['numeric', 'max:14'],
            'company4' => ['string', 'max:200'],
            'dept4' => ['string', 'max:200'],
            'name5' => ['string', 'max:100'],
            'nik5' => ['numeric', 'max:14'],
            'phone5' => ['numeric', 'max:14'],
            'company5' => ['string', 'max:200'],
            'dept5' => ['string', 'max:200'],
        ]);

        return "done";
    }
}
