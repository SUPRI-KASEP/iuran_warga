<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Warga;
use Illuminate\Http\Request;

class WargaCon extends Controller
{
    /**
     * Menampilkan semua data warga
     */
    public function index()
    {
        $data['warga'] = Warga::all();
        return view('admin.datawarga', $data);
    }

    /**
     * Menampilkan form untuk menambahkan warga
     */
    public function create()
    {
        return view('admin.createdata');
    }

    /**
     * Menyimpan data warga baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik'           => 'required|numeric|unique:warga,nik',
            'nama'          => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'kategori'      => 'required|in:Admin,Warga',
            'alamat'        => 'required|string',
            'no_rumah'      => 'required|string',
            'status'        => 'required|in:Aktif,Menunggu',
        ]);

        Warga::create([
            'nik'           => $request->nik,
            'nama'          => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kategori'      => $request->kategori, 
            'alamat'        => $request->alamat,
            'no_rumah'      => $request->no_rumah,
            'status'        => $request->status,
        ]);

        return redirect()->route('datawarga')->with('success', 'Data warga berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit
     */
    public function edit($id) {
        $warga = Warga::findOrFail($id);
        return view('admin.editdata', compact('warga'));
    }

    /**
     * Memperbarui data warga
     */
    public function update(Request $request, $id) {
        $request->validate([
            'nik'           => 'required|numeric|unique:warga,nik,' . $id,
            'nama'          => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'kategori'      => 'required|in:Admin,Warga',
            'alamat'        => 'required|string',
            'no_rumah'      => 'required|string',
            'status'        => 'required|in:Aktif,Menunggu',
        ]);

        $warga = Warga::findOrFail($id);

        $warga->update([
            'nik'           => $request->nik,
            'nama'          => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kategori'      => $request->kategori,
            'alamat'        => $request->alamat,
            'no_rumah'      => $request->no_rumah,
            'status'        => $request->status,
        ]);

        return redirect()->route('datawarga')->with('success', 'Data warga berhasil diperbarui.');
    }

    /**
     * Menghapus data warga
     */
    public function destroy($id)
    {
        $warga = Warga::findOrFail($id);
        $warga->delete();

        return redirect()->route('datawarga')->with('success', 'Data warga berhasil dihapus.');
    }
}