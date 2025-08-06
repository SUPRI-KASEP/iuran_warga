<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Tambahkan user admin dan warga
        User::create([
            'name' => 'Admin RW',
            'username' => 'adminrw',
            'password' => bcrypt('admin123'),
            'nohp' => '0812345678',
            'address' => 'Jl. Cileles No. 1',
            'level' => 'admin',
        ]);

        User::create([
            'name' => 'Jarwo',
            'username' => 'jarwoo',
            'password' => bcrypt('23456'),
            'nohp' => '0812123456',
            'address' => 'Jl. Cileles No. 2',
            'level' => 'warga',
        ]);

        User::create([
            'name' => 'Supri',
            'username' => 'suprii',
            'password' => bcrypt('54321'),
            'nohp' => '0812965432',
            'address' => 'Jl. Cileles No. 3',
            'level' => 'warga',
        ]);
    }
}
