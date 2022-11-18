<?php

namespace App\Exports;

use App\Models\{Eksternal, EksternalVisitor};
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\{FromQuery, Exportable, FromView, WithStyles};
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class EksternalExport implements FromView, WithStyles
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

    // public function query()
    // {
    //     return EksternalVisitor::query()->whereBetween('created_at', [$this->start, $this->end]);
    // }

    public function view(): View
    {
        return view('exports.eksternal', [
            'eksternals' => EksternalVisitor::with('eksternal')->whereBetween('updated_at', [$this->start, $this->end])->where('checkout', '!=', null)->get()
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
