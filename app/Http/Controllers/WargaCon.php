<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Warga;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class WargaCon extends Controller
{
    /**
     * Menampilkan semua data warga
     */
    public function index()
    {
        $data['user'] = User::all();
        return view('admin.datawarga', $data);    }

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
            'nama' => 'required|string|max:255',
            'nik' => 'required|numeric|unique:warga,nik',
            'jk' => 'required|in:L,P',
            'alamat' => 'required|string',
            'no_rumah' => 'required|string',
            'status' => 'required|string',
        ]);

        $data['user'] = Warga::all();



        return redirect()->route('datawarga')->with('success', 'Data warga berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk edit data warga
     */
    public function edit($id)
    {
        $warga = Warga::findOrFail($id);
        return view('admin.editwarga', compact('warga'));
    }

    /**
     * Memperbarui data warga
     */
    public function update(Request $request, $id)
    {
        $warga = Warga::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|numeric|unique:warga,nik,' . $id,
            'jk' => 'required|in:L,P',
            'alamat' => 'required|string',
            'no_rumah' => 'required|string',
            'status' => 'required|string',
        ]);

        $warga->update($request->all());

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
