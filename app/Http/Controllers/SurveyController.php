<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Nullable;
use Validator;

class SurveyController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'date_of_visit' => ['required', 'date', 'after:yesterday'],
            'date_of_leave' => ['required', 'date', 'after:yesterday', 'after_or_equal:date_of_visit'],
            'nama_requestor' => ['required', 'string', 'max:100'],
            'dept_requestor' => ['required', 'string', 'max:200'],
            'phone_requestor' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'visitor_name1' => ['required', 'string', 'max:100'],
            'visitor_nik1' => ['required'],
            'visitor_phone1' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'visitor_company1' => ['required', 'string', 'max:200'],
            'visitor_dept1' => ['required', 'string', 'max:200'],
            'visitor_name2' => ['string', 'max:100', 'nullable'],
            'visitor_phone2' => ['regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'nullable'],
            'visitor_company2' => ['string', 'max:200', 'nullable'],
            'visitor_dept2' => ['string', 'max:200', 'nullable'],
            'visitor_name3' => ['string', 'max:100', 'nullable'],
            'visitor_phone3' => ['regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'nullable'],
            'visitor_company3' => ['string', 'max:200', 'nullable'],
            'visitor_dept3' => ['string', 'max:200', 'nullable'],
            'visitor_name4' => ['string', 'max:100', 'nullable'],
            'visitor_phone4' => ['regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'nullable'],
            'visitor_company4' => ['string', 'max:200', 'nullable'],
            'visitor_dept4' => ['string', 'max:200', 'nullable'],
            'visitor_name5' => ['string', 'max:100', 'nullable'],
            'visitor_phone5' => ['regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'nullable'],
            'visitor_company5' => ['string', 'max:200', 'nullable'],
            'visitor_dept5' => ['string', 'max:200', 'nullable'],
        ]);

        return "done";
    }
}
