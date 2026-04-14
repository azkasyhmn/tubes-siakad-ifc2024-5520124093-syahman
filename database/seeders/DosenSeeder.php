<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        $data = [];
        for ($i=0; $i < 10; $i++) { 
            $data[] = [
                'nidn' => $faker->unique()->numerify('##########'),
                'nama' => $faker->name,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('dosen')->insert($data);
    }
}
