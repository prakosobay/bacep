<?php

namespace App\Exports;

use App\Models\CleaningFull;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\FromView;

class LogCleaningExport implements FromView, WithDrawings, ShouldAutoSize
{
    // public function drawings()
    // {
    //     global $excel_log;
    //     $excel_log = CleaningFull::where('note', null)->select('cleaning_work', 'validity_from', 'date_of_leave', 'cleaning_name', 'cleaning_name2', 'checkin_personil', 'checkin_personil2', 'checkout_personil', 'checkout_personil2', 'photo_checkin_personil', 'photo_checkin_personil2', 'photo_checkout_personil', 'photo_checkout_personil2')->get();
    //     global $drawings;
    //     $drawings = [];
    //     $rowNum = 2;
    //     foreach($excel_log as $p)
    //     {
    //         $drawing = new Drawing();
    //         $drawing->setName('Logo');
    //         $drawing->setDescription('This is my logo');
    //         $drawing->setPath(public_path("/storage/".$excel_log->photo_checkin_personil));
    //         $drawing->setHeight(90);
    //         $drawing->setCoordinates('G191'.$rowNum);
    //         $drawing[] = ($drawings);
    //         $rowNum++;
    //     }
    //     return $drawing;
    // }

    public function view(): View
    {
        // global $drawings;
        global $excel_log;
        $excel_log = CleaningFull::where('note', null)->select('cleaning_work', 'validity_from', 'date_of_leave', 'cleaning_name', 'cleaning_name2', 'checkin_personil', 'checkin_personil2', 'checkout_personil', 'checkout_personil2', 'photo_checkin_personil', 'photo_checkin_personil2', 'photo_checkout_personil', 'photo_checkout_personil2')->get();
        return view('cleaning.excel_full_visitor', compact('excel_log'));
    }

    public function drawings()
    {
        global $excel_log;
        $drawing = new Drawing();
        $drawing->setPath(public_path('gambar/approved.png'));
        $drawing->setHeight(50);
        $drawing->setCoordinates('G191');

        return $drawing;
    }

    // public function getDrawings():array
    // {
    //     $rowNum = 2;
    //     $drawings = [];
    //     global $excel_log;
    //     foreach ($excel_log as $row) {

    //         $drawing = new Drawing();
    //         $drawing->setPath(public_path("/storage/".$row->photo_checkin_personil));
    //         $drawing->setCoordinates('G3'.$rowNum);
    //         $drawings[] = $drawing;

    //         $rowNum++;
    //     }
    //     return $drawings;
    // }

    // public function registerEvents():array
    // {
    //     return [
    //         AfterSheet::class => function (AfterSheet $event) {
    //             $workSheet = $event->sheet->getDelegate();

    //             // insert images
    //             foreach ($this->getDrawings() as $drawing) {
    //                 $drawing->setWorksheet($workSheet);
    //             }
    //         },
    //     ];
    // }
}
