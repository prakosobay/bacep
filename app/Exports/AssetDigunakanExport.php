<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\{FromCollection, ShouldAutoSize, WithStyles, WithHeadings};
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AssetDigunakanExport implements FromCollection, WithStyles, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $digunakan;
    private $count = 1;

    public function __construct($digunakan)
    {
        $this->digunakan = $digunakan;
    }

    public function collection()
    {
        return $this->digunakan;
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

    public function map($digunakan): array
    {
        return [
            $this->count++,
            $digunakan->asset_id,
            $digunakan->nama_barang,
            $digunakan->jumlah,
            $digunakan->ket,
            $digunakan->pencatat,
            $digunakan->tanggal,
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
