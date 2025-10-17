<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function index()
    {
        return view('login'); // Pastikan ada view 'login' yang sesuai
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Ambil user berdasarkan username
        $userusername = User::where('username', $request->username)->first();
        $wargausername = Warga::where('username', $request->username)->first();
        if ($userusername) {
            $user = User::where('username', $request->username)->first();
        }elseif ($wargausername) {
            $user = Warga::where('username', $request->username)->first();
        }

        if ($user && Hash::check($request->password, $user->password)) {
            // Autentikasi berhasil, login menggunakan Auth
            Auth::login($user);

            // Redirect ke dashboard sesuai level pengguna
            return ($user->level === 'admin')
                ? redirect('/admin/dashboard')
                : redirect('/warga/dashboard');
        }

        // Jika gagal login
        return back()->with('error', 'Kredensial tidak cocok');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
