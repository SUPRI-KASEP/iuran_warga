<?php

namespace App\Http\Controllers;

use App\Models\DataWarga;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung jumlah data warga
        $jumlahWarga = DataWarga::count();

        // Hitung jumlah transaksi
        $jumlahTransaksi = Transaksi::count();

        // Hitung transaksi hari ini
        $todaySale = Transaksi::whereDate('tanggal_transaksi', Carbon::today())
            ->sum('jumlah');

        // Hitung total semua pemasukan
        $totalRevenue = Transaksi::sum('jumlah');

        return view('admin.dashboard', compact(
            'jumlahWarga',
            'jumlahTransaksi',
            'todaySale',
            'totalRevenue'
        ));
    }
}
