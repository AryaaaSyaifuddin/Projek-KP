<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    // Menampilkan dashboard user
    public function dashboardAkun()
    {
        $showForm = session('showForm', true); // Default true (form create)
        $user = session('user', null); // Data user untuk edit
        $dataUsers = Users::all(); // Ambil semua data user

        return view('akun_dashboard', compact('showForm', 'dataUsers', 'user'));
    }

    // Menampilkan form create user
    public function showCreateFormAkun()
    {
        session(['showForm' => false, 'user' => null]);
        return redirect('/akun'); // Redirect ke halaman user
    }

    // Menampilkan form edit user
    public function edit($id)
    {
        // Ambil data pasien berdasarkan ID
        $akun = Users::findOrFail($id);

        // Kirim data pasien ke view edit_pasien
        return view('edit_akun', compact('akun'));
    }

    // Menyimpan data user baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'role' => 'required|string|in:admin,user',
            'username' => 'required|string|unique:users,username|max:255',
            'password' => 'required|string|min:8',
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'required|string|max:15',
        ]);

        $user = new Users();
        $user->nama = $validated['nama'];
        $user->role = $validated['role'];
        $user->username = $validated['username'];
        $user->password = bcrypt($validated['password']); // Enkripsi password
        $user->email = $validated['email'];
        $user->no_hp = $validated['no_hp'];
        $user->status = 'belum diverifikasi'; // Default status

        $user->save();

        return redirect()->back()->with('success', 'User berhasil ditambahkan.');
    }

    // Menyimpan perubahan data user
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'role' => 'required|string|in:admin,user',
            'username' => 'required|unique:users,username,' . $id . ',id_user', // Sesuaikan kolom id_user
            'email' => 'required|email|unique:users,email,' . $id . ',id_user',
            'no_hp' => 'required|string|max:15',
            'status' => 'required|string|in:sudah diverifikasi,belum diverifikasi',
        ]);

        $user = Users::findOrFail($id);
        $user->update([
            'nama' => $validated['nama'],
            'role' => $validated['role'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'no_hp' => $validated['no_hp'],
            'status' => $validated['status'],
        ]);

        return redirect()->back()->with('success', 'Data user berhasil diperbarui.');
    }

    // Menangani pembatalan dan kembali ke tabel
    public function cancelFormAkun()
    {
        session(['showForm' => true, 'user' => null]);
        return redirect('/akun'); // Redirect ke halaman user
    }

    // Menghapus data user
    public function destroy($id_user)
    {
        $user = Users::findOrFail($id_user);
        $user->delete();

        return redirect()->back()->with('success', 'User berhasil dihapus!');
    }
}
