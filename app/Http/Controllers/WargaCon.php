<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaCon extends Controller
{
    // Tampilkan semua data warga
    public function index()
    {
        $warga = Warga::all();
        return view('warga.index', compact('warga'));
    }

    // Tampilkan form tambah warga
    public function create()
    {
        return view('warga.create');
    }

    // Simpan data warga baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|numeric|unique:warga,nik',
            'jk' => 'required|in:L,P',
            'alamat' => 'required',
            'no_rumah' => 'required',
            'status' => 'required',
        ]);

        Warga::create($request->all());

        return redirect()->route('datawarga')->with('success', 'Data warga berhasil ditambahkan.');
    }

    // Tampilkan form edit warga
    public function edit($id)
    {
        $warga = Warga::findOrFail($id);
        return view('warga.edit', compact('warga'));
    }

    // Update data warga
    public function update(Request $request, $id)
    {
        $warga = Warga::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|numeric|unique:warga,nik,' . $id,
            'jk' => 'required|in:L,P',
            'alamat' => 'required',
            'no_rumah' => 'required',
            'status' => 'required',
        ]);

        $warga->update($request->all());

        return redirect()->route('datawarga')->with('success', 'Data warga berhasil diperbarui.');
    }

    // Hapus data warga
    public function destroy($id)
    {
        $warga = Warga::findOrFail($id);
        $warga->delete();

        return redirect()->route('datawarga')->with('success', 'Data warga berhasil dihapus.');
    }
}
