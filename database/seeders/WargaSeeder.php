<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Warga;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Warga::insert([
            [
                'nik' => '3276010101010001',
                'nama' => 'Bayu',
                'jk' => 'L',
                'kategori' => 'Kepala Keluarga',
                'alamat' => 'Jl. Melati No.1',
                'no_rumah' => 'A1',
                'status' => 'aktif',
                'username' => 'bayu123',
                'password' => bcrypt('123'),
                'id_dues_category' => 1
            ],
            [
                'nik' => '3276010101010002',
                'nama' => 'Jarwo',
                'jk' => 'L',
                'kategori' => 'Warga',
                'alamat' => 'Jl. Melati No.2',
                'no_rumah' => 'A2',
                'status' => 'aktif',
                'username' => 'jarwo123',
                'password' => bcrypt('123'),
                'id_dues_category' => 1,
            ],
            [
                'nik' => '3276010101010003',
                'nama' => 'Supri',
                'jk' => 'L',
                'kategori' => 'Warga',
                'alamat' => 'Jl. Melati No.3',
                'no_rumah' => 'A3',
                'status' => 'aktif',
                'username' => 'cupli123',
                'password' => bcrypt('123'),
                'id_dues_category' => 1
            ],
        ]);
    }
}
