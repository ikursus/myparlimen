<?php

namespace Database\Seeders;

use App\Models\Jawatan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JawatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Simpan data kaedah Eloquent ORM (Model)
        // Kaedah 1 new Object
        $jawatan1 = new Jawatan;
        $jawatan1->nama = 'Perdana Menteri';
        $jawatan1->save();

        $jawatan2 = new Jawatan;
        $jawatan2->nama = 'Menteri';
        $jawatan2->save();

        $jawatan3 = new Jawatan;
        $jawatan3->nama = 'Timbalan Menteri';
        $jawatan3->save();

        $jawatan4 = new Jawatan;
        $jawatan4->nama = 'Ahli Parlimen';
        $jawatan4->save();
    }
}
