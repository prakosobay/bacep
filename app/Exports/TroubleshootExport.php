<?php

namespace App\Exports;

use App\Models\TroubleshootBmPersonil;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TroubleshootExport implements FromView, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return TroubleshootBmPersonil::all();
    // }

    public function view(): View
    {
        return view('exports.troubleshoot', [
            'fulls' => TroubleshootBmPersonil::query()
                    ->leftJoin('troubleshoot_bms', 'troubleshoot_bm_personils.troubleshoot_bm_id', '=', 'troubleshoot_bms.id')
                    ->leftJoin('penomoran_cleanings', 'troubleshoot_bms.id', '=', 'penomoran_cleanings.permit_id')
                    ->where('penomoran_cleanings.type', 'troubleshoot')
                    ->where('troubleshoot_bm_personils.deleted_at', null)
                    ->select(
                        'troubleshoot_bm_personils.*',
                        'troubleshoot_bms.work as work',
                        'penomoran_cleanings.*',
                        'troubleshoot_bms.visit as visit',
                        'troubleshoot_bms.leave as leave',
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
    //         'Number ID',
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
