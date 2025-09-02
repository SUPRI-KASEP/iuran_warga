<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TransaksiCon extends Controller
{
    // Menampilkan daftar transaksi
    public function index()
    {
        $transaksi = Transaksi::orderBy('tanggal_transaksi', 'desc')->get();
        return view('admin.transaksi', compact('transaksi'));
    }

    // Menambahkan transaksi baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_transaksi'    => 'required|unique:transaksi,kode_transaksi',
            'nama_pengguna'     => 'required|string|max:100',
            'tanggal_transaksi' => 'required|date',
            'jenis_transaksi'   => 'required|in:bulanan,tahunan',
            'jumlah'            => 'required|numeric|min:1',
        ]);

        Transaksi::create([
            'kode_transaksi'    => $request->kode_transaksi,
            'nama_pengguna'     => $request->nama_pengguna,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'jenis_transaksi'   => $request->jenis_transaksi,
            'jumlah'            => $request->jumlah,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    // Menghapus transaksi
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus!');
    }

   
    public function dashboard()
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

        return view('admin.dashboard', compact('labels', 'monthlyIncome', 'totalCumulative', 'averageMonthly'));
    }
}
