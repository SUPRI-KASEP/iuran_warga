<?php

use App\Http\Controllers\AdminCon;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\TransaksiCon;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaCon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;


Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'Login'])->name('login.post');

// logout harus POST
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');


// Route dengan Middleware Auth untuk halaman-halaman lain
Route::middleware(['auth'])->group(function () {
    Route::get('/datawarga', [WargaCon::class, 'index'])->name('datawarga');
    Route::get('/admin/dashboard', [AdminCon::class, 'dashboard'])->name('dashboard');

    Route::get('/transaksi', [TransaksiCon::class, 'index'])->name('transaksi.index');
    Route::post('/transaksi/store', [TransaksiCon::class, 'store'])->name('transaksi.store');
    Route::delete('/transaksi/{id}', [TransaksiCon::class, 'destroy'])->name('transaksi.destroy');




    Route::get('/datawarga/create', [WargaCon::class, 'create'])->name('admin.createdata');
    Route::post('/datawarga', [WargaCon::class, 'store'])->name('admin.store');
    Route::get('/datawarga/{id}/edit', [WargaCon::class, 'edit'])->name('admin.editwarga');
    Route::put('/datawarga/{id}', [WargaCon::class, 'update'])->name('admin.updatewarga');

    Route::delete('/datawarga/{id}', [WargaCon::class, 'destroy'])->name('admin.delete');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});




