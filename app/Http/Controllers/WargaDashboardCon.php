<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\Warga;
use Illuminate\Support\Facades\Auth;

class WargaDashboardCon extends Controller
{
    public function index()
    {
        // jumlah warga
        $jumlah_warga = Warga::all()->count();

        // total pemasukan bulan ini
        $bulan_ini = Transaksi::whereMonth('tanggal_transaksi', now()->month)
                    ->whereYear('tanggal_transaksi', now()->year)
                    ->sum('jumlah');

        // total pemasukan tahun ini
        $tahun_ini = Transaksi::whereYear('tanggal_transaksi', now()->year)
                    ->sum('jumlah');

        // jumlah transaksi
        $jumlah_transaksi = Transaksi::count();

        // untuk grafik per bulan
        $bulan = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
        $data_pemasukan = collect(range(1, 12))->map(fn($i) =>
            Transaksi::whereMonth('tanggal_transaksi', $i)
                     ->whereYear('tanggal_transaksi', now()->year)
                     ->sum('jumlah')
        );

        return view('Warga.dashboard', [
            'user' => Auth::user(),
            'jumlah_warga' => $jumlah_warga,
            'bulan_ini' => $bulan_ini,
            'tahun_ini' => $tahun_ini,
            'jumlah_transaksi' => $jumlah_transaksi,
            'bulan' => $bulan,
            'data_pemasukan' => $data_pemasukan,
        ]);
    }
}
