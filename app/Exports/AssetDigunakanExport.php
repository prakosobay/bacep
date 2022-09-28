<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\AssetUse;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AssetDigunakanExport implements FromCollection, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AssetUse::all();
    }

    public function headings(): array
    {
        return [
            'no.',
            'Kode Barang',
            'Nama Barang',
            'Jumlah',
            'Ket',
            'Pencatat',
            'tanggal',
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
