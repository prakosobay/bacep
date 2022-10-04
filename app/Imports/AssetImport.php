<?php

namespace App\Imports;

use App\Models\{Asset, AssetKeluar, AssetMasuk, AssetUse};
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\{ToCollection, WithStartRow};

class AssetImport implements ToCollection, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    private $assets;
    public function __construct()
    {
        $this->asset = Asset::select('id')->get();
    }

    public function collection(Collection $rows)
    {
        // echo '<pre>';
        // var_dump($rows);
        // die;
        foreach ($rows as $row) {
            Asset::create([
                'id' => $row[0],
                'nama_barang' => $row[1],
                'itemcode' => $row[2],
                'jumlah' => $row[3],
                'digunakan' => $row[4],
                'sisa' => $row[5],
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
