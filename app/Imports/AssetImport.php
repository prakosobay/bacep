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
                'jumlah' => $row[5],
                'digunakan' => $row[6],
                'sisa' => $row[7],
                'satuan' => $row[8],
                'note' => $row[10],
                'lokasi' => $row[11],
            ]);
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}
