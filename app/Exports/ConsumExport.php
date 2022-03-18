<?php

namespace App\Exports;

use App\Models\Consum;
use Maatwebsite\Excel\Concerns\FromCollection;

class ConsumExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Consum::all();
    }
}
