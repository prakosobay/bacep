<?php

namespace Database\Seeders;

use App\Models\PilihanWork;
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
        $this->call([
            PilihanWorksTable::class,
            ObSeeder::class,
            RutinSeeder::class,
            PersonilTableSeeder::class,
        ]);
    }
}
