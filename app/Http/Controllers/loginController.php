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

            // Cek role user dan arahkan ke halaman yang sesuai
            if ($user->role === 'perawat') {
                return redirect('/dashboard')  // Ganti dengan route yang sesuai
                    ->with('success', 'Login berhasil sebagai Perawat!');
            } elseif ($user->role === 'admin') {
                return redirect('/dashboard')  // Ganti dengan route yang sesuai
                    ->with('success', 'Login berhasil sebagai Admin!');
            }

        }
    }

    // Jika login gagal
    return back()->with('error', 'Username atau password salah.');
}


    public function logout(Request $request)
    {
        Auth::logout(); // Logout pengguna

        // Hapus session yang tersimpan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman login atau lainnya
        return redirect('/')->with('success', 'Anda berhasil logout.');
    }
}
