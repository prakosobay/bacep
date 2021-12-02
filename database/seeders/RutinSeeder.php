<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\{Hash, DB};
use App\Models\Rutin;


class RutinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rutin::truncate();
            $row = [
            //KONE
            [
            'work' => 'Service Lift Kantor Batu Ceper',
            'server' => false,
            'genset' => false,
            'mmr1' => false,
            'mmr2' => false,
            'fss' => false,
            'batre' => false,
            'ups' => false,
            'lt2' => false,
            'lt3' => false,
            'trafo' => false,
            'parking' => false,
            'yard' => false,
            'panel' => false,
            'other' => 'Lantai 5, Lift & Lantai G',
            'desc' => 'Service Lift',
            'activity_1' => 'Pengecekan car, mesin, panel control, elevator shaft & CCTV',
            'activity_2' => '',
            'activity_3' => '',
            'activity_4' => '',
            'activity_5' => '',
            'detail_1' => 'Terjepit',
            'detail_2' => 'Tersengat listrik',
            'detail_3' => 'Peralatan/lift rusak',
            'detail_4' => '',
            'detail_5' => '',
            'item_1' => 'Tester Amphere - tools',
            'item_2' => '',
            'item_3' => '',
            'item_4' => '',
            'item_5' => '',
            'procedure_1' => 'Membuka panel lift',
            'procedure_2' => 'Mengukur tegangan di panel lift',
            'procedure_3' => 'Membersihkan ruang mesin dan sangkat',
            'procedure_4' => '',
            'procedure_5' => '',
            'risk_1' => 'Terjepit',
            'risk_2' => 'Tersengat listrik',
            'risk_3' => 'Peralatan rusak',
            'risk_4' => '',
            'risk_5' => '',
            'poss_1' => 'Memar/luka/meninggal dunia',
            'poss_2' => 'Luka bakar/meninggal dunia',
            'poss_3' => 'Lift tidak berfungsi',
            'poss_4' => '',
            'poss_5' => '',
            'impact_1' => 'High',
            'impact_2' => 'High',
            'impact_3' => 'Middle',
            'impact_4' => '',
            'impact_5' => '',
            'mitigation_1' => 'Memastikan aliran listrik untuk lift sudah dimatikan saat pengecekan dan tidak berada di bawah lift saat listrik lift sudah normal',
            'mitigation_2' => 'Memastikan tidak ada kabel yang terkelupas dan aliran listrik lift sudah dimatikan saat pengecekan',
            'mitigation_3' => 'Pastikan pekerjaan dilakukan sesuai dengan prosedur yang berlaku/sesuai dengan SOP',
            'mitigation_4' => '',
            'mitigation_5' => '',
            'testing' => '',
            'rollback' => '',
            ],

            [
            //TNN
            'work' => 'Pest Control (Insect & Rodent Control)',
            'server' => false,
            'genset' => false,
            'mmr1' => false,
            'mmr2' => false,
            'fss' => false,
            'batre' => false,
            'ups' => false,
            'lt2' => true,
            'lt3' => true,
            'trafo' => true,
            'parking' => true,
            'yard' => true,
            'panel' => false,
            'other' => 'Lantai G, 1 & 5',
            'desc' => 'Pest Control terdiri dari Insect Control & Rodent Control. Insect Control adalah pengendalian perkembangan hama serangga terbang
                        merayap (nyamuk, lalat, kecoa dan semut). Sedangkan Rodent Control adalah pengendalian hama tikus.',
            'activity_1' => 'Pest Control (Insect & Rodent Control)',
            'activity_2' => '',
            'activity_3' => '',
            'activity_4' => '',
            'activity_5' => '',
            'detail_1' => 'Munculnya bangkai serangga seperti nyamuk, lalat, dan kecoa yang mati setelah treatment',
            'detail_2' => 'Pekerjaan tertunda',
            'detail_3' => '',
            'detail_4' => '',
            'detail_5' => '',
            'item_1' => 'Pest Control (Insect Control)',
            'item_2' => 'Pest Control (Rodent Control)',
            'item_3' => 'Termite Control',
            'item_4' => '',
            'item_5' => '',
            'procedure_1' => 'Pekerjaan dimulai dari lantai 5,3,2,1,G',
            'procedure_2' => '',
            'procedure_3' => '',
            'procedure_4' => '',
            'procedure_5' => '',
            'risk_1' => 'Sesak napas disebabkan cairan kimia yang digunakan untuk treatment',
            'risk_2' => 'Pekerjaan tertunda',
            'risk_3' => '',
            'risk_4' => '',
            'risk_5' => '',
            'poss_1' => 'Sesak nafas',
            'poss_2' => 'Ruangan tidak dapat digunakan',
            'poss_3' => '',
            'poss_4' => '',
            'poss_5' => '',
            'impact_1' => 'Low',
            'impact_2' => 'Low',
            'impact_3' => '',
            'impact_4' => '',
            'impact_5' => '',
            'mitigation_1' => 'Menggunakan masker saat melakukan treatment dan ruangan dapat digunakan 30 menit setelah selesai',
            'mitigation_2' => 'Memberi informasi kepada karyawan setengah jam sebelum treatment',
            'mitigation_3' => '',
            'mitigation_4' => '',
            'mitigation_5' => '',
            'testing' => '',
            'rollback' => '',
            ],
        ];

        Rutin::insert($row);
    }
}
