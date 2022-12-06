<?php

namespace App\Exports;

use App\Models\{Internal, InternalVisitor};
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\{FromQuery, Exportable, FromView, WithStyles};
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class InternalExport implements FromView, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;
    public $start;
    public $end;

    public function __construct(string $start, string $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function view(): View
    {
        return view('exports.internal', [
            'internals' => InternalVisitor::with('internal')->whereBetween('updated_at', [$this->start, $this->end])->where('is_done', true)->get()
        ]);
    }

    // public function headings(): array
    // {
    //     return [
    //         'No.',
    //         'Internal_id',
    //         'Requestor Dept',
    //         'Visitor Name',
    //         'Visitor Company',
    //         'Visitor Department',
    //         'Visitor Responsibility',
    //         'Visitor Number ID',
    //         'Visitor Phone',
    //         'Visitor Checkin',
    //         'Photo Checkin',
    //         'Visitor Checkout',
    //         'Photo Checkout',
    //         'done',
    //         'created_at',
    //         'updated_at',
    //     ];
    // }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }
}
