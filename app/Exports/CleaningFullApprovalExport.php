<?php

namespace App\Exports;

use App\Models\CleaningFull;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\{WithStyles, WithMapping, FromCollection, ShouldAutoSize, WithEvents, WithHeadings};
use PhpOffice\PhpSpreadsheet\Worksheet\{Worksheet,Drawing};
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;

class CleaningFullApprovalExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    // function __construct(protected $query){

    // }

    public function collection()
    {
        return CleaningFull::with('cleaning:cleaning_id,cleaning_work,validity_from,validity_to')->select('cleaning_id', 'checkin_personil', 'photo_checkin_personil')->get();
    }

    public function getDrawings():array
    {
        $rowNum = 2;
        $drawings = [];

        foreach ($this->collection() as $row) {

            $drawing = new Drawing();
            $drawing->setPath(asset('storage/bm/cleaning/checkin/' . $row->photo_checkin_personil));
            $drawing->setCoordinates('A'.$rowNum);
            $drawings[] = $drawing;

            $rowNum++;
            dd($row);
        }

        return $drawings;
    }
/*
    public function registerEvents():array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $workSheet = $event->sheet->getDelegate();

                // insert images
                foreach ($this->getDrawings() as $drawing) {
                    $drawing->setWorksheet($workSheet);
                }
            },
        ];
    }
*/
    /*
    public function headings(): array
    {
        return [
            'Cleaning Id',
            'Pekerjaan',
            'Tanggal Visit',
            'Tanggal Selesai',
            'Checkin',
            'Photo Checkin',
        ];
    }

    public function map($item): array
    {
        return [
            $item->cleaning_id,
            $item->cleaning_work,
            $item->validity_from,
            $item->validity_to,
            $item->checkin_personil,
            $item->photo_checkin_personil,
        ];
    }



    public function setImage($workSheet) {
        $this->collection()->each(function($employee,$index) use($workSheet) {
            $drawing = new Drawing();
            // $drawing->setName($employee->cleaning_id);
            // $drawing->setDescription($employee->cleaning_id);
            $drawing->setPath(asset('storage/bm/cleaning/checkin/' . $employee->photo_checkin_personil));
            $drawing->setHeight(100);
            $index+=2;
            $drawing->setCoordinates("F$index");
            $drawing->setWorksheet($workSheet);
        });
    }

    public function registerEvents():array {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDefaultRowDimension()->setRowHeight(60);
                $workSheet = $event->sheet->getDelegate();
                $this->setImage($workSheet);
            },
        ];
    }

    public function styles(Worksheet $sheet) {
        $count = count($this->query->get());
        $sheet->getStyle('A1:F1')->getFont()->setBold(true);
        $sheet->getStyle('A1:F1')->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000'],
                ],
            ],

        ]);

        $sheet->getStyle('A1:F1')->getFill()->applyFromArray([
            'fillType' => 'solid',
            'rotation' => 0,
            'color' => ['rgb' => '8D4019'],
        ]);
    }
    */
    // public function view(): View
    // {
    //     return view('exports.cleaning', [
    //         'fulls' => CleaningFull::query()
    //                 ->leftJoin('cleanings', 'cleaning_fulls.cleaning_id', '=', 'cleanings.cleaning_id')
    //                 ->select('cleaning_fulls.*', 'cleanings.validity_to as leave')
    //                 ->get(),
    //     ]);
    // }


    // public function headings(): array
    // {
    //     return [
    //         'ID',
    //         'Purpose of Work',
    //         'Visit',
    //         'Leave',
    //         'Visitor Name',
    //         'Visitor Name 2',
    //         'Checkin Visitor',
    //         'Checkin Visitor 2',
    //         'Checkout Visitor',
    //         'Checkout Visitor 2',
    //         'Link',
    //         'Photo Checkin Visitor',
    //         'Photo Checkin Visitor 2',
    //         'Photo Checkout Visitor',
    //         'Photo Checkout Visitor 2',
    //     ];
    // }

    // public function styles(Worksheet $sheet)
    // {
    //     return [
    //         1    => ['font' => ['bold' => true]],
    //     ];
    // }
}
