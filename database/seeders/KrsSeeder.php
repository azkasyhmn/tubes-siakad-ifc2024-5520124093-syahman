<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KrsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $mahasiswa = DB::table('mahasiswa')->pluck('npm')->toArray();
        $matkul = DB::table('mata_kuliah')->pluck('kode_matakuliah')->toArray();
        
        $data = [];
        for ($i=0; $i < 10; $i++) { 
            $data[] = [
                'npm' => $faker->randomElement($mahasiswa),
                'kode_matakuliah' => $faker->randomElement($matkul),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('krs')->insert($data);
    }
}
