<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WargahomeCon extends Controller
{
    public function index()
    {
        return view('Warga.home');
    }
}
