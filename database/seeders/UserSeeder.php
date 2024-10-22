<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin 1',
            'email' => 'admin1@localhost',
            'password' => bcrypt('password'),
            'jawatan_id' => 1,
            'unit_id' => 1
        ]);

        User::create([
            'name' => 'Admin 2',
            'email' => 'admin2@localhost',
            'password' => bcrypt('password'),
            'jawatan_id' => 2,
            'unit_id' => 1
        ]);

        User::create([
            'name' => 'Admin 3',
            'email' => 'admin3@localhost',
            'password' => bcrypt('password'),
            'jawatan_id' => 3,
            'unit_id' => 2
        ]);
    }
}
