<?php

use App\Http\Controllers\AdminCon;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\TransaksiCon;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaCon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;


Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/Login', [LoginController::class, 'Login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route dengan Middleware Auth untuk halaman-halaman lain
Route::middleware(['auth'])->group(function () {
    Route::get('/datawarga', [WargaCon::class, 'index'])->name('datawarga');
    Route::get('/admin/dashboard', [AdminCon::class, 'dashboard'])->name('dashboard');
    // Route::get('/transaksi', [TransaksiCon::class, 'index'])->name('transaksi');i

    Route::get('/datawarga/create', [WargaCon::class, 'create'])->name('warga.create');
    Route::post('/datawarga', [WargaCon::class, 'store'])->name('warga.store');
    Route::get('/datawarga/{id}/edit', [WargaCon::class, 'edit'])->name('warga.edit');
    Route::put('/datawarga/{id}', [WargaCon::class, 'update'])->name('warga.update');
    Route::get('/datawarga/{id}', [WargaCon::class, 'destroy'])->name('warga.destroy');


});



