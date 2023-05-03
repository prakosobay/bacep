<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\{FromCollection, ShouldAutoSize, WithHeadings, WithStyles};
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ConsumExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $consum;
    public function collection()
    {
        return $this->consum;
    }

    public function __construct($consum)
    {
        $this->consum = $consum;
    }

    public function headings(): array
    {
        return [
            'Kode Barang',
            'Nama Barang',
            'Item Code',
            'Jumlah',
            'Satuan',
            'Kondisi',
            'Note',
            'Lokasi',
        ];
    }

    public function map($consum): array
    {
        return [
            $consum->id,
            $consum->nama_barang,
            isset($consum->itemcode) ? $consum->itemcode : null,
            $consum->jumlah,
            $consum->satuan,
            $consum->kondisi,
            $consum->note,
            $consum->lokasi,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
        ];
    }
}
