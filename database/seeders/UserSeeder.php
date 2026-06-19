<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'     => 'Administrator',
            'email'    => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'role'     => 'admin',
        ]);

        User::create([
            'name'     => 'Syahman',
            'email'    => 'syahman@gmail.com',
            'password' => bcrypt('246'),
            'role'     => 'mahasiswa',
            'npm'      => '5520124093',
        ]);
    }
}
