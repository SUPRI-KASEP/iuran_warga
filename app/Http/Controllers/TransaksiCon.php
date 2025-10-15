<?php

namespace App\Http\Controllers;

use App\Models\DuesCategory;
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
        $data['dc'] = DuesCategory::all();
       $data['transaksi'] = Transaksi::with('dc')->orderBy('tanggal_transaksi', 'desc')->get();
        $data['warga'] = Warga::all();
        return view('Admin.transaksi', $data);
    }

    // Menambahkan transaksi baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'warga_id'         => 'required|exists:warga,id',
            'id_dc'            => 'required|exists:dues_categories,id',
        ]);

        $category = DuesCategory::findOrFail($validated['id_dc']);
        $warga = Warga::findOrFail($validated['warga_id']);

        $transaksi = Transaksi::create([
            'kode_transaksi'    => 'TRX' . time(),
            'nama_pengguna'     => $warga->nama,
            'tanggal_transaksi' => now(),
            'jenis_transaksi'   => $category->periode,
            'id_dc'             => $category->id,
            'jumlah'            => $category->amount,
            'warga_id'          => $warga->id,
        ]);

        if (isset($warga->total_bayar)) {
            $warga->total_bayar += $category->amount;
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
