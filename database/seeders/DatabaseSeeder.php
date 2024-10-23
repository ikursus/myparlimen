<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            GelaranSeeder::class,
            JawatanSeeder::class,
            PartiSeeder::class,
            UnitSeeder::class,
            UserSeeder::class,
            AhliParlimenSeeder::class,
        ]);
    }
}
