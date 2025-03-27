<?php

namespace App\Http\Controllers;

use App\Models\HasilPemeriksaan;
use App\Models\RekomendasiMedis;
use Illuminate\Http\Request;

class EditRekamMedisController extends Controller
{
    public function edit($id)
    {
        // Ambil data rekomendasi medis berdasarkan ID
        $rekomendasi = RekomendasiMedis::findOrFail($id);

        $hasilPemeriksaan = HasilPemeriksaan::find($rekomendasi->id);

        // Tampilkan view edit dengan data rekomendasi
        return view('edit_hasil_pemeriksaan', compact('rekomendasi', 'hasilPemeriksaan'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'diagnosa' => 'required|string|max:255',
            'rekomendasi' => 'required|string',
        ]);

        // Ambil data rekomendasi medis berdasarkan ID
        $rekomendasi = RekomendasiMedis::findOrFail($id);

        // Update data
        $rekomendasi->update([
            'diagnosa' => $request->diagnosa,
            'rekomendasi' => $request->rekomendasi,
        ]);

        // Redirect ke halaman view dengan pesan sukses
        return redirect()->back()->with('success', 'Rekomendasi medis berhasil diperbarui.');
    }

}
