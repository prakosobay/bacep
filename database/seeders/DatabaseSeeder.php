<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Survey;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RutinSeeder::class);
        $this->call(PersonilTableSeeder::class);
        $this->call(ObSeeder::class);
        Survey::factory(10)->create();
    }
}
