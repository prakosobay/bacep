<?php

namespace App\Exports;

use App\Models\OtherPersonil;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class MaintenanceExport implements FromView, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return OtherPersonil::all();
    // }

    public function view(): View
    {
        return view('exports.maintenance', [
            'fulls' => OtherPersonil::query()
                    ->leftJoin('others', 'other_personils.other_id', '=', 'others.id')
                    ->leftJoin('penomoran_cleanings', 'others.id', '=', 'penomoran_cleanings.permit_id')
                    ->where('penomoran_cleanings.type', 'maintenance')
                    ->where('other_personils.deleted_at', null)
                    ->select(
                        'other_personils.*',
                        'others.work as work',
                        'penomoran_cleanings.*',
                        'others.visit as visit',
                        'others.leave as leave',
                        )
                    ->get(),
        ]);
    }

    // public function headings(): array
    // {
    //     return [
    //         'id',
    //         'other_id',
    //         'Name',
    //         'Company',
    //         'Department',
    //         'Responsibility',
    //         'Phone',
    //         'NIK',
    //         'Checkin',
    //         'Checkout',
    //         'Photo Checkin',
    //         'Photo Checkout',
    //         'Deleted_at',
    //         'Created_at',
    //         'Updated_at',
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
