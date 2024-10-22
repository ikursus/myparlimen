<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GelaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Query Builder
        DB::table('gelaran')->insert([
            'nama' => 'Tan Sri'
        ]);

        DB::table('gelaran')->insert([
            'nama' => 'Dato'
        ]);

        DB::table('gelaran')->insert([
            'nama' => 'Encik'
        ]);



        // Eloquent ORM (Model)
    }
}
