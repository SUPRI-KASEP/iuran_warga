<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Ambil user berdasarkan username
        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session([
                'is_logged_in' => true,
                'user' => $user,
    ]);

    logger('Session setelah login:', session()->all());

    return ($user->level === 'admin')
        ? redirect('/admin/dashboard')
        : redirect('/warga/home');
        }
    }
}
