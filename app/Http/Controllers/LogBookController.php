<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\InternalExport;
use Illuminate\Support\Facades\{DB, Mail};
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\{Internal, Eksternal, InternalVisitor};
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class LogBookController extends Controller
{
    public function internal_pdf(Request $request)
    {
        $request->validate([
            'from' => ['required', 'date'],
            'to' => ['required', 'date'],
        ]);
        $date = $request->all();

        $start = Carbon::parse($date['from'])->toDateTimeString();
        $end = Carbon::parse($date['to'])->toDateTimeString();

        $internals = InternalVisitor::with('internal')->whereBetween('updated_at', [$start, $end])->where('is_done', true)->get();
        $pdf = PDF::loadview('internal.logbook', compact('internals'))->setPaper('a4', 'landscape')->setWarnings(false);
        return $pdf->stream();
    }

    public function internal_excel(Request $request)
    {
        $request->validate([
            'from' => ['required', 'date'],
            'to' => ['required', 'date'],
        ]);

        $start = Carbon::parse($request->from)->toDateTimeString();
        $end = Carbon::parse($request->to)->toDateTimeString();

        return (new InternalExport($start, $end))->download('Internal Finished.xlsx');
    }
}
