<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
Use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $row =
        [
            [
                'name' => 'Badai Sino',
                'department' => 'BM',
                ''
            ]

        ];

        User::insert($row);
    }
}
