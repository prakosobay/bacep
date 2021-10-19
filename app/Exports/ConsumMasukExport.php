<?php

namespace App\Exports;

use App\Models\ConsumMasuk;
use Maatwebsite\Excel\Concerns\FromCollection;

class ConsumMasukExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ConsumMasuk::all();
    }
}
