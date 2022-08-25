<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colo;
use Illuminate\Support\Facades\{Crypt, DB, Email};

class ColoController extends Controller
{
    public function form()
    {
        return view('colo.form');
    }


    public function isVisitor($company, $dept)
    {
        // dd($company);
        return view('colo.log');

    }


    public function finished($company, $dept)
    {
        return view('colo.finished');
    }


    public function last_form($company, $dept)
    {
        return view('colo.lastForm');
    }




    // Submit
    public function store(Request $request)
    {
        dd($request->all());
        $getForm = $request->all();
        $request->validate([
            'work' => ['required'],
            'dc' => ['required_without_all:mmr1,mmr2,cctv,lain'],
            'visit' => ['required', 'after:yesterday'],
            'leave' => ['required', 'after_or_equal:visit'],
            'background' => ['required'],
            'desc' => ['required'],
            'rack' => ['required'],
        ]);

        DB::beginTransaction();

        try {
            $insertForm = Colo::create([
                'work' => $getForm['work'],
                'visit' => $getForm['visit'],
                'leave' => $getForm['leave'],
                'background' => $getForm['background'],
                'desc' => $getForm['desc'],
                'testing' => $getForm['testing'],
                'rollback' => $getForm['rollback'],
                'rack' => $getForm['rack'],
                'req_email' => Auth::user()->email,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
