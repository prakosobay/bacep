<?php

namespace App\Imports;

use App\Models\{Consum, ConsumKeluar, ConsumMasuk};
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\{ToCollection, WithStartRow};

class ConsumImport implements ToCollection, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */


    // public function collection(Collection $rows1)
    // {
    //     // echo '<pre>';
    //     // var_dump($rows1);
    //     // die;
    //     foreach ($rows1 as $row) {
    //         Consum::create([
    //             'nama_barang' => $row[1],
    //             'jumlah' => $row[5],
    //             'satuan' => $row[6],
    //             // 'kondisi' => $row[7],
    //             'note' => $row[8],
    //             'lokasi' => $row[9],
    //         ]);
    //     }
    // }


    // public function collection(Collection $rows3)
    // {
    //     // echo '<pre>';
    //     // var_dump($rows3);
    //     // die;
    //     foreach ($rows3 as $row) {
    //         ConsumMasuk::create([
    //             'tanggal' => $row[0],
    //             'consum_id' => $row[1],
    //             'nama_barang' => $row[2],
    //             'jumlah' => $row[3],
    //             'ket' => $row[4],
    //             'pencatat' => $row[5],
    //         ]);
    //     }
    // }

    public function collection(Collection $rows2)
    {
        // echo '<pre>';
        // var_dump($rows2);
        // die;
        foreach ($rows2 as $row) {
            ConsumKeluar::create([
                'tanggal' => $row[0],
                'consum_id' => $row[1],
                'nama_barang' => $row[2],
                'jumlah' => $row[3],
                'ket' => $row[4],
                'pencatat' => $row[5],
            ]);
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}
