<?php

namespace Database\Seeders;

use App\Models\MasterCard;
use Illuminate\Database\Seeder;

class MasterCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        MasterCard::truncate();

        for($i = 1; $i <= 10; $i++){
            MasterCard::insert([
                'number' => $i,
                'type' => 'eksternal',
                'updated_at' => now(),
                'created_at' => now(),
            ]);
        }

        for($i = 101; $i <= 110; $i++){
            MasterCard::insert([
                'number' => $i,
                'type' => 'internal',
                'updated_at' => now(),
                'created_at' => now(),
            ]);
        }
    }
}
