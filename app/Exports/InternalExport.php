<?php

namespace App\Exports;

use App\Models\{Internal, InternalVisitor};
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class InternalExport implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return InternalVisitor::all();
    }

    public function headings(): array
    {
        return [
            'No.',
            'Internal_id',
            'Requestor Dept',
            'Visitor Name',
            'Visitor Company',
            'Visitor Department',
            'Visitor Responsibility',
            'Visitor Number ID',
            'Visitor Phone',
            'Visitor Checkin',
            'Photo Checkin',
            'Visitor Checkout',
            'Photo Checkout',
            'done',
            'created_at',
            'updated_at',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }
}
