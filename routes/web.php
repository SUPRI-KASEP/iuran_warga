<?php

use App\Http\Controllers\OfficerController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('login');
})->name('login');

// Proses login
Route::post('/login', function (Request $request) {
    $user = User::where('username', $request->username)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        session([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_level' => $user->level, // admin atau warga
            'is_logged_in' => true
        ]);

        // Redirect sesuai role
        return ($user->level === 'admin') ? redirect('/admin/dashboard') : redirect('/warga/home');
    }

    return redirect()->back()->with('error', 'Username atau password salah.');
})->name('login.submit');

// Logout
Route::post('/logout', function () {
    session()->flush();
    return redirect('/login');
})->name('logout');

// Dashboard untuk Admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['ceklogin', 'role:admin']);

// Dashboard untuk Warga
Route::get('/warga/home', function () {
    return view('warga.home');
})->middleware(['ceklogin', 'role:warga']);
