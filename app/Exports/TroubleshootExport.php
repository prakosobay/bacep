<?php

namespace App\Exports;

use App\Models\TroubleshootBmFull;
use App\Models\TroubleshootBmPersonil;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TroubleshootExport implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TroubleshootBmPersonil::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'other_id',
            'Name',
            'Company',
            'Department',
            'Responsibility',
            'Phone',
            'Number ID',
            'Checkin',
            'Checkout',
            'Photo Checkin',
            'Photo Checkout',
            'Deleted_at',
            'Created_at',
            'Updated_at',
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
