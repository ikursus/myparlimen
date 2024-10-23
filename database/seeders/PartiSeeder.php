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
            'nama' => 'Umno',
            'color' => '#FF0000'
        ]);

        Parti::create([
            'nama' => 'PKR',
            'color' => '#0000FF'
        ]);

        Parti::create([
            'nama' => 'DAP',
            'color' => '#0000FF' // light blue
        ]);

        Parti::create([
            'nama' => 'Bersatu',
            'color' => '#FF000' // red color
        ]);
    }
}
