<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users; // Gunakan model Users

class LoginController extends Controller
{
    public function loginPost(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek apakah username ada di database
        $user = Users::where('username', $request->username)->first();

        if ($user) {
            // Cek status akun
            if ($user->status === 'belum diverifikasi') {
                return back()->with('error', 'Akun Anda belum diverifikasi. Silakan Tunggu 1x24 jam.');
            }

            // Jika status sudah diverifikasi, lanjutkan proses login
            if (Auth::attempt($credentials, $request->has('remember'))) {
                $request->session()->regenerate();

                return redirect()->intended('/dashboard')
                    ->with('success', 'Login berhasil!');
            }
        }

        // Jika login gagal
        return back()->with('error', 'Username atau password salah.');
    }
}
