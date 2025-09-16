<?php

namespace App\Http\Controllers;

use App\Models\DuesCategory;
use App\Models\User;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'kategori'        => 'nullable',
            'id_dues_category'=> 'required|exists:dues_categories,id',
        ]);

        $validasi['kategori'] = 'warga';

// Hash password sebelum disimpan
$validasi['password'] = bcrypt($request->password);

// level default = warga
$validasi['level'] = 'warga';

// simpan ke tabel warga
Warga::create($validasi);

return redirect()->route('datawarga')->with('success', 'Data warga berhasil ditambahkan.');

    }

    /**
     * Menampilkan form edit
     */
    public function edit($id) {
        $warga = Warga::findOrFail($id);
        $data ['duesCategories'] = DuesCategory::all();
        return view('Admin.editdata', compact('warga'),$data);
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
