<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\{FromCollection, ShouldAutoSize, WithHeadings, WithStyles};
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AssetExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function collection()
    {
        return $this->table;
    }

    public function headings(): array
    {
        return [
            'Kode Barang',
            'Nama Barang',
            'Item Code',
            'Jumlah',
            'Digunakan',
            'Sisa',
            'Satuan',
            'Kondisi',
            'Note',
            'Lokasi',
        ];
    }

    public function map($table): array
    {
        return [
            $table->id,
            $table->nama_barang,
            isset($table->itemcode) ? $table->itemcode : null,
            $table->jumlah,
            $table->digunakan,
            $table->sisa,
            $table->satuan,
            $table->kondisi,
            $table->note,
            $table->lokasi,
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
