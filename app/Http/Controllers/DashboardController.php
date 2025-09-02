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

        // --- Pemasukan Bulanan & Total Kumulatif ---
        $labels = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
        $monthlyIncome = [];
        $totalCumulative = [];
        $cumulative = 0;

        for ($month = 1; $month <= 12; $month++) {
            $total = Transaksi::whereYear('tanggal_transaksi', date('Y'))
                ->whereMonth('tanggal_transaksi', $month)
                ->sum('jumlah');

            $monthlyIncome[] = $total;

            $cumulative += $total;
            $totalCumulative[] = $cumulative;
        }

        // --- Pemasukan Tahunan (misal 5 tahun terakhir) ---
        $currentYear = date('Y');
        $yearLabels = [];
        $annualIncome = [];
        for($i = 4; $i >= 0; $i--) {
            $year = $currentYear - $i;
            $yearLabels[] = $year;
            $annualIncome[] = Transaksi::whereYear('tanggal_transaksi', $year)
                                       ->sum('jumlah');
        }

        // Kirim semua data ke view
        return view('admin.dashboard', compact(
            'jumlahWarga',
            'jumlahTransaksi',
            'todaySale',
            'totalRevenue',
            'labels',
            'monthlyIncome',
            'totalCumulative',
            'yearLabels',
            'annualIncome'
        ));
    }
}
