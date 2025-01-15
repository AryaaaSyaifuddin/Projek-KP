<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pasienController extends Controller
{
    public function dashboardPasien()
{
    // Periksa apakah ingin menampilkan form atau tabel
    $showForm = session('showForm', false);

    return view('pasien_dashboard', compact('showForm'));
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
    public function cretaePasien(){
        return view("pasien_create");
    }
}
