<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {
        return response()->json(User::all());
    }

    // Simpan user baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'nohp' => 'required',
            'address' => 'required',
            'level' => 'required|in:warga,admin',
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nohp' => $request->nohp,
            'address' => $request->address,
            'level' => $request->level,
        ]);

        return response()->json($user, 201);
    }

    // Tampilkan user berdasarkan ID
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    // Update user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|required',
            'username' => 'sometimes|required|unique:users,username,' . $id,
            'password' => 'nullable|min:6',
            'nohp' => 'sometimes|required',
            'address' => 'sometimes|required',
            'level' => 'sometimes|required|in:warga,admin',
        ]);

        $user->update([
            'name' => $request->name ?? $user->name,
            'username' => $request->username ?? $user->username,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'nohp' => $request->nohp ?? $user->nohp,
            'address' => $request->address ?? $user->address,
            'level' => $request->level ?? $user->level,
        ]);

        return response()->json($user);
    }

    // Hapus user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}



