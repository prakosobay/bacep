<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\Models\EmployeeCard;
use Maatwebsite\Excel\Concerns\{ToCollection, ToModel, startRow};

class EmployeeCardImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        // echo '<pre>';
        // var_dump($rows);
        // die;
        // Consum::truncate();
        foreach ($rows as $row) {
            EmployeeCard::create([
                'name' => $row[1],
                'number_card' => $row[2],
                'dept_card' => $row[3],
                'status_employee' => $row[4],
                'updated_at' => $row[5],
                'created_by' => $row[6],
                'updated_by' => $row[7],
            ]);
        }
    }

    // public function model(array $row)
    // {
    //     echo '<pre>';
    //     var_dump($row);
    //     die;
    //     foreach ($rows as $row) {
    //     return new EmployeeCard([
    //         'nama' => $row['Nama'],
    //         'number_card' => $row['No Kartu'],
    //         'dept_card' => $row['Departement'],
    //         'created_at' => $row['Tanggal di Buat'],
    //     ]);
    // }

    // public function startRow(): int
    // {
    //     return 3;
    // }
}
