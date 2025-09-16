<?php

namespace Database\Seeders;

use App\Models\DuesCategory;
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
        DuesCategory::create([
            'name' => 'Iuran Kebersihan',
            'periode' => 'bulanan',
            'amount' => 100000,
            'status' => 'aktif',
            'description' => 'Iuran rutin kebersihan lingkungan'
        ]);
        $this->call([
            WargaSeeder::class,
        ]);
    }
}
