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
                'loc1' => 'Lantai 5, Lift dan Lantai G', //other
                'loc2' => '', //2nd
                'loc3' => '', //3rd
                'loc4' => '', //dc
                'loc5' => '', //ups
                'loc6' => '', //mmr1
                'loc7' => '', //fss
                'loc8' => '', //mmr2
                'loc9' => '', //genset
                'loc10' => '', //panel
                'loc11' => '', //batre
                'loc12' => '', //trafo
                'loc13' => '', //parking
                'loc14' => '',  //yard
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
                'item_2' => 'Tester Amphere - tools',
                'item_3' => 'Tester Amphere - tools',
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

            //TNN
            [
                'work' => 'Pest Control (Insect & Rodent Control)',
                'loc1' => 'Lantai 5, Lantai 1 dan Lantai G', //other
                'loc2' => 'Office 2nd Fl', //2nd
                'loc3' => 'Office 3rd Fl', //3rd
                'loc4' => '', //dc
                'loc5' => '', //ups
                'loc6' => '', //mmr1
                'loc7' => '', //fss
                'loc8' => '', //mmr2
                'loc9' => '', //genset
                'loc10' => '', //panel
                'loc11' => '', //batre
                'loc12' => 'Trafo Room', //trafo
                'loc13' => 'Parking Lot', //parking
                'loc14' => 'Yard', //yard
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

            //CALMIC
            [
                'work' => 'Service Habitat (Penggantian pengharum ruangan dan penggantian handsanitizer)',
                'loc1' => 'Lantai 1 dan Lantai G', //other
                'loc2' => 'Office 2nd Fl', //2nd
                'loc3' => 'Office 3rd Fl', //3rd
                'loc4' => 'Server Room', //dc
                'loc5' => '', //ups
                'loc6' => '', //mmr1
                'loc7' => '', //fss
                'loc8' => '', //mmr2
                'loc9' => '', //genset
                'loc10' => '', //panel
                'loc11' => '', //batre
                'loc12' => '', //trafo
                'loc13' => '', //parking
                'loc14' => '',  //yard
                'desc' => 'Service habitat (penggantian pengharum ruangan dan penggantian handsanitizer)',
                'activity_1' => 'Penggantian pengharum ruangan dan handsanitizer',
                'activity_2' => '',
                'activity_3' => '',
                'activity_4' => '',
                'activity_5' => '',
                'detail_1' => 'Jatuh dari tangga',
                'detail_2' => '',
                'detail_3' => '',
                'detail_4' => '',
                'detail_5' => '',
                'item_1' => 'Refill pengharum ruangan',
                'item_2' => 'Obeng/kunci dispenser pengharum',
                'item_3' => 'Kursi/tangga',
                'item_4' => '',
                'item_5' => '',
                'procedure_1' => 'Penggantian pengharum ruangan dan hand sanitizer',
                'procedure_2' => '',
                'procedure_3' => '',
                'procedure_4' => '',
                'procedure_5' => '',
                'risk_1' => 'Jatuh dari tangga/kursi',
                'risk_2' => '',
                'risk_3' => '',
                'risk_4' => '',
                'risk_5' => '',
                'poss_1' => 'Terkilir, patah tulang, luka',
                'poss_2' => '',
                'poss_3' => '',
                'poss_4' => '',
                'poss_5' => '',
                'impact_1' => 'Medium',
                'impact_2' => '',
                'impact_3' => '',
                'impact_4' => '',
                'impact_5' => '',
                'mitigation_1' => 'Pastikan tangga/kursi berada pada lantai yang rata dan tidak goyang',
                'mitigation_2' => '',
                'mitigation_3' => '',
                'mitigation_4' => '',
                'mitigation_5' => '',
                'testing' => '',
                'rollback' => '',
            ],

            //DAIKIN
            [
                'work' => 'Service & Pembersihan AC Split & AC VRV Indoor/outdoor lantai G - 5 Batu Ceper',
                'loc1' => 'Lantai 1 dan Lantai G', //other
                'loc2' => 'Office 2nd Fl', //2nd
                'loc3' => 'Office 3rd Fl', //3rd
                'loc4' => '', //dc
                'loc5' => 'UPS Room', //ups
                'loc6' => 'MMR 1', //mmr1
                'loc7' => '', //fss
                'loc8' => 'MMR 2', //mmr2
                'loc9' => '', //genset
                'loc10' => '', //panel
                'loc11' => 'Battery Room', //batre
                'loc12' => '', //trafo
                'loc13' => '', //parking
                'loc14' => '',  //yard
                'desc' => 'Service dan Pembersihan AC Split & AC VRV Indoor/outdoor lantai G-3 batu ceper',
                'activity_1' => 'Service & pembersihan AC Split & AC VRV indoor/outdoor lantai G-5 Batu Ceper',
                'activity_2' => '',
                'activity_3' => '',
                'activity_4' => '',
                'activity_5' => '',
                'detail_1' => 'Jatuh dari tangga',
                'detail_2' => 'Tersengat listrik',
                'detail_3' => 'Menghirup debu',
                'detail_4' => 'Korsleting',
                'detail_5' => '',
                'item_1' => 'Tangga',
                'item_2' => 'Kop',
                'item_3' => 'Tools',
                'item_4' => 'Ember, Kanebo',
                'item_5' => 'Tang Ampere, AVO Meter',
                'procedure_1' => 'Untuk membuka dan menutup plafon',
                'procedure_2' => 'Untuk menutup plafon',
                'procedure_3' => 'Untuk membuka, memperbaiki dan menutup unit AC VRV',
                'procedure_4' => 'Untuk pembersihan unit AC VRV',
                'procedure_5' => 'Untuk mengukur tegangan pada AC VRV',
                'risk_1' => 'Tersengat listrik',
                'risk_2' => 'Menghirup debu',
                'risk_3' => 'Korsleting',
                'risk_4' => 'Jatuh dari tangga',
                'risk_5' => '',
                'poss_1' => 'Mengalami luka bakar, pingsan, kematian',
                'poss_2' => 'Batuk, tenggorokan sakit',
                'poss_3' => 'Sistem kelistrikan menjadi terganggu, kebakaran',
                'poss_4' => 'Memar, patah tulang, luka',
                'poss_5' => '',
                'impact_1' => 'High',
                'impact_2' => 'Low',
                'impact_3' => 'High',
                'impact_4' => 'Medium',
                'impact_5' => '',
                'mitigation_1' => 'Menggunakan APD (sarung tangan, kaca mata, jaket cold storage)',
                'mitigation_2' => 'Menggunakan masker',
                'mitigation_3' => 'Bekerja dengan hati-hati dan menjaga jarak dari sumber listrik',
                'mitigation_4' => 'Pastikan lantai untuk tangga rata, pegang tangga dengan erat',
                'mitigation_5' => '',
                'testing' => '',
                'rollback' => '',
            ],

            //Service Habitat
            [
                'work' => 'Service Habitat (Penggantian Lady Bin)',
                'loc1' => 'Lantai 1 dan Lantai G', //other
                'loc2' => 'Office 2nd Fl', //2nd
                'loc3' => 'Office 3rd Fl', //3rd
                'loc4' => '', //dc
                'loc5' => '', //ups
                'loc6' => '', //mmr1
                'loc7' => '', //fss
                'loc8' => '', //mmr2
                'loc9' => '', //genset
                'loc10' => '', //panel
                'loc11' => '', //batre
                'loc12' => '', //trafo
                'loc13' => '', //parking
                'loc14' => '',  //yard
                'desc' => 'Service habitat (Penggantian Lady Bin)',
                'activity_1' => 'Service habitat (Penggantian Lady Bin)',
                'activity_2' => '',
                'activity_3' => '',
                'activity_4' => '',
                'activity_5' => '',
                'detail_1' => 'Menghirup bau tidak sedap',
                'detail_2' => 'Sampah berserakan di lantai',
                'detail_3' => '',
                'detail_4' => '',
                'detail_5' => '',
                'item_1' => 'Kantong plastik sampah',
                'item_2' => 'APD',
                'item_3' => '',
                'item_4' => '',
                'item_5' => '',
                'procedure_1' => 'Penggantian plastik yang lama dengan yang baru',
                'procedure_2' => '',
                'procedure_3' => '',
                'procedure_4' => '',
                'procedure_5' => '',
                'risk_1' => 'Sampah berserakan di lantai',
                'risk_2' => 'Menghirup bau tidak sedap',
                'risk_3' => '',
                'risk_4' => '',
                'risk_5' => '',
                'poss_1' => 'Lantai kotor',
                'poss_2' => 'Mual-mual',
                'poss_3' => '',
                'poss_4' => '',
                'poss_5' => '',
                'impact_1' => 'Low',
                'impact_2' => 'Low',
                'impact_3' => '',
                'impact_4' => '',
                'impact_5' => '',
                'mitigation_1' => 'Pastikan bekerja dengan rapi dan bila ada sampah berceceran agar dibersihkan',
                'mitigation_2' => 'Menggunakan masker',
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
