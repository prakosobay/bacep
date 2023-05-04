<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\{FromCollection, ShouldAutoSize, WithHeadings, WithStyles};

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ConsumKeluarExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $keluar;
    private $count = 1;

    public function __construct($keluar)
    {
        $this->keluar = $keluar;
    }

    public function collection()
    {
        return $this->keluar;
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

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }

    public function map($keluar): array
    {
        return [
            $this->count++,
            $keluar->consum_id,
            $keluar->nama_barang,
            $keluar->jumlah,
            $keluar->ket,
            $keluar->pencatat,
            $keluar->tanggal,
        ];
    }
}
