<?php

namespace App\Imports;

use App\Models\{Consum, ConsumKeluar, ConsumMasuk};
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\{ToCollection, WithStartRow};

class ConsumKeluarImport implements ToCollection, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function collection(Collection $rows2)
    {
        // echo '<pre>';
        // var_dump($rows2);
        // die;
        // ConsumKeluar::truncate();
        foreach ($rows2 as $row) {
            ConsumKeluar::create([
                'id' => $row[0],
                'consum_id' => $row[1],
                'nama_barang' => $row[2],
                'jumlah' => $row[3],
                'ket' => $row[4],
                'pencatat' => $row[5],
                'tanggal' => $row[6],
            ]);
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}
