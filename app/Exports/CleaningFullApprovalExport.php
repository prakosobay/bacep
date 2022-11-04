<?php

namespace App\Exports;

use App\Models\CleaningFull;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CleaningFullApprovalExport implements FromView, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return CleaningFull::query();
    // }

    public function view(): View
    {
        return view('exports.cleaning', [
            'fulls' => CleaningFull::query()
                    ->leftJoin('cleanings', 'cleaning_fulls.cleaning_id', '=', 'cleanings.cleaning_id')
                    ->leftJoin('penomoran_cleanings', 'cleaning_fulls.cleaning_id', '=', 'penomoran_cleanings.permit_id')
                    ->where('penomoran_cleanings.type', 'cleaning')
                    ->select('cleaning_fulls.*', 'cleanings.validity_to as leave', 'penomoran_cleanings.*')
                    ->get(),
        ]);
    }

    // public function headings(): array
    // {
    //     return [
    //         'ID',
    //         'Purpose of Work',
    //         'Visit',
    //         'Leave',
    //         'Visitor Name',
    //         'Visitor Name 2',
    //         'Checkin Visitor',
    //         'Checkin Visitor 2',
    //         'Checkout Visitor',
    //         'Checkout Visitor 2',
    //         'Link',
    //         'Photo Checkin Visitor',
    //         'Photo Checkin Visitor 2',
    //         'Photo Checkout Visitor',
    //         'Photo Checkout Visitor 2',
    //     ];
    // }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
        ];
    }
}
