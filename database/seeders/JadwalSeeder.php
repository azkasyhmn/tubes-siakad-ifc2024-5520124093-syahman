<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $dosen = DB::table('dosen')->pluck('nidn')->toArray();
        $matkul = DB::table('mata_kuliah')->pluck('kode_matakuliah')->toArray();

        for ($i = 0; $i < 15; $i++) {
            DB::table('jadwal')->insert([
                'kode_matakuliah' => $faker->randomElement($matkul),
                'nidn' => $faker->randomElement($dosen),
                'kelas' => $faker->randomElement(['A','B','C']),
                'hari' => $faker->randomElement(['Senin','Selasa','Rabu','Kamis','Jumat']),
                'jam' => $faker->dateTime(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
