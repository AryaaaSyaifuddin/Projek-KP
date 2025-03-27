<?php

namespace App\Http\Controllers;

use App\Models\HasilPemeriksaan;
use App\Models\StatusPemeriksaan;
use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\PrediksiHasilPemeriksaan;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ViewController extends Controller
{
    public function showlogin(){
        return view("login_form");
    }

    public function showRegister(){
        return view("register_form");
    }

    public function dashboard()
    {
        // Data pasien harian (misalnya 30 hari terakhir)
        $dailyPatients = Pasien::select(
            DB::raw("tanggal_pemeriksaan as date"),
                DB::raw('count(*) as count')
            )
            ->whereMonth('tanggal_pemeriksaan', Carbon::now()->month)
            ->whereYear('tanggal_pemeriksaan', Carbon::now()->year)
            ->groupBy('tanggal_pemeriksaan')
            ->orderBy('tanggal_pemeriksaan', 'asc')
            ->get();

        // Data pasien bulanan (misalnya 12 bulan terakhir)
        // Karena kolom tanggal_pemeriksaan bertipe date, kita gunakan TO_CHAR untuk PostgreSQL
        $monthlyPatients = Pasien::select(
                DB::raw("TO_CHAR(tanggal_pemeriksaan, 'YYYY-MM') as month"),
                DB::raw('count(*) as count')
            )
            ->whereDate('tanggal_pemeriksaan', '>=', Carbon::today()->subMonths(12))
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        // Data pasien tahunan (misalnya 5 tahun terakhir)
        // Anda bisa menggunakan EXTRACT atau TO_CHAR, contohnya menggunakan EXTRACT:
        $yearlyPatients = Pasien::select(
                DB::raw("EXTRACT(YEAR FROM tanggal_pemeriksaan) as year"),
                DB::raw('count(*) as count')
            )
            ->whereDate('tanggal_pemeriksaan', '>=', Carbon::today()->subYears(5))
            ->groupBy('year')
            ->orderBy('year', 'asc')
            ->get();

        // Data check-up hari ini (misalnya berdasarkan jam pemeriksaan)
        $todayCheckups = Pasien::select(
                DB::raw('EXTRACT(HOUR FROM waktu_pemeriksaan) as hour'),
                DB::raw('count(*) as count')
            )
            ->whereDate('tanggal_pemeriksaan', Carbon::today())
            ->groupBy('hour')
            ->orderBy('hour', 'asc')
            ->get();

        return view('dashboard', compact('dailyPatients', 'monthlyPatients', 'yearlyPatients', 'todayCheckups'));
    }

    public function dashboardJadwal()
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
        return view('jadwal_dashboard', compact('showForm', 'dataPasien', 'pasien', 'dokterList'));
    }


    public function dashboardAkun(){
        $dataPasien = Pasien::all(); // Ambil data pasien dari database

        // Pass data ke view
        return view('akun_dashboard', compact('dataPasien'));
    }

    public function dashboardHasilPemeriksaan(){
        $hasilPemeriksaan = HasilPemeriksaan::with(['statusPemeriksaan'])->get();
        $hasilPrediksi = PrediksiHasilPemeriksaan::all();

        // Pass data ke view
        return view('hasil-pemeriksaan_dashboard', compact('hasilPemeriksaan', 'hasilPrediksi'));
    }

    public function error(){
        return view('error');
    }

    public function dashboardDokter()
    {
        // Ambil hanya data user yang memiliki role "dokter"
        $dataUsers = Users::where('role', 'dokter')->get();

        // Pass data ke view
        return view('dokter_dashboard', compact('dataUsers'));
    }

    public function dashboardPerawat()
    {
        // Ambil hanya data user yang memiliki role "dokter"
        $dataUsers = Users::where('role', 'perawat')->get();

        // Pass data ke view
        return view('dokter_dashboard', compact('dataUsers'));
    }


    public function prediksiHasilPemeriksaan($id)
    {
        $hasilPemeriksaan = HasilPemeriksaan::findOrFail($id);


        // Kirim data pasien ke view edit_pasien
        return view('prediksi_hasil_pemeriksaan', compact('hasilPemeriksaan'));
    }

    public function accHasilPrediksi()
    {
        // Ambil data dari HasilPemeriksaan dengan relasi ke StatusPemeriksaan dan PrediksiHasilPemeriksaan
        $hasilPemeriksaan = HasilPemeriksaan::with(['statusPemeriksaan', 'prediksi', 'patient'])->get();

        return view('persetujuan_hasil_pemeriksaan', compact('hasilPemeriksaan'));
    }

    public function rekomendasiMedisHasilPrediksi()
    {
        // Ambil data dari HasilPemeriksaan dengan relasi ke StatusPemeriksaan dan PrediksiHasilPemeriksaan
        $hasilPemeriksaan = HasilPemeriksaan::with(['statusPemeriksaan', 'prediksi', 'patient', 'rekomMedis'])->get();

        return view('rekomendasi_medis', compact('hasilPemeriksaan'));
    }


}
