<?php

namespace App\Imports;

use App\Models\{Asset};
use Maatwebsite\Excel\Concerns\{ToModel, WithHeadingRow, ToCollection};

class FirstSheetImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        //
    }
}

class AssetImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function sheets(): array
    {
        return [
            0 => new FirstSheetImport(),
            1 => new SecondSheetImport(),
        ];
    }
    // public function model(array $row)
    // {
    //     echo '<pre>';
    //     var_dump($row);
    //     die;
    //     return new Asset([
    //         // 'id' => $row['kode_barang'],
    //         'nama_barang' => $row['nama_barang'],
    //         'jumlah' => $row['jumlah'],
    //         'satuan' => $row['satuan'],
    //         'kondisi' => $row['kondisi'],
    //         'note' => $row['note'],
    //         'lokasi' => $row['lokasi'],
    //     ]);
    // }
}
