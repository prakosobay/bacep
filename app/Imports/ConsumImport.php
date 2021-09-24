<?php

namespace App\Imports;

use App\Models\Consum;
use Maatwebsite\Excel\Concerns\{ToModel, WithHeadingRow, WithMultipleSheets};

class ConsumImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    // public function model(array $row)
    // {
    //     return new Consum([
    //         // 'consum_id' => 1,
    //         'kode_barang' => $row[0],
    //         'nama_barang' => $row[1],
    //         'jumlah' => $row[5],
    //         'satuan' => $row[6],
    //         'kondisi' => $row[7],
    //         'note' => $row[8],
    //         'lokasi' => $row[9],
    //     ]);
    // }

    public function model(array $row)
    {
        return new Consum([
            // 'consum_id' => 1,
            'kode_barang' => $row['kode'],
            'nama_barang' => $row['nama'],
            'jumlah' => $row['jumlah'],
            'satuan' => $row['satuan'],
            'kondisi' => $row['kondisi'],
            'note' => $row['note'],
            'lokasi' => $row['lokasi'],
        ]);
    }

    // public function sheets(): array
    // {
    //     return [
    //         0 => new FirstSheetImport(),
    //         1 => new SecondSheetImport(),
    //     ];
    // }

    // public function model(array $row)
    // {
    //     return new Consum([
    //         // 'consum_id' => 1,
    //         'kode_barang' => $row[1],
    //         'nama_barang' => $row[2],
    //         'jumlah' => $row[3],
    //     ]);
    // }
}
