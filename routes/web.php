<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaCon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('login');
})->name('login');



// Redirect dari root ke login
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/', function(){
    return view('admin.datawarga');
});

// Proses login (POST)
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Logout
Route::post('/logout', function () {
    session()->flush();
    return redirect()->route('login');
})->name('logout');

// Dashboard Admin - Tanpa middleware
Route::get('/admin/dashboard', function () {
    // Debug isi session, hapus atau comment setelah dicek
    $user = session('user');

    if (!session('is_logged_in') || !$user || $user->level !== 'admin') {
        return redirect()->route('login')->with('error', 'Silakan login sebagai admin.');
    }

    return view('admin.dashboard');
});

// Dashboard Warga - Tanpa middleware
Route::get('/warga/home', function () {
    $user = session('user');

    if (!session('is_logged_in') || !$user || $user->level !== 'warga') {
        return redirect()->route('login')->with('error', 'Silakan login sebagai warga.');
    }

    return view('warga.home');
});


Route::get('/dashboard', [DashboardCon::class, 'dashboard'])->name('dashboard');
Route::get('/datawarga', [WargaCon::class, 'index'])->name('datawarga');
Route::get('/transaksikas', [TransaksiCon::class, 'index'])->name('transaksikas');


Route::get('/datawarga', [WargaCon::class, 'index'])->name('datawarga');
Route::get('/datawarga/create', [WargaCon::class, 'create'])->name('warga.create');
Route::post('/datawarga', [WargaCon::class, 'store'])->name('warga.store');
Route::get('/datawarga/{id}/edit', [WargaCon::class, 'edit'])->name('warga.edit');
Route::put('/datawarga/{id}', [WargaCon::class, 'update'])->name('warga.update');
Route::delete('/datawarga/{id}', [WargaCon::class, 'destroy'])->name('warga.destroy');





