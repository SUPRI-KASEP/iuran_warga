<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Tambahkan user admin dan warga
        User::create([
            'name' => 'Admin RW',
            'username' => 'adminrw',
            'password' => Hash::make('password'),
            'nohp' => '081234567890',
            'address' => 'Jl. Admin No. 1',
            'level' => 'admin',
        ]);

        User::create([
            'name' => 'Warga A',
            'username' => 'wargaa',
            'password' => Hash::make('password'),
            'nohp' => '081212345678',
            'address' => 'Jl. Warga A',
            'level' => 'warga',
        ]);

        User::create([
            'name' => 'Warga B',
            'username' => 'wargab',
            'password' => Hash::make('password'),
            'nohp' => '081298765432',
            'address' => 'Jl. Warga B',
            'level' => 'warga',
        ]);
    }
}
