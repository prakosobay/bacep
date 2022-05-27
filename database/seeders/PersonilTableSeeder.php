<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Visitor;

class PersonilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Visitor::truncate();
        $row =
            [
                //CALMIC
                [
                    'visit_nama' => 'Ichsan Saleh',
                    'visit_company' => 'PT Calmic',
                    'visit_department' => 'Teknisi',
                    'visit_respon' => 'Teknisi',
                    'visit_phone' => '0857-7500-0302',
                    'visit_nik' => '3173050101800034',
                ],

                [
                    'visit_nama' => 'Adithian Noviansyah',
                    'visit_company' => 'PT Calmic',
                    'visit_department' => 'Teknisi',
                    'visit_respon' => 'Teknisi',
                    'visit_phone' => '0878-8866-8571',
                    'visit_nik' => '3173052111890000',
                ],

                [
                    'visit_nama' => 'Lika Amelia',
                    'visit_company' => 'PT Calmic',
                    'visit_department' => 'Teknisi',
                    'visit_respon' => 'Teknisi',
                    'visit_phone' => '0895-4130-05055',
                    'visit_nik' => '3215135904840006',
                ],

                //TNN
                [
                    'visit_nama' => 'Raden Jaya Diningrat',
                    'visit_company' => 'PT TNN Indonesia',
                    'visit_department' => 'Technician',
                    'visit_respon' => 'Technician',
                    'visit_phone' => '0857-7664-9408',
                    'visit_nik' => '3173050306880006',
                ],

                [
                    'visit_nama' => 'Tedi Sutedi',
                    'visit_company' => 'PT TNN Indonesia',
                    'visit_department' => 'Technician',
                    'visit_respon' => 'Technician',
                    'visit_phone' => '0855-5952-4251',
                    'visit_nik' => '3173051506890010',
                ],

                //DAIKIN
                [
                    'visit_nama' => 'M. Abdul Azmi',
                    'visit_company' => 'PT DAIKIN',
                    'visit_department' => 'Teknisi',
                    'visit_respon' => 'Teknisi',
                    'visit_phone' => '0859-1663-60713',
                    'visit_nik' => '3329120706020007',
                ],

                [
                    'visit_nama' => 'U Parli',
                    'visit_company' => 'PT DAIKIN',
                    'visit_department' => 'Teknisi',
                    'visit_respon' => 'Teknisi',
                    'visit_phone' => '0855-5920-8542',
                    'visit_nik' => '3202060806480004',
                ],

                [
                    'visit_nama' => 'Agus Taufik',
                    'visit_company' => 'PT DAIKIN',
                    'visit_department' => 'Teknisi',
                    'visit_respon' => 'Teknisi',
                    'visit_phone' => '0878-2980-0705',
                    'visit_nik' => '3329122404930603',
                ],

                [
                    'visit_nama' => 'Riga Ashar Rizki',
                    'visit_company' => 'PT DAIKIN',
                    'visit_department' => 'Teknisi',
                    'visit_respon' => 'Teknisi',
                    'visit_phone' => '0857-2608-8493',
                    'visit_nik' => '3328174612980002',
                ],

                [
                    'visit_nama' => 'Rendi Yulianto',
                    'visit_company' => 'PT DAIKIN',
                    'visit_department' => 'Teknisi',
                    'visit_respon' => 'Teknisi',
                    'visit_phone' => '0896-6923-8981',
                    'visit_nik' => '3521120107920039',
                ],

                [
                    'visit_nama' => 'Suherlan',
                    'visit_company' => 'PT DAIKIN',
                    'visit_department' => 'Teknisi',
                    'visit_respon' => 'Teknisi',
                    'visit_phone' => '0882-2374-0862',
                    'visit_nik' => '3202060105010004',
                ],

                //KONE
                [
                    'visit_nama' => 'Muhammad Sofian',
                    'visit_company' => 'PT KONE',
                    'visit_department' => 'Teknisi',
                    'visit_respon' => 'Teknisi',
                    'visit_phone' => '0811-1957-9768',
                    'visit_nik' => '3275092403930014',
                ],

                [
                    'visit_nama' => 'Andriyanto',
                    'visit_company' => 'PT KONE',
                    'visit_department' => 'Teknisi',
                    'visit_respon' => 'Teknisi',
                    'visit_phone' => '0857-3211-4378',
                    'visit_nik' => '317510130188004',
                ],

                //BTS
                [
                    'visit_nama' => 'Badai Sino Jendrang',
                    'visit_company' => 'PT Enlulu',
                    'visit_department' => 'Building Management',
                    'visit_respon' => 'Building Management',
                    'visit_phone' => '0822-1028-2228',
                    'visit_nik' => '3329101805920002',
                ],

                [
                    'visit_nama' => 'Riyanto',
                    'visit_company' => 'PT Enlulu',
                    'visit_department' => 'Building Management',
                    'visit_respon' => 'Building Management',
                    'visit_phone' => '0878-7019-1586',
                    'visit_nik' => '3171031611710008',
                ]
            ];

        Visitor::insert($row);
    }
}
