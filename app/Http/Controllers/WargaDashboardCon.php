<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WargaDashboardCon extends Controller
{
    //

    public function index()
    {
        return view('Warga.dashboard');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email',
        ]);

        User::create([
            'name' => $request->nama,
            'address' => $request->alamat,
            'nohp' => $request->no_hp,
            'username' => strtolower(str_replace(' ', '', $request->nama)), // contoh generate
            'level' => 'warga',
        ]);

        return redirect()->route('warga.dashboard')
                         ->with('success', 'Data warga berhasil disimpan!');
    }
}
