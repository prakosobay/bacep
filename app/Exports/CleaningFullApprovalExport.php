<?php

namespace App\Exports;

use App\Models\CleaningFull;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CleaningFullApprovalExport implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CleaningFull::all();
    }

    public function headings(): array
    {
        return [
            'No.',
            'ID',
            'Purpose of Work',
            'Visit',
            'Leave',
            'Visitor Name',
            'Visitor Name 2',
            'Checkin Visitor',
            'Checkin Visitor 2',
            'Checkout Visitor',
            'Checkout Visitor 2',
            'Link',
            'Photo Checkin Visitor',
            'Photo Checkin Visitor 2',
            'Photo Checkout Visitor',
            'Photo Checkout Visitor 2',
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
