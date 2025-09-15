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
                'jk' => 'L/P',
                'kategori' => 'Kepala Keluarga',
                'alamat' => 'Jl. Melati No.1',
                'no_rumah' => 'A1',
                'status' => 'aktif',
            ],
            [
                'nik' => '3276010101010002',
                'nama' => 'Jarwo',
                'jk' => 'L/P',
                'kategori' => 'Warga',
                'alamat' => 'Jl. Melati No.2',
                'no_rumah' => 'A2',
                'status' => 'aktif',
            ],
            [
                'nik' => '3276010101010003',
                'nama' => 'Supri',
                'jk' => 'L/P',
                'kategori' => 'Warga',
                'alamat' => 'Jl. Melati No.3',
                'no_rumah' => 'A3',
                'status' => 'aktif',
            ],
        ]);
    }
}
