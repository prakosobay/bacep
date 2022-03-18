<?php

namespace App\Exports;

use App\Models\AssetKeluar;
use Maatwebsite\Excel\Concerns\FromCollection;

class AssetKeluarExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AssetKeluar::all();
    }
}
