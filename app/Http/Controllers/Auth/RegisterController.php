<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function registerPost(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'role' => 'required|string',
            'username' => 'required|string|unique:users,username|max:255',
            'password' => 'required|string|min:8|confirmed',
            'email' => 'nullable|email|unique:users,email|max:255',
            'no_hp' => 'required|string|max:15',
        ]);

        // Membuat user baru
        Users::create([
            'nama' => $request->input('nama'),
            'role' => $request->input('role'),
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')), // Enkripsi password
            'email' => $request->input('email'),
            'no_hp' => $request->input('no_hp'),
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Registration successful. Please wait for verification.');
    }
}
