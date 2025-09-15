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
        $data['warga'] = Warga::all();
        return view('Admin.transaksi', $data);
    }

    // Menambahkan transaksi baru
    public function store(Request $request)
    {
        $request->validate([
            'warga_id'         => 'required|exists:warga,id',
            'jenis_transaksi'  => 'required|in:bulanan,tahunan',
            'jumlah'           => 'required|numeric|min:1',
        ]);

        $warga = Warga::findOrFail($request->warga_id);

        $transaksi = Transaksi::create([
            'kode_transaksi'    => 'TRX' . time(),
            'nama_pengguna'     => $warga->nama,   // otomatis ambil dari tabel warga
            'tanggal_transaksi' => now(),
            'jenis_transaksi'   => $request->jenis_transaksi,
            'jumlah'            => $request->jumlah,
        ]);

        // update total bayar (pastikan field ini ada di tabel warga)
        if (isset($warga->total_bayar)) {
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

        return view('Admin.dashboard', compact('labels', 'monthlyIncome', 'totalCumulative', 'averageMonthly'));
    }
}
