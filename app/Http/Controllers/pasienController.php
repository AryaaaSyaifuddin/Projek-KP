<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\IsTrue;

class PasienController extends Controller
{
    // Menampilkan halaman dengan form create atau tabel
    public function dashboardPasien()
    {
        // Periksa apakah ingin menampilkan form create, edit, atau tabel
        $showForm = session('showForm', true); // Default true (form create)
        $pasien = session('pasien', null); // Data pasien untuk edit
        $dataPasien = Pasien::all(); // Ambil data pasien dari database

        // Pass data ke view
        return view('pasien_dashboard', compact('showForm', 'dataPasien', 'pasien'));
    }

    // Menampilkan form create pasien
    public function showCreateForm()
    {
        // Set session untuk menampilkan form create
        session(['showForm' => false, 'pasien' => null]);
        return redirect('/pasien'); // Redirect ke halaman pasien
    }

    // Menampilkan form edit pasien
    public function edit($id)
{
    // Ambil data pasien berdasarkan ID
    $pasien = Pasien::findOrFail($id);

    // Kirim data pasien ke view edit_pasien
    return view('edit_pasien', compact('pasien'));
}


    // Menyimpan data pasien baru
    public function store(Request $request)
    {
        // Validasi inputan
        $validated = $request->validate([
            'nama_panjang' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'nomor_hp' => 'required|digits:12',
            'email' => 'nullable|email',
            'pekerjaan' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'nomor_identitas' => 'required|string|max:255',
            'tanggal_pemeriksaan' => 'required|date',
            'waktu_pemeriksaan' => 'required|date_format:H:i',
        ]);

        // Menyimpan data pasien
        $pasien = new Pasien();
        $pasien->nama_panjang = $validated['nama_panjang'];
        $pasien->tanggal_lahir = $validated['tanggal_lahir'];
        $pasien->jenis_kelamin = $validated['jenis_kelamin'];
        $pasien->nomor_hp = $validated['nomor_hp'];
        $pasien->email = $validated['email'] ?? null;
        $pasien->pekerjaan = $validated['pekerjaan'] ?? null;
        $pasien->alamat = $validated['alamat'] ?? null;
        $pasien->nomor_identitas = $validated['nomor_identitas'];
        $pasien->id_perawat = Auth::user()->id_user;
        $pasien->tanggal_pemeriksaan = $validated['tanggal_pemeriksaan'];
        $pasien->waktu_pemeriksaan = $validated['waktu_pemeriksaan'];

        // Menyimpan data ke database
        $pasien->save();

        // Redirect atau memberi pesan sukses
        return redirect()->back()->with('success', 'Data pasien berhasil ditambahkan.');
    }

    // Menyimpan perubahan data pasien
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $request->validate([
            'nama_panjang' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'nomor_hp' => 'required|string|max:15',
            'email' => 'nullable|email',
            'pekerjaan' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'nomor_identitas' => 'nullable|string|max:50',
        ]);

        // Cari data pasien yang akan diupdate
        $pasien = Pasien::findOrFail($id);

        // Update data pasien
        $pasien->update([
            'nama_panjang' => $request->nama_panjang,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nomor_hp' => $request->nomor_hp,
            'email' => $request->email,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'nomor_identitas' => $request->nomor_identitas,
        ]);

        // Redirect ke halaman pasien setelah update
        return redirect()->back()->with('success', 'Data pasien berhasil diperbarui.');
    }


    // Menangani pembatalan dan kembali ke tabel
    public function cancelForm()
    {
        // Reset session untuk kembali ke tampilan tabel
        session(['showForm' => true, 'pasien' => null]);

        return redirect('/pasien'); // Redirect ke halaman pasien
    }


    public function destroy($id_pasien)
    {
        $pasien = Pasien::findOrFail($id_pasien);
        $pasien->delete();

        // Redirect atau response setelah penghapusan
        return redirect()->back()->with('success', 'Pasien berhasil dihapus!');
    }



}
