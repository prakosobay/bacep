<?php

namespace App\Exports;

use App\Models\EmployeeCard;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmployeeCardExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return EmployeeCard::all();
    }
}
