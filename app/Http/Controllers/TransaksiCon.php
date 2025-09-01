<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;

use Illuminate\Http\Request;

class TransaksiCon extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('admin.transaksi', compact('transaksi'));
    }

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

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus!');
    }
}
