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
            'password' => bcrypt('12345'),
            'nohp' => '081234567890',
            'address' => 'Jl. Admin No. 1',
            'level' => 'admin',
        ]);

        User::create([
            'name' => 'Warga A',
            'username' => 'wargaa',
            'password' => bcrypt('23456'),
            'nohp' => '081212345678',
            'address' => 'Jl. Warga A',
            'level' => 'warga',
        ]);

        User::create([
            'name' => 'Warga B',
            'username' => 'wargab',
            'password' => bcrypt('54321'),
            'nohp' => '081298765432',
            'address' => 'Jl. Warga B',
            'level' => 'warga',
        ]);
    }
}
