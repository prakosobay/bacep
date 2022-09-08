<?php

namespace App\Exports;

use App\Models\OtherPersonil;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class MaintenanceExport implements FromCollection, WithStyles, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return OtherPersonil::all();
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
            'NIK',
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
