<?php

namespace App\Imports;

use App\Models\{Asset, AssetKeluar, AssetMasuk};
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\{ToModel, WithHeadingRow, ToCollection, WithMultipleSheets, WithStartRow};

class AssetImport implements ToCollection, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    // public function sheets(): array
    // {
    //     return [
    //         0 => new FirstSheetImport(),
    //         1 => new SecondSheetImport(),
    //         2 => new ThirdSheetImport(),
    //     ];
    // }
    public function collection(Collection $rows2)
    {
        foreach ($rows2 as $row) {
            AssetKeluar::create([
                'tanggal' => $row[0],
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

class FirstSheetImport implements ToCollection, WithStartRow
{
    public function collection(Collection $rows1)
    {
        foreach ($rows1 as $row) {
            Asset::create([
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
class SecondSheetImport implements ToCollection, WithStartRow
{
    public function collection(Collection $rows2)
    {
        foreach ($rows2 as $row) {
            AssetKeluar::create([
                'tanggal' => $row[0],
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
class ThirdSheetImport implements ToCollection, WithStartRow
{
    public function collection(Collection $rows3)
    {
        foreach ($rows3 as $row) {
            AssetMasuk::create([
                'tanggal' => $row[0],
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
