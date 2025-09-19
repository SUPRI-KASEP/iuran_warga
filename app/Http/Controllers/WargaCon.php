<?php

namespace App\Http\Controllers;

use App\Models\DuesCategory;
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
        return view('Admin.datawarga', $data);
    }

    /**
     * Menampilkan form untuk menambahkan warga
     */
    public function create()
    {
        $data['duesCategories'] = DuesCategory::all();
        return view('Admin.createdata', $data);
    }

    /**
     * Menyimpan data warga baru
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nik'             => 'required|numeric|unique:warga,nik',
            'nama'            => 'required|string|max:255',
            'jk'              => 'required|in:L,P',
            'alamat'          => 'required|string',
            'no_rumah'        => 'required|string|max:50',
            'status'          => 'required|in:aktif,nonaktif',
            'username'        => 'required|string|max:100|unique:warga,username',
            'password'        => 'required|string',
            'id_dues_category'=> 'required|exists:dues_categories,id',
        ]);

        $validasi['kategori'] = 'warga';
        $validasi['password'] = bcrypt($request->password);
        $validasi['level'] = 'warga';

        Warga::create($validasi);

        return redirect()->route('datawarga')->with('success', 'Data warga berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit
     */
    public function edit($id) {
        $warga = Warga::findOrFail($id);
        $data['duesCategories'] = DuesCategory::all();
        return view('Admin.editdata', compact('warga'), $data);
    }

    /**
     * Memperbarui data warga
     */
    public function update(Request $request, $id) {
        $request->validate([
            'nik'             => 'required|numeric|unique:warga,nik,' . $id,
            'nama'            => 'required|string|max:255',
            'jk'              => 'required|in:L,P',
            'alamat'          => 'required|string',
            'no_rumah'        => 'required|string|max:50',
            'status'          => 'required|in:aktif,nonaktif',
            'username'        => 'required|string|max:100|unique:warga,username,' . $id,
            'password'        => 'nullable|string',
            'id_dues_category'=> 'required|exists:dues_categories,id',
        ]);

        $warga = Warga::findOrFail($id);

        $dataUpdate = [
            'nik'             => $request->nik,
            'nama'            => $request->nama,
            'jk'              => $request->jk,
            'alamat'          => $request->alamat,
            'no_rumah'        => $request->no_rumah,
            'status'          => $request->status,
            'username'        => $request->username,
            'id_dues_category'=> $request->id_dues_category,
        ];

        // kalau password diisi, update password
        if ($request->filled('password')) {
            $dataUpdate['password'] = bcrypt($request->password);
        }

        $warga->update($dataUpdate);

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
