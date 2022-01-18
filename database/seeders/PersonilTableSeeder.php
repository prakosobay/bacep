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
                    'nama' => 'Ichsan Saleh',
                    'company' => 'PT Calmic',
                    'department' => 'Teknisi',
                    'respon' => 'Teknisi',
                    'phone' => '0857-7500-0302',
                    'nik' => '3173050101800034',
                    'ktp' => '',
                    'vaksin_1' => '',
                    'vaksin_2' => '',
                ],

                [
                    'nama' => 'Adithian Noviansyah',
                    'company' => 'PT Calmic',
                    'department' => 'Teknisi',
                    'respon' => 'Teknisi',
                    'phone' => '0878-8866-8571',
                    'nik' => '3173052111890000',
                    'ktp' => '',
                    'vaksin_1' => '',
                    'vaksin_2' => '',
                ],

                [
                    'nama' => 'Lika Amelia',
                    'company' => 'PT Calmic',
                    'department' => 'Teknisi',
                    'respon' => 'Teknisi',
                    'phone' => '0895-4130-05055',
                    'nik' => '3215135904840006',
                    'ktp' => '',
                    'vaksin_1' => '',
                    'vaksin_2' => '',
                ],

                //TNN
                [
                    'nama' => 'Raden Jaya Diningrat',
                    'company' => 'PT TNN Indonesia',
                    'department' => 'Technician',
                    'respon' => 'Technician',
                    'phone' => '0857-7664-9408',
                    'nik' => '3173050306880006',
                    'ktp' => '',
                    'vaksin_1' => '',
                    'vaksin_2' => '',
                ],

                [
                    'nama' => 'Tedi Sutedi',
                    'company' => 'PT TNN Indonesia',
                    'department' => 'Technician',
                    'respon' => 'Technician',
                    'phone' => '0855-5952-4251',
                    'nik' => '3173051506890010',
                    'ktp' => '',
                    'vaksin_1' => '',
                    'vaksin_2' => '',
                ],

                //DAIKIN
                [
                    'nama' => 'M. Abdul Azmi',
                    'company' => 'PT DAIKIN',
                    'department' => 'Teknisi',
                    'respon' => 'Teknisi',
                    'phone' => '0859-1663-60713',
                    'nik' => '3329120706020007',
                    'ktp' => '',
                    'vaksin_1' => '',
                    'vaksin_2' => '',
                ],

                [
                    'nama' => 'U Parli',
                    'company' => 'PT DAIKIN',
                    'department' => 'Teknisi',
                    'respon' => 'Teknisi',
                    'phone' => '0855-5920-8542',
                    'nik' => '3202060806480004',
                    'ktp' => '',
                    'vaksin_1' => '',
                    'vaksin_2' => '',
                ],

                [
                    'nama' => 'Agus Taufik',
                    'company' => 'PT DAIKIN',
                    'department' => 'Teknisi',
                    'respon' => 'Teknisi',
                    'phone' => '0878-2980-0705',
                    'nik' => '3329122404930603',
                    'ktp' => '',
                    'vaksin_1' => '',
                    'vaksin_2' => '',
                ],

                [
                    'nama' => 'Riga Ashar Rizki',
                    'company' => 'PT DAIKIN',
                    'department' => 'Teknisi',
                    'respon' => 'Teknisi',
                    'phone' => '0857-2608-8493',
                    'nik' => '3328174612980002',
                    'ktp' => '',
                    'vaksin_1' => '',
                    'vaksin_2' => '',
                ],

                [
                    'nama' => 'Rendi Yulianto',
                    'company' => 'PT DAIKIN',
                    'department' => 'Teknisi',
                    'respon' => 'Teknisi',
                    'phone' => '0896-6923-8981',
                    'nik' => '3521120107920039',
                    'ktp' => '',
                    'vaksin_1' => '',
                    'vaksin_2' => '',
                ],

                [
                    'nama' => 'Suherlan',
                    'company' => 'PT DAIKIN',
                    'department' => 'Teknisi',
                    'respon' => 'Teknisi',
                    'phone' => '0882-2374-0862',
                    'nik' => '3202060105010004',
                    'ktp' => '',
                    'vaksin_1' => '',
                    'vaksin_2' => '',
                ],

                //KONE
                [
                    'nama' => 'Muhammad Sofian',
                    'company' => 'PT KONE',
                    'department' => 'Teknisi',
                    'respon' => 'Teknisi',
                    'phone' => '0811-1957-9768',
                    'nik' => '3275092403930014',
                    'ktp' => '',
                    'vaksin_1' => '',
                    'vaksin_2' => '',
                ],

                [
                    'nama' => 'Andriyanto',
                    'company' => 'PT KONE',
                    'department' => 'Teknisi',
                    'respon' => 'Teknisi',
                    'phone' => '0857-3211-4378',
                    'nik' => '317510130188004',
                    'ktp' => '',
                    'vaksin_1' => '',
                    'vaksin_2' => '',
                ],

                [
                    'nama' => 'Rahmadani',
                    'company' => 'PT KONE',
                    'department' => 'Teknisi',
                    'respon' => 'Teknisi',
                    'phone' => '0811-9319-296',
                    'nik' => '',
                    'ktp' => '',
                    'vaksin_1' => '',
                    'vaksin_2' => '',
                ],

                //BTS
                [
                    'nama' => 'Badai Sino Jendrang',
                    'company' => 'PT Enlulu',
                    'department' => 'Building Management',
                    'respon' => 'Building Management',
                    'phone' => '0822-1028-2228',
                    'nik' => '3329101805920002',
                    'ktp' => '',
                    'vaksin_1' => '',
                    'vaksin_2' => '',
                ],

                [
                    'nama' => 'Riyanto',
                    'company' => 'PT Enlulu',
                    'department' => 'Building Management',
                    'respon' => 'Building Management',
                    'phone' => '0878-7019-1586',
                    'nik' => '3171031611710008',
                    'ktp' => '',
                    'vaksin_1' => '',
                    'vaksin_2' => '',
                ]
            ];

        Personil::insert($row);
    }
}
