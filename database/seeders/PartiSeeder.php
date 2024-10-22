<?php

namespace Database\Seeders;

use App\Models\Parti;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PartiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Simpan data kaedah Eloquent ORM (Model)
        // Kaedah 2 method create

        Parti::create([
            'nama' => 'Umno'
        ]);

        Parti::create([
            'nama' => 'PKR'
        ]);

        Parti::create([
            'nama' => 'DAP'
        ]);

        Parti::create([
            'nama' => 'Bersatu'
        ]);
    }
}
