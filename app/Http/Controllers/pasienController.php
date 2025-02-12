<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\IsTrue;
use Illuminate\Validation\Rule;

class PasienController extends Controller
{
    // Menampilkan halaman dengan form create atau tabel
    public function dashboardPasien()
    {
        // Periksa apakah ingin menampilkan form create, edit, atau tabel
        $showForm = session('showForm', true); // Default true (form create)
        $pasien = session('pasien', null); // Data pasien untuk edit
        $dokterList = Users::where('role', 'dokter')->get();

        // Ambil data pasien dengan informasi perawat dan dokter, lalu urutkan:
        // 1. Pasien dengan jadwal pemeriksaan yang belum lewat (upcoming) muncul di atas
        // 2. Pasien yang sudah lewat muncul di bawah, keduanya diurutkan berdasarkan tanggal dan waktu pemeriksaan secara ascending
        $dataPasien = Pasien::join('users as perawat', 'pasien.id_perawat', '=', 'perawat.id_user')
            ->join('users as dokter', 'pasien.id_dokter', '=', 'dokter.id_user')
            ->select('pasien.*', 'perawat.nama as nama_perawat', 'dokter.nama as nama_dokter')
            ->orderByRaw("
                CASE
                    WHEN pasien.tanggal_pemeriksaan = CURRENT_DATE THEN 0  -- Jika hari ini, tetap di atas
                    WHEN (pasien.tanggal_pemeriksaan || ' ' || pasien.waktu_pemeriksaan)::timestamp >= NOW() THEN 1
                    ELSE 2
                END
            ")
            ->orderBy('pasien.tanggal_pemeriksaan', 'asc')
            ->orderBy('pasien.waktu_pemeriksaan', 'asc')
            ->get();

        // Pass data ke view
        return view('pasien_dashboard', compact('showForm', 'dataPasien', 'pasien', 'dokterList'));
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

        $dokterList = Users::where('role', 'dokter')->get();
        $pasien = Pasien::findOrFail($id);

        // Kirim data pasien ke view edit_pasien
        return view('edit_pasien', compact('pasien', 'dokterList'));
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
            'nomor_identitas' => 'required|string|max:255|unique:pasien,nomor_identitas',
            'id_dokter' => 'required|exists:users,id_user',
            'tanggal_pemeriksaan' => 'required|date',
            'waktu_pemeriksaan' => 'required|date_format:H:i',
        ]);

        // Gabungkan tanggal dan waktu untuk pemeriksaan
        $tanggalWaktuPemeriksaan = \Carbon\Carbon::parse($validated['tanggal_pemeriksaan'] . ' ' . $validated['waktu_pemeriksaan']);

        // Periksa apakah tanggal dan waktu sudah lewat
        if ($tanggalWaktuPemeriksaan->isPast()) {
            return redirect()->back()->withErrors(['error' => 'Tanggal dan waktu pemeriksaan tidak boleh di masa lalu.']);
        }

        // Cek apakah jadwal (tanggal + waktu) untuk dokter yang sama sudah digunakan
        $jadwalSama = Pasien::where('tanggal_pemeriksaan', $validated['tanggal_pemeriksaan'])
            ->where('waktu_pemeriksaan', $validated['waktu_pemeriksaan'])
            ->where('id_dokter', $validated['id_dokter'])
            ->exists();

        if ($jadwalSama) {
            return redirect()->back()->withErrors(['error' => 'Jadwal pemeriksaan pada tanggal dan waktu tersebut sudah diambil oleh dokter yang sama.']);
        }

        // Simpan data pasien
        $pasien = new Pasien();
        $pasien->fill($validated);
        $pasien->id_perawat = Auth::user()->id_user;
        $pasien->save();

        return redirect()->back()->with('success', 'Data pasien berhasil ditambahkan.');
    }



    public function update(Request $request, $id)
    {
        // Validasi inputan
        $validated = $request->validate([
            'nama_panjang' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'nomor_hp' => 'required|string|max:15',
            'email' => 'nullable|email',
            'pekerjaan' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'nomor_identitas' => 'required|string|max:255|unique:pasien,nomor_identitas,' . $id . ',id_pasien',
            'id_dokter' => 'required|exists:users,id_user',
            'tanggal_pemeriksaan' => 'required|date',
            'waktu_pemeriksaan' => 'required|date_format:H:i',
        ]);

        // Gabungkan tanggal dan waktu untuk pemeriksaan
        $tanggalWaktuPemeriksaan = \Carbon\Carbon::parse($validated['tanggal_pemeriksaan'] . ' ' . $validated['waktu_pemeriksaan']);

        // Periksa apakah tanggal dan waktu sudah lewat
        if ($tanggalWaktuPemeriksaan->isPast()) {
            return redirect()->back()->withErrors(['error' => 'Tanggal dan waktu pemeriksaan tidak boleh di masa lalu.']);
        }

        // Cek apakah jadwal (tanggal + waktu) untuk dokter yang sama sudah digunakan
        $jadwalSama = Pasien::where('tanggal_pemeriksaan', $validated['tanggal_pemeriksaan'])
            ->where('waktu_pemeriksaan', $validated['waktu_pemeriksaan'])
            ->where('id_dokter', $validated['id_dokter'])
            ->where('id_pasien', '!=', $id)
            ->exists();

        if ($jadwalSama) {
            return redirect()->back()->withErrors(['error' => 'Jadwal pemeriksaan pada tanggal dan waktu tersebut sudah diambil oleh dokter yang sama.']);
        }

        // Cari data pasien yang akan diupdate
        $pasien = Pasien::findOrFail($id);

        // Update data pasien
        $pasien->update($validated);

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
