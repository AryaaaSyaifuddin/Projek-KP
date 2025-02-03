<?php

namespace App\Http\Controllers;

use App\Models\HasilPemeriksaan;
use App\Models\PrediksiHasilPemeriksaan;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class PrediksiHasilPemeriksaanController extends Controller
{
    public function storePrediksi(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_rekammedis' => 'required|exists:hasil_pemeriksaan,id',
            'hasil_pemeriksaan' => 'required|string',
        ]);

        // Simpan data ke database
        $hasilPemeriksaan = PrediksiHasilPemeriksaan::create([
            'id_rekammedis' => $request->id_rekammedis,
            'hasil_pemeriksaan' => $request->hasil_pemeriksaan,
        ]);

        // Set session success message
        if ($hasilPemeriksaan) {
            Session::flash('success', 'Hasil pemeriksaan berhasil disimpan.');
        } else {
            Session::flash('error', 'Gagal menyimpan hasil pemeriksaan.');
        }

        // Redirect kembali ke halaman sebelumnya
        return redirect()->back();
    }

    public function editPrediksi($id)
    {
        // Cari data prediksi hasil pemeriksaan berdasarkan id
        $prediksiHasilPemeriksaan = PrediksiHasilPemeriksaan::findOrFail($id);

        // Ambil data hasil pemeriksaan terkait (jika diperlukan)
        $hasilPemeriksaan = HasilPemeriksaan::find($prediksiHasilPemeriksaan->id_rekammedis);

        // Tampilkan view form edit dengan data prediksi dan hasil pemeriksaan
        return view('edit_prediksi_hasil_pemeriksaan', compact('prediksiHasilPemeriksaan', 'hasilPemeriksaan'));
    }

    public function updatePrediksi(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'hasil_pemeriksaan' => 'required|string',
        ]);

        // Cari data yang akan diupdate
        $PrediksihasilPemeriksaan = PrediksiHasilPemeriksaan::find($id);


        // Jika data tidak ditemukan, kembalikan error
        if (!$PrediksihasilPemeriksaan) {
            Session::flash('error', 'Data hasil pemeriksaan tidak ditemukan.');
            return redirect()->back();
        }

        // Update data
        $PrediksihasilPemeriksaan->update([
            'hasil_pemeriksaan' => $request->hasil_pemeriksaan,
        ]);

        // Set session success message
        if ($PrediksihasilPemeriksaan) {
            Session::flash('success', 'Hasil pemeriksaan berhasil diperbarui.');
        } else {
            Session::flash('error', 'Gagal memperbarui hasil pemeriksaan.');
        }

        // Redirect kembali ke halaman sebelumnya
        return redirect()->back();
    }

    public function deletePrediksi($id)
    {
        // Cari data prediksi hasil pemeriksaan berdasarkan id
        $prediksiHasilPemeriksaan = PrediksiHasilPemeriksaan::find($id);

        // Jika data tidak ditemukan, kembalikan error
        if (!$prediksiHasilPemeriksaan) {
            Session::flash('error', 'Data hasil pemeriksaan tidak ditemukan.');
            return redirect()->back();
        }

        // Hapus data
        $prediksiHasilPemeriksaan->delete();

        // Set session success message
        Session::flash('success', 'Hasil pemeriksaan berhasil dihapus.');

        // Redirect kembali ke halaman sebelumnya
        return redirect()->back();
    }

}
