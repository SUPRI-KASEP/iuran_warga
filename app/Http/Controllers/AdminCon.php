<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminCon extends Controller
{
    //
    public function dashboard() {
        return view('admin.dashboard'); // Pastikan ada view 'admin.dashboard' yang sesuai
    }
}
