<?php

namespace App\Http\Controllers;

use App\Models\StatusPemeriksaan;
use App\Models\HasilPemeriksaan;
use Illuminate\Http\Request;

class StatusPemeriksaanController extends Controller
{
    // Menampilkan form untuk menambah atau mengedit status
    public function createOrEdit($id_hasil_pemeriksaan)
    {
        $hasilPemeriksaan = HasilPemeriksaan::findOrFail($id_hasil_pemeriksaan);
        $statusPemeriksaan = StatusPemeriksaan::where('id_hasil_pemeriksaan', $id_hasil_pemeriksaan)->first();

        return view('status_pemeriksaan.form', compact('hasilPemeriksaan', 'statusPemeriksaan'));
    }

    // Menyimpan atau memperbarui status
    public function storeOrUpdate(Request $request, $id_hasil_pemeriksaan)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        StatusPemeriksaan::updateOrCreate(
            ['id_hasil_pemeriksaan' => $id_hasil_pemeriksaan],
            ['status' => $request->status]
        );

        return redirect()->route('hasil.pemeriksaan.index')->with('success', 'Status berhasil diperbarui.');
    }

    // Menghapus status
    public function destroy($id)
    {
        $statusPemeriksaan = StatusPemeriksaan::findOrFail($id);
        $statusPemeriksaan->delete();

        return redirect()->back()->with('success', 'Status berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {
        // Cari data berdasarkan ID
        $statusPemeriksaan = StatusPemeriksaan::findOrFail($id);

        // Update status
        $statusPemeriksaan->update([
            'status' => 'Disetujui'
        ]);

        return redirect()->back()->with('success', 'Status berhasil diupdate!');
    }

    public function revert($id)
    {
        // Cari data berdasarkan ID
        $statusPemeriksaan = StatusPemeriksaan::findOrFail($id);

        // Update status ke "Menunggu Persetujuan"
        $statusPemeriksaan->update([
            'status' => 'Menunggu Persetujuan'
        ]);

        return redirect()->back()->with('success', 'Status berhasil dikembalikan!');
    }
}
