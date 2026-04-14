<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $mataKuliah = [
            "Pengantar Teknologi Informasi",
            "Dasar Pemrograman",
            "Struktur Data",
            "Algoritma dan Pemrograman",
            "Matematika Diskrit",
            "Kalkulus",
            "Logika Informatika",
            "Sistem Digital",

            "Pemrograman Berorientasi Objek (OOP)",
            "Basis Data",
            "Sistem Operasi",
            "Jaringan Komputer",
            "Rekayasa Perangkat Lunak",
            "Interaksi Manusia dan Komputer",
            "Kecerdasan Buatan",
            "Keamanan Informasi",

            "Pemrograman Web",
            "Pemrograman Mobile",
        ];
        
        $data = [];
        for ($i=0; $i < 10; $i++) { 
            $data[] = [
                'kode_matakuliah' => $faker->unique()->bothify('MK###'),
                'nama' => $faker->unique()->randomElement($mataKuliah),
                'sks' => $faker->numberBetween(2, 4),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('mata_kuliah')->insert($data);
        // DB::table('mata_kuliah')->delete();
    }
}
