<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class pasienController extends Controller
{
    public function dashboardPasien()
{
    // Periksa apakah ingin menampilkan form atau tabel
    $showForm = session('showForm', false);

    // Ambil data pasien dari database
    $dataPasien = Pasien::all();

    // Pass data ke view
    return view('pasien_dashboard', compact('showForm', 'dataPasien'));
}


    public function showCreateForm()
    {
        // Set session untuk menampilkan form
        session(['showForm' => true]);
        return redirect('/pasien'); // Redirect ke halaman pasien
    }

    public function cancelForm()
    {
        // Reset session untuk kembali ke tabel
        session(['showForm' => false]);
        return redirect('/pasien'); // Redirect ke halaman pasien
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_panjang' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'nomor_hp' => 'required|string|max:15',
            'email' => 'nullable|email',
            'informasi_pekerjaan' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'nomor_identitas' => 'required|string|max:20',
            'id_perawat' => 'required|exists:users,id_user', // Validasi memastikan id_perawat valid dan ada di tabel users
        ]);

        // Menyimpan data pasien ke database
        Pasien::create([
            'nama_panjang' => $request->nama_panjang,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nomor_hp' => $request->nomor_hp,
            'email' => $request->email,
            'pekerjaan' => $request->informasi_pekerjaan,
            'alamat' => $request->alamat,
            'nomor_identitas' => $request->nomor_identitas,
            'id_perawat' => Auth::user()->id_user, // Ambil id_perawat dari Auth
        ]);

        // Redirect atau tampilkan pesan sukses
        return redirect()->back()->with('success', 'Data pasien berhasil disimpan!');
    }

}
