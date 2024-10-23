<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class AhliParlimenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('ms_MY');

        for ($i = 0; $i < 222; $i++) {
            DB::table('ahli_parlimen')->insert([
                'gelaran_id' => rand(1, 3),
                'jawatan_id' => rand(1, 4),
                'parti_id' => rand(1, 4),
                'blok' => $faker->randomElement(['pembangkang', 'kerajaan']),
                'nama' => $faker->name,
                'no_ic' => $faker->numerify('######-##-####'),
                'no_tel' => $faker->phoneNumber,
                'jantina' => $faker->randomElement(['Lelaki', 'Perempuan']),
                'email' => $faker->unique()->safeEmail,
                'photo' => null,
                'alamat' => $faker->address,
                'status' => $faker->randomElement([1, 0]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
