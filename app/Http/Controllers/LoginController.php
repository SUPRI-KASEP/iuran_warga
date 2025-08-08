<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Ambil user berdasarkan username
        $user = User::where('username', $request->username)->first();

        // Cek apakah user ada dan password benar
        if ($user && Hash::check($request->password, $user->password)) {
            // Login menggunakan auth()
            Auth::login($user);

            // Log session setelah login
            logger('User logged in:', ['user_id' => $user->id]);

            // Redirect berdasarkan level user
            return ($user->level === 'admin')
                ? redirect('/admin/dashboard')
                : redirect('/warga/home');
        }

        // Jika login gagal, kembalikan ke halaman login dengan pesan error
        return redirect()->route('login')
            ->withErrors(['username' => 'Username atau password salah'])
            ->withInput(); // Menyertakan input sebelumnya
    }
}
