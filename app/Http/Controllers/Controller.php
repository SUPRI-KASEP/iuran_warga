<?php

namespace App\Http\Controllers;
use App\Models\DataWarga;


abstract class Controller
{
    public function create()
{
    $jumlahWarga = DataWarga::count(); 
        $jumlahTransaksi = 0; 

    return view('admin.dashboard', compact('jumlahWarga', 'jumlahTransaksi'));
    return view('admin.warga.datawarga');
}
}
