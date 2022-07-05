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

    public function collection(Collection $rows)
    {
        // echo '<pre>';
        // var_dump($rows);
        // die;
        foreach ($rows as $row) {
            Consum::create([
                'id' => $row[0],
                'nama_barang' => $row[1],
                'jumlah' => $row[5],
                'satuan' => $row[6],
                'kondisi' => $row[7],
                'note' => $row[8],
                'lokasi' => $row[9],
            ]);
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}
