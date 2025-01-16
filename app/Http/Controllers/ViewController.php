<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

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

    public function dashboardJadwal(){
        $dataPasien = Pasien::all(); // Ambil data pasien dari database

        // Pass data ke view
        return view('jadwal_dashboard', compact('dataPasien'));
    }

    public function dashboardAkun(){
        $dataPasien = Pasien::all(); // Ambil data pasien dari database

        // Pass data ke view
        return view('akun_dashboard', compact('dataPasien'));
    }
}
