<?php

namespace App\Exports;

use App\Models\CleaningFull;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LogCleaningExport implements FromCollection, WithHeadingRow
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CleaningFull::where('note', null)->where('status', 'Full Approved')->select('cleaning_full_id', 'cleaning_work', 'validity_from', 'date_of_leave', 'cleaning_name', 'cleaning_name2', 'checkin_personil', 'checkin_personil2', 'checkout_personil', 'checkout_personil2', 'photo_checkin_personil', 'photo_checkin_personil2', 'photo_checkout_personil', 'photo_checkout_personil2', 'status')
        ->get();
    }
}
