<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TransaksiCon extends Controller
{
    // Menampilkan daftar transaksi
    public function index()
    {
        $data['transaksi'] = Transaksi::orderBy('tanggal_transaksi', 'desc')->get();
        $data['warga'] = Transaksi::all();
        return view('admin.transaksi', $data);
    }

    // Menambahkan transaksi baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_pengguna'   => 'required|string|max:100',
            'jenis_transaksi' => 'required|in:bulanan,tahunan',
            'jumlah'          => 'required|numeric|min:1',
        ]);


        $transaksi = Transaksi::create([

            'kode_transaksi'    => 'TRX' . time(),
            'nama_pengguna'     => $request->nama_pengguna,
            'tanggal_transaksi' => now(),
            'jenis_transaksi'   => $request->jenis_transaksi,
            'jumlah'            => $request->jumlah,
        ]);


        $warga = \App\Models\Warga::where('nama', $request->nama_pengguna)->first();
        if ($warga) {
            $warga->total_bayar += $request->jumlah;
            $warga->save();
        }

        return redirect()->route('transaksi.index')->with('success', 'Pembayaran berhasil disimpan!');
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
