<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\{FromCollection, ShouldAutoSize, WithStyles, WithHeadings};
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AssetMasukExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $masuk;
    private $count = 1;

    public function __construct($masuk)
    {
        $this->masuk = $masuk;
    }

    public function collection()
    {
        return $this->masuk;
    }

    public function headings(): array
    {
        return [
            'No.',
            'Kode Barang',
            'Nama Barang',
            'Jumlah',
            'Ket',
            'Pencatat',
            'Tanggal',
        ];
    }

    public function map($masuk): array
    {
        return [
            $this->count++,
            $masuk->asset_id,
            $masuk->nama_barang,
            $masuk->jumlah,
            $masuk->ket,
            $masuk->pencatat,
            $masuk->tanggal,
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
