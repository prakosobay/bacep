<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RiskBm;

class RiskBmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RiskBm::truncate();
        $row = [
            [
                'risk' => 'Terjepit',
                'poss' => 'Memar/luka/meninggal Dunia',
                'impact' => 'High',
                'mitigation' => 'Memastikan aliran listrik untuk lift sudah dimatikan saat pengecekan dan tidak berada di bawah lift saat listrik sudah normal',
            ],

            [
                'risk' => 'Tersengat Listrik',
                'poss' => 'Luka bakar/meninggal dunia',
                'impact' => 'High',
                'mitigation' => 'Memastikan tidak ada kabel yang tekelupas dan aliran listrik lift sudah dimatikan sebelum pengecekan',
            ],

            [
                'risk' => 'Peralatan rusak',
                'poss' => 'Lift tidak berfungsi',
                'impact' => 'Middle',
                'mitigation' => 'Pastikan pekerjaan dilakukan sesuai dengan prosedur yang berlaku/sesuai dengan SOP',
            ],

            [
                'risk' => 'Sesak nafas karena cairan kimia',
                'poss' => 'Sesak nafas',
                'impact' => 'Low',
                'mitigation' => 'Menggunakan masker saat melakukan treatment dan ruangan dapat digunakan 30 menit setelah selesai',
            ],

            [
                'risk' => 'Pekerjaan tertunda',
                'poss' => 'Ruangan tidak dapat digunakan',
                'impact' => 'Low',
                'mitigation' => 'Memberikan informasi kepada karyawan setengah jam sebelum treatment dilakukan',
            ],

            [
                'risk' => 'Jatuh dari tangga/kursi',
                'poss' => 'Terkilir, patah tulang, luka',
                'impact' => 'Medium',
                'mitigation' => 'Pastikan tangga/kursi berada pada lantai yang rata dan tidak goyang',
            ],

            [
                'risk' => 'Menghirup debu',
                'poss' => 'Batuk dan sakit tenggorokan',
                'impact' => 'Low',
                'mitigation' => 'Menggunakan masker',
            ],

            [
                'risk' => 'Korsleting',
                'poss' => 'Sistem kelistrikan menjadi terganggu dan kebakaran',
                'impact' => 'High',
                'mitigation' => 'Bekerja dengan hati-hati dan menjaga jarak dari sumber listrik',
            ],

            [
                'risk' => 'Sampah berserakan di lantai',
                'poss' => 'Lantai kotor',
                'impact' => 'Low',
                'mitigation' => 'Pastikan bekerja dengan rapi dan bila ada sampah berceceran agar dibersihkan',
            ],

            [
                'risk' => 'Menghirup aroma tidak sedap',
                'poss' => 'Mual - mual',
                'impact' => 'Low',
                'mitigation' => 'Menggunakan masker',
            ],

            [
                'risk' => 'Bersenggolan dengan perangkat',
                'poss' => 'Sistem perangkat menjadi terganggu',
                'impact' => 'High',
                'mitigation' => 'Menjaga jarak dengan perangkat critical',
            ],

            [
                'risk' => 'Bersenggolan dengan panel alarm',
                'poss' => 'Alarm 1 gedung dan gas discharge',
                'impact' => 'High',
                'mitigation' => 'Menjaga jarak dengan panel alarm',
            ],


        ];

        RiskBm::insert($row);
    }
}
