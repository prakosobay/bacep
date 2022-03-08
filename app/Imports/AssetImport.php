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
    public function collection(Collection $rows1)
    {
        // echo '<pre>';
        // var_dump($rows1);
        // die;
        Asset::truncate();
        foreach ($rows1 as $row) {
            Asset::create([
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

    // public function collection(Collection $rows3)
    // {
    //     // echo '<pre>';
    //     // var_dump($rows3);
    //     // die;
    //     AssetMasuk::truncate();
    //     foreach ($rows3 as $row) {
    //         AssetMasuk::create([
    //             'tanggal' => $row[0],
    //             'asset_id' => $row[1],
    //             'nama_barang' => $row[2],
    //             'jumlah' => $row[3],
    //             'ket' => $row[4],
    //             'pencatat' => $row[5],
    //         ]);
    //     }
    // }

    // public function collection(Collection $rows2)
    // {
    //     // echo '<pre>';
    //     // var_dump($rows2);
    //     // die;
    //     AssetKeluar::truncate();
    //     foreach ($rows2 as $row) {
    //         AssetKeluar::create([
    //             'tanggal' => $row[0],
    //             'asset_id' => $row[1],
    //             'nama_barang' => $row[2],
    //             'jumlah' => $row[3],
    //             'ket' => $row[4],
    //             'pencatat' => $row[5],
    //         ]);
    //     }
    // }

    // public function collection(Collection $rows5)
    // {
    //     // echo '<pre>';
    //     // var_dump($rows5);
    //     // die;
    //     AssetUse::truncate();
    //     foreach ($rows5 as $row) {
    //         AssetUse::create([
    //             'tanggal' => $row[0],
    //             'asset_id' => $row[1],
    //             'nama_barang' => $row[2],
    //             'jumlah' => $row[3],
    //             'ket' => $row[4],
    //             'pencatat' => $row[5],
    //         ]);
    //     }
    // }

    public function startRow(): int
    {
        return 2;
    }
}
