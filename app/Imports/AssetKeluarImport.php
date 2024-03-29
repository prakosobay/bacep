<?php

namespace App\Imports;

use App\Models\{Asset, AssetKeluar, AssetMasuk, AssetUse};
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\{ToCollection, WithStartRow};

class AssetKeluarImport implements ToCollection, WithStartRow
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
            AssetKeluar::create([
                'id' => $row[0],
                'asset_id' => $row[1],
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
        return 1;
    }
}
