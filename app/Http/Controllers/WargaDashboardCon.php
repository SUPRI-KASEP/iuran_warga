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
        // Hapus perhitungan grafik karena tidak digunakan lagi

        $jumlah_warga = Warga::count();
        $bulan_ini = Transaksi::whereMonth('tanggal_transaksi', now()->month)
                    ->whereYear('tanggal_transaksi', now()->year)
                    ->sum('jumlah');
        $tahun_ini = Transaksi::whereYear('tanggal_transaksi', now()->year)->sum('jumlah');
        $jumlah_transaksi = Transaksi::count();

        // Ambil histori transaksi milik warga yang login
        $histori_transaksi = Transaksi::where('warga_id', Auth::id())
                                      ->with('kategori')
                                      ->orderBy('tanggal_transaksi', 'desc')
                                      ->get();

        return view('Warga.dashboard', compact('jumlah_warga', 'bulan_ini', 'tahun_ini', 'jumlah_transaksi', 'histori_transaksi'));
    }
}
