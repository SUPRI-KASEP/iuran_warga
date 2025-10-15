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
        $validated=$request->validate([
            'warga_id'         => 'required|exists:warga,id',
            'jenis_transaksi'  => 'required|in:bulanan,tahunan',
            'id_dc' => 'required|integer',
            'jumlah'           => 'required|numeric|min:1',
        ]);

        $category = DuesCategory::find($validated['dues_categories_id']);
        $validated['nominal'] = $category->nominal;
        $validated['period'] = $category->period;
        $validated['jumlah_tagihan'] = $category->nominal;
        $validated['nominal_tagihan'] = $category->nominal;

        Transaksi::create($validated);

        $warga = Warga::findOrFail($request->warga_id);

        $transaksi = Transaksi::create([
            'kode_transaksi'    => 'TRX' . time(),
            'nama_pengguna'     => $warga->nama,
            'tanggal_transaksi' => now(),
            'jenis_transaksi'   => $request->jenis_transaksi,
            'id_dc' => $request->id_dc,
            'jumlah'            => $request->jumlah,
        ]);

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
