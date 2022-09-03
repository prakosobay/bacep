<?php

namespace App\Exports;

use App\Models\{Internal, InternalVisitor};
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class InternalExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return InternalVisitor::all();
        // return $this->internal->visitors();
    }

    public function headings(): array
    {
        return [
            'No.',
            'Internal_id',
            'Requestor Dept',
            'Visitor Name',
            'Visitor Company',
            'Visitor Department',
            'Visitor Responsibility',
            'Visitor Number ID',
            'Visitor Phone',
            'Visitor Checkin',
            'Photo Checkin',
            'Visitor Checkout',
            'Photo Checkout',
            'done',
            'created_at',
            'updated_at',
        ];
    }
}
