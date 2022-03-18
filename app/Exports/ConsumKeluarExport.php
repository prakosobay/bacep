<?php

namespace App\Exports;

use App\Models\ConsumKeluar;
use Maatwebsite\Excel\Concerns\FromCollection;

class ConsumKeluarExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ConsumKeluar::all();
    }
}
