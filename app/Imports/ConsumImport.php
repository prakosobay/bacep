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
        // Consum::truncate();
        foreach ($rows as $row) {
            Consum::create([
                'id' => $row[0],
                'nama_barang' => $row[1],
                'itemcode' => $row[2],
                'jumlah' => $row[3],
                'satuan' => $row[4],
                'kondisi' => $row[5],
                'note' => $row[6],
                'lokasi' => $row[7],
            ]);
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}
