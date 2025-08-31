<?php

namespace App\Http\Controllers;

use App\Models\DataWarga;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     public function index()
    {
        // Hitung jumlah data warga
        $jumlahWarga = DataWarga::count();

        // Untuk sementara, jumlah transaksi 0 (nanti ambil dari model TransaksiKas)
        $jumlahTransaksi = 0;

        // Bisa juga tambahkan todaySale & totalRevenue biar tidak error di Blade
        $todaySale = 0;
        $totalRevenue = 0;

        return view('admin.dashboard', compact('jumlahWarga', 'jumlahTransaksi'));
    }
}
