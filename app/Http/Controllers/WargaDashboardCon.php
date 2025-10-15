<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\Warga;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class WargaDashboardCon extends Controller
{
    public function index()
    {
        $tahunIni = Carbon::now()->year;

        $labels = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
        $monthlyIncome = [];
        $totalCumulative = [];
        $sum = 0;

        foreach(range(1,12) as $bulan) {
            $total = Transaksi::whereYear('tanggal_transaksi', $tahunIni)
                              ->whereMonth('tanggal_transaksi', $bulan)
                              ->sum('jumlah');
            $monthlyIncome[] = $total;
            $sum += $total;
            $totalCumulative[] = $sum;
        }

        // Rata-rata bulanan
        $averageMonthly = [];
        foreach($totalCumulative as $index => $total) {
            $averageMonthly[] = round($total / ($index + 1));
        }

        $jumlah_warga = Warga::count();
        $bulan_ini = Transaksi::whereMonth('tanggal_transaksi', now()->month)
                    ->whereYear('tanggal_transaksi', now()->year)
                    ->sum('jumlah');
        $tahun_ini = Transaksi::whereYear('tanggal_transaksi', now()->year)->sum('jumlah');
        $jumlah_transaksi = Transaksi::count();

        return view('Warga.dashboard', compact('labels', 'monthlyIncome', 'totalCumulative', 'averageMonthly', 'jumlah_warga', 'bulan_ini', 'tahun_ini', 'jumlah_transaksi'));
    }
}
