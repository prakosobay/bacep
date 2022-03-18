<?php

namespace App\Exports;

use App\Models\AssetMasuk;
use Maatwebsite\Excel\Concerns\FromCollection;

class AssetMasukExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AssetMasuk::all();
    }
}
