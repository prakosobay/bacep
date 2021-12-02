<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Personil;

class PersonilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Personil::truncate();
        $row =
        [
            //CALMIC
            [
                'name' => 'Ichsan Saleh',
                'company' => 'PT Calmic',
                'department' => 'Teknisi',
                'respon' => 'Teknisi',
                'phone' => '0857-7500-0302',
                'nik' => 3173050101800034,
                'ktp' => '',
                'vaksin_1' => '',
                'vaksin_2' => '',
            ],

            [
                'name' => 'Lika Amelia',
                'company' => 'PT Calmic',
                'department' => 'Teknisi',
                'respon' => 'Teknisi',
                'phone' => '0895-4130-05055',
                'nik' => 3215135904840006,
                'ktp' => '',
                'vaksin_1' => '',
                'vaksin_2' => '',
            ],

            //TNN
            [
                'name' => 'Raden Jaya Diningrat',
                'company' => 'PT TNN Indonesia',
                'department' => 'Technician',
                'respon' => 'Technician',
                'phone' => '0857-7664-9408',
                'nik' => 3173050306880006,
                'ktp' => '',
                'vaksin_1' => '',
                'vaksin_2' => '',
            ],

            [
                'name' => 'Tedi Sutedi',
                'company' => 'PT TNN Indonesia',
                'department' => 'Technician',
                'respon' => 'Technician',
                'phone' => '0855-5952-4251',
                'nik' => 3173051506890010,
                'ktp' => '',
                'vaksin_1' => '',
                'vaksin_2' => '',
            ],

            //DAIKIN
            [
                'name' => 'M. Abdul Azmi',
                'company' => 'PT DAIKIN',
                'department' => 'Teknisi',
                'respon' => 'Teknisi',
                'phone' => '0859-1663-60713',
                'nik' => 3329120706020007,
                'ktp' => '',
                'vaksin_1' => '',
                'vaksin_2' => '',
            ],

            [
                'name' => 'U Parli',
                'company' => 'PT DAIKIN',
                'department' => 'Teknisi',
                'respon' => 'Teknisi',
                'phone' => '0855-5920-8542',
                'nik' => 3202060806480004,
                'ktp' => '',
                'vaksin_1' => '',
                'vaksin_2' => '',
            ],

            //KONE
            [
                'name' => 'Muhammad Sofian',
                'company' => 'PT KONE',
                'department' => 'Teknisi',
                'respon' => 'Teknisi',
                'phone' => '0811-1957-9768',
                'nik' => 3275092403930014,
                'ktp' => '',
                'vaksin_1' => '',
                'vaksin_2' => '',
            ],

            //BTS
            [
                'name' => 'Badai Sino Jendrang',
                'company' => 'PT Enlulu',
                'department' => 'Building Management',
                'respon' => 'Building Management',
                'phone' => '0822-1028-2228',
                'nik' => 3329101805920002,
                'ktp' => '',
                'vaksin_1' => '',
                'vaksin_2' => '',
            ],

            [
                'name' => 'Riyanto',
                'company' => 'PT Enlulu',
                'department' => 'Building Management',
                'respon' => 'Building Management',
                'phone' => '0878-7019-1586',
                'nik' => 3171031611710008,
                'ktp' => '',
                'vaksin_1' => '',
                'vaksin_2' => '',
            ]
            ];

        Personil::insert($row);

    }
}
