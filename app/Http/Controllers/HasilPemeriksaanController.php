<?php

namespace App\Http\Controllers;

use App\Models\PrediksiHasilPemeriksaan;
use App\Models\StatusPemeriksaan;
use Illuminate\Http\Request;
use App\Models\HasilPemeriksaan;
use App\Models\Pasien;

use Barryvdh\DomPDF\Facade\Pdf as PDF;



class HasilPemeriksaanController extends Controller
{
    /**
     * Handle adding new medical records.
     */
    public function RekamMedis($id)
    {
        // Cari data pasien berdasarkan ID
        $pasien = Pasien::findOrFail($id);
        $nextId = HasilPemeriksaan::max('id') + 1;

        // Arahkan ke view form_hasil_pemeriksaan dengan data pasien
        return view('form_hasil_pemeriksaan', compact('pasien', 'nextId'));
    }

    public function storeRekamMedis(Request $request)
    {
        // Validasi input form
        $validatedData = $request->validate([
            'id_pasien' => 'required|exists:pasien,id_pasien',
            'gender' => 'required|numeric',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'Sistolik' => 'required|numeric',
            'Diastolik' => 'required|numeric',
            'Age' => 'required|numeric',
            'BMI' => 'required|numeric',
            'BMICat' => 'required|numeric',
            'Hipertensi_Kategori' => 'required|numeric',
            'tuberkulosis' => 'required|boolean',
            'penyakit_jantung' => 'required|boolean',
            'hipertensi' => 'required|boolean',
            'diabetes_melitus' => 'required|boolean',
            'gangguan_jiwa' => 'required|boolean',
            'trauma_pada_kepala' => 'required|boolean',
            'hepatitis' => 'required|boolean',
            'Spirometri' => 'required|boolean',
            'Treadmil' => 'required|boolean',
            'Audiometri' => 'required|boolean',
            'foto_thorax' => 'required|boolean',
            'Nadi(kali/menit)' => 'required|numeric',
            'FrekuensiNapas(kali/menit)' => 'required|numeric',
            'Tingkatan_Kesadaran' => 'required|numeric',
            'Buta_Warna' => 'required|boolean',
            'Jantung' => 'required|boolean',
            'hemoglobin' => 'required|numeric',
            'leukosit' => 'required|numeric',
            'eritrosit' => 'required|numeric',
            'LED' => 'required|numeric',
            'eosinofil' => 'required|numeric',
            'basofil' => 'required|numeric',
            'neutrofil' => 'required|numeric',
            'lymphosit' => 'required|numeric',
            'monosit' => 'required|numeric',
            'trombosit' => 'required|numeric',
            'hematokrit' => 'required|numeric',
            'MCV' => 'required|numeric',
            'SGOT' => 'required|numeric',
            'SGPT' => 'required|numeric',
            'BUN' => 'required|numeric',
            'kreatinin' => 'required|numeric',
            'asam_urat' => 'required|numeric',
            'kolestrol_total' => 'required|numeric',
            'trigliserida' => 'required|numeric',
            'kolestrol_HDL_(direct)' => 'required|numeric',
            'kolestrol_LDL_(direct)' => 'required|numeric',
            'gula_darah_puasa' => 'required|numeric',
            'gula_darah_2_jam_pp' => 'required|numeric',
            'anti_HBs' => 'required|boolean',
            'HBs_Ag_Kuantitatif' => 'required|boolean',
            'pH_pada_urine' => 'required|numeric',
            'berat_jenis_pada_urine' => 'required|numeric',
            'nitrite_pada_urine' => 'required|boolean',
            'protein_pada_urine' => 'required|boolean',
            'reduksi_pada_urine' => 'required|numeric',
            'ketone_pada_urine' => 'required|boolean',
            'urobilinogen_pada_urine' => 'required|boolean',
            'billirubin_pada_urine' => 'required|boolean',
            'eritrosit_pada_urine' => 'required|numeric',
            'lekosit_pada_urine' => 'required|numeric',
            'silinder_pada_urine' => 'required|boolean',
            'kristal_pada_urine' => 'required|boolean',
            'yeast_pada_urine' => 'required|boolean',
            'bakteri_pada_urine' => 'required|boolean',
        ]);

        // Menyimpan data ke tabel hasil_pemeriksaan
        $hasilPemeriksaan = HasilPemeriksaan::create($validatedData);

        // Membuat data di tabel status_pemeriksaan secara otomatis
        StatusPemeriksaan::create([
            'id_hasil_pemeriksaan' => $hasilPemeriksaan->id,
            'status' => 'Menunggu Persetujuan',
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Rekam medis dan status pemeriksaan berhasil ditambahkan.');
    }

    public function editRekamMedis($id)
    {
        // Cari data rekam medis berdasarkan id_rekammedis
        $hasilPemeriksaan = HasilPemeriksaan::findOrFail($id);

        // Tampilkan view form edit dengan data rekam medis
        return view('edit_hasil_pemeriksaan', compact('hasilPemeriksaan'));
    }

    public function updateRekamMedis(Request $request, $id)
    {
        // Validasi input form
        $validatedData = $request->validate([
            'gender' => 'required|integer|in:1,2',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'Sistolik' => 'required|integer',
            'Diastolik' => 'required|integer',
            'Age' => 'required|integer',
            'BMI' => 'required|numeric',
            'BMICat' => 'required|integer',
            'Hipertensi_Kategori' => 'required|integer',
            'tuberkulosis' => 'required|integer',
            'penyakit_jantung' => 'required|integer',
            'hipertensi' => 'required|integer',
            'diabetes_melitus' => 'required|integer',
            'gangguan_jiwa' => 'required|integer',
            'trauma_pada_kepala' => 'required|integer',
            'hepatitis' => 'required|integer',
            'Spirometri' => 'required|integer',
            'Treadmil' => 'required|integer',
            'Audiometri' => 'required|integer',
            'foto_thorax' => 'required|integer',
            'Nadi(kali/menit)' => 'required|integer',
            'FrekuensiNapas(kali/menit)' => 'required|integer',
            'Tingkatan_Kesadaran' => 'required|integer',
            'Buta_Warna' => 'required|integer',
            'Jantung' => 'required|integer',
            'hemoglobin' => 'required|numeric',
            'leukosit' => 'required|numeric',
            'eritrosit' => 'required|numeric',
            'LED' => 'required|numeric',
            'eosinofil' => 'required|numeric',
            'basofil' => 'required|numeric',
            'neutrofil' => 'required|numeric',
            'lymphosit' => 'required|numeric',
            'monosit' => 'required|numeric',
            'trombosit' => 'required|numeric',
            'hematokrit' => 'required|numeric',
            'MCV' => 'required|numeric',
            'SGOT' => 'required|numeric',
            'SGPT' => 'required|numeric',
            'BUN' => 'required|numeric',
            'kreatinin' => 'required|numeric',
            'asam_urat' => 'required|numeric',
            'kolestrol_total' => 'required|numeric',
            'trigliserida' => 'required|numeric',
            'kolestrol_HDL_(direct)' => 'required|numeric',
            'kolestrol_LDL_(direct)' => 'required|numeric',
            'gula_darah_puasa' => 'required|numeric',
            'gula_darah_2_jam_pp' => 'required|numeric',
            'anti_HBs' => 'required|integer',
            'HBs_Ag_Kuantitatif' => 'required|integer',
            'pH_pada_urine' => 'required|numeric',
            'berat_jenis_pada_urine' => 'required|numeric',
            'nitrite_pada_urine' => 'required|integer',
            'protein_pada_urine' => 'required|integer',
            'reduksi_pada_urine' => 'required|integer',
            'ketone_pada_urine' => 'required|integer',
            'urobilinogen_pada_urine' => 'required|integer',
            'billirubin_pada_urine' => 'required|integer',
            'eritrosit_pada_urine' => 'required|numeric',
            'lekosit_pada_urine' => 'required|numeric',
            'silinder_pada_urine' => 'required|integer',
            'kristal_pada_urine' => 'required|integer',
            'yeast_pada_urine' => 'required|integer',
            'bakteri_pada_urine' => 'required|integer',
        ]);

        // Cari data rekam medis berdasarkan ID
        $hasilPemeriksaan = HasilPemeriksaan::findOrFail($id);

        // Update data rekam medis
        $hasilPemeriksaan->update([
            'gender' => $validatedData['gender'],
            'height' => $validatedData['height'],
            'weight' => $validatedData['weight'],
            'Sistolik' => $validatedData['Sistolik'],
            'Diastolik' => $validatedData['Diastolik'],
            'Age' => $validatedData['Age'],
            'BMI' => $validatedData['BMI'],
            'BMICat' => $validatedData['BMICat'],
            'Hipertensi_Kategori' => $validatedData['Hipertensi_Kategori'],
            'tuberkulosis' => $validatedData['tuberkulosis'],
            'penyakit_jantung' => $validatedData['penyakit_jantung'],
            'hipertensi' => $validatedData['hipertensi'],
            'diabetes_melitus' => $validatedData['diabetes_melitus'],
            'gangguan_jiwa' => $validatedData['gangguan_jiwa'],
            'trauma_pada_kepala' => $validatedData['trauma_pada_kepala'],
            'hepatitis' => $validatedData['hepatitis'],
            'Spirometri' => $validatedData['Spirometri'],
            'Treadmil' => $validatedData['Treadmil'],
            'Audiometri' => $validatedData['Audiometri'],
            'foto_thorax' => $validatedData['foto_thorax'],
            'Nadi(kali/menit)' => $validatedData['Nadi(kali/menit)'],
            'FrekuensiNapas(kali/menit)' => $validatedData['FrekuensiNapas(kali/menit)'],
            'Tingkatan_Kesadaran' => $validatedData['Tingkatan_Kesadaran'],
            'Buta_Warna' => $validatedData['Buta_Warna'],
            'Jantung' => $validatedData['Jantung'],
            'hemoglobin' => $validatedData['hemoglobin'],
            'leukosit' => $validatedData['leukosit'],
            'eritrosit' => $validatedData['eritrosit'],
            'LED' => $validatedData['LED'],
            'eosinofil' => $validatedData['eosinofil'],
            'basofil' => $validatedData['basofil'],
            'neutrofil' => $validatedData['neutrofil'],
            'lymphosit' => $validatedData['lymphosit'],
            'monosit' => $validatedData['monosit'],
            'trombosit' => $validatedData['trombosit'],
            'hematokrit' => $validatedData['hematokrit'],
            'MCV' => $validatedData['MCV'],
            'SGOT' => $validatedData['SGOT'],
            'SGPT' => $validatedData['SGPT'],
            'BUN' => $validatedData['BUN'],
            'kreatinin' => $validatedData['kreatinin'],
            'asam_urat' => $validatedData['asam_urat'],
            'kolestrol_total' => $validatedData['kolestrol_total'],
            'trigliserida' => $validatedData['trigliserida'],
            'kolestrol_HDL_(direct)' => $validatedData['kolestrol_HDL_(direct)'],
            'kolestrol_LDL_(direct)' => $validatedData['kolestrol_LDL_(direct)'],
            'gula_darah_puasa' => $validatedData['gula_darah_puasa'],
            'gula_darah_2_jam_pp' => $validatedData['gula_darah_2_jam_pp'],
            'anti_HBs' => $validatedData['anti_HBs'],
            'HBs_Ag_Kuantitatif' => $validatedData['HBs_Ag_Kuantitatif'],
            'pH_pada_urine' => $validatedData['pH_pada_urine'],
            'bakteri_pada_urine' => $validatedData['bakteri_pada_urine'],
            'nitrite_pada_urine' => $validatedData['nitrite_pada_urine'],
            'protein_pada_urine' => $validatedData['protein_pada_urine'],
            'reduksi_pada_urine' => $validatedData['reduksi_pada_urine'],
            'ketone_pada_urine' => $validatedData['ketone_pada_urine'],
            'urobilinogen_pada_urine' => $validatedData['urobilinogen_pada_urine'],
            'billirubin_pada_urine' => $validatedData['billirubin_pada_urine'],
            'eritrosit_pada_urine' => $validatedData['eritrosit_pada_urine'],
            'lekosit_pada_urine' => $validatedData['lekosit_pada_urine'],
            'silinder_pada_urine' => $validatedData['silinder_pada_urine'],
            'kristal_pada_urine' => $validatedData['kristal_pada_urine'],
            'yeast_pada_urine' => $validatedData['yeast_pada_urine'],
            'berat_jenis_pada_urine' => $validatedData['berat_jenis_pada_urine'],
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Rekam medis berhasil diperbarui.');
    }

    // app/Http/Controllers/HasilPemeriksaanController.php
    public function detailRekamMedis($id)
    {
        // Ambil data hasil pemeriksaan beserta relasi prediksinya
        $hasil = HasilPemeriksaan::with('prediksi')->find($id);

        if ($hasil) {
            return response()->json([
                'success'           => true,
                'data'              => $hasil,
                // Ambil hasil pemeriksaan dari relasi prediksi
                'hasil_pemeriksaan' => $hasil->prediksi ? $hasil->prediksi->hasil_pemeriksaan : '-'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
    }

    public function exportPdf($id)
    {
        $hasil = HasilPemeriksaan::with('prediksi', 'patient', 'statusPemeriksaan', 'rekomMedis')->find($id);
        if (!$hasil) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
        // Misal, jika Anda ingin mengoper koleksi hasil pemeriksaan (contoh: berdasarkan pasien atau kriteria lain)
        $hasilPemeriksaan = HasilPemeriksaan::with('prediksi', 'patient', 'statusPemeriksaan', 'rekomMedis')
                                ->where('id_pasien', $hasil->id_pasien)
                                ->get();

        $pasien = $hasil->patient;
        $pdf = PDF::loadView('pdf.hasil_pemeriksaan', compact('hasil', 'pasien', 'hasilPemeriksaan'));
        return $pdf->download('Hasil Rekam Medis Dari - ' . $pasien->nama_panjang .' - '. $pasien->id_pasien . '.pdf');
    }

    public function destroy($id)
    {
        // Cari data berdasarkan ID. Jika tidak ditemukan, akan mengembalikan error 404.
        $hasil = HasilPemeriksaan::findOrFail($id);

        // Hapus data
        $hasil->delete();

        // Redirect kembali ke halaman index atau daftar dengan pesan sukses.
        return redirect('/hasil-pemeriksaan')->with('success', 'Hasil pemeriksaan berhasil dihapus.');
    }
}
