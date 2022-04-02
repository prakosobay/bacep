<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterOb;

class ObSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MasterOb::truncate();
        $row = [

            // Andi
            [
                'nama' => 'Andi Sugandi',
                'id_number' => '3204292311830001',
                'phone_number' => '0815-6461-7472',
                'pt' => 'PT TSL',
                'responsible' => 'Cleaner',
                'department' => 'Building Management',
            ],

            // Rokhim
            [
                'nama' => 'Rokhim',
                'id_number' => '3174050404891001',
                'phone_number' => '0819-9253-9595',
                'pt' => 'PT TSL',
                'responsible' => 'Cleaner',
                'department' => 'Building Management',
            ],

            // Jejen
            [
                'nama' => 'Jejen Jenudin',
                'id_number' => '3671052411880001',
                'phone_number' => '0895-3339-40730',
                'pt' => 'PT TSL',
                'responsible' => 'Cleaner',
                'department' => 'Building Management',
            ],

            // Randi
            [
                'nama' => 'Randi Andika',
                'id_number' => '3276011510880010',
                'phone_number' => '0857-3211-4378',
                'pt' => 'PT TSL',
                'responsible' => 'Cleaner',
                'department' => 'Building Management',
            ],

            // Anita
            [
                'nama' => 'Anita Aryani',
                'id_number' => '5206025203881010',
                'phone_number' => '0812-9073-7216',
                'pt' => 'PT TSL',
                'responsible' => 'Cleaner',
                'department' => 'Building Management',
            ],
        ];

        MasterOb::insert($row);
    }
}
