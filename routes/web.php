<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\UserController;
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
    dd(session()->all());

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
