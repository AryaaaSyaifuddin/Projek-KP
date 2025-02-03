<?php

namespace App\Http\Controllers;

use App\Models\HasilPemeriksaan;
use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\PrediksiHasilPemeriksaan;
use App\Models\Users;

class ViewController extends Controller
{
    public function showlogin(){
        return view("login_form");
    }

    public function showRegister(){
        return view("register_form");
    }

    public function dashboard(){
        return view("dashboard");
    }

    public function dashboardJadwal()
    {
        $dataPasien = Pasien::join('users', 'pasien.id_perawat', '=', 'users.id_user')
            ->select('pasien.*', 'users.nama as nama_perawat')
            ->get();

        // Pass data ke view
        return view('jadwal_dashboard', compact('dataPasien'));
    }

    public function dashboardAkun(){
        $dataPasien = Pasien::all(); // Ambil data pasien dari database

        // Pass data ke view
        return view('akun_dashboard', compact('dataPasien'));
    }

    public function dashboardHasilPemeriksaan(){
        $hasilPemeriksaan = HasilPemeriksaan::all();
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



}
