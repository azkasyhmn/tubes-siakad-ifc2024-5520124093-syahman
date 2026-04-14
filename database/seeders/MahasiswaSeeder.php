<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $dosen = DB::table('dosen')->pluck('nidn')->toArray();
        
        $data = [];
        for ($i=0; $i < 10; $i++) { 
            $data[] = [
                'npm' => $faker->unique()->numerify('##########'),
                'nidn' => $faker->randomElement($dosen),
                'nama' => $faker->name,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('mahasiswa')->insert($data);
    }
}
