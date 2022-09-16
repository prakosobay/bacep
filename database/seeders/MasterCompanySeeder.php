<?php

namespace Database\Seeders;

use App\Models\MasterCompany;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MasterCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        MasterCompany::truncate();

        $data = [];
        for($i = 1; $i < 11; $i++){
            $data[$i] = [
                'name' => $faker->company,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'website' => $faker->url,
                'email' => $faker->companyEmail,
                'created_by' => 15,
                'updated_by' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        MasterCompany::insert($data);
    }
}
