<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\ConsumImport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session};
use App\Models\{ConsumMasuk, Consum, ConsumGambar, ConsumKeluar, User};
use Illuminate\Http\Request;

class ConsumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if ((Gate::allows('isHead')) || (Gate::allows('isApproval')) || (Gate::allows('isAdmin'))) {
            $consum = Consum::all();
            return view('consum.table', ['consum' => $consum]);
        } else {
            abort(403);
        }
    }

    public function show_in()
    {
        if (Gate::allows('isHead') || (Gate::allows('isApproval')) || (Gate::allows('isAdmin'))) {
            $in = ConsumMasuk::all();
            return view('consum.masuk', ['in' => $in]);
        } else {
            abort(403);
        }
    }

    public function show_out()
    {
        if (Gate::allows('isHead') || (Gate::allows('isApproval')) || (Gate::allows('isAdmin'))) {
            $out = ConsumKeluar::all();
            return view('consum.keluar', ['out' => $out]);
        } else {
            abort(403);
        }
    }

    public function csv(Request $request)
    {
        $i = Excel::import(new ConsumImport, $request->file('file'));
    }
}
