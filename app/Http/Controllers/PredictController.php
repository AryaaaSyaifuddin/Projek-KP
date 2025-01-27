<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class PredictController extends Controller
{

    public function predictHealthStatus(Request $request)
    {
        try {
            // Ambil semua input kecuali _token dan action
            $inputs = $request->except('_token', 'action');

            // Validasi: Pastikan semua input berupa angka
            foreach ($inputs as $key => $value) {
                if (!is_numeric($value)) {
                    return redirect()->back()->with('error', "Invalid value for {$key}: must be a number.");
                }
            }

            // Urutkan input sesuai urutan fitur yang digunakan model
            $feature_order = [
                'id', 'gender', 'height', 'weight', 'Sistolik', 'Diastolik', 'Age', 'BMI', 'BMICat',
                'Hipertensi_Kategori', 'tuberkulosis', 'penyakit_jantung', 'hipertensi', 'diabetes_melitus',
                'gangguan_jiwa', 'trauma_pada_kepala', 'hepatitis', 'Spirometri', 'Treadmil', 'Audiometri',
                'foto_thorax', 'Nadi(kali/menit)', 'FrekuensiNapas(kali/menit)', 'Tingkatan_Kesadaran',
                'Buta_Warna', 'Jantung', 'hemoglobin', 'leukosit', 'eritrosit', 'LED', 'eosinofil', 'basofil',
                'neutrofil', 'lymphosit', 'monosit', 'trombosit', 'hematokrit', 'MCV', 'SGOT', 'SGPT',
                'BUN', 'kreatinin', 'asam_urat', 'kolestrol_total', 'trigliserida', 'kolestrol_HDL_(direct)',
                'kolestrol_LDL_(direct)', 'HBs_Ag_Kuantitatif', 'pH_pada_urine', 'nitrite_pada_urine',
                'protein_pada_urine', 'reduksi_pada_urine', 'ketone_pada_urine', 'urobilinogen_pada_urine',
                'billirubin_pada_urine', 'silinder_pada_urine', 'kristal_pada_urine', 'yeast_pada_urine',
                'bakteri_pada_urine', 'berat_jenis_pada_urine', 'eritrosit_pada_urine', 'lekosit_pada_urine',
                'gula_darah_puasa', 'gula_darah_2_jam_pp'
            ];


            foreach ($feature_order as $key) {
                if (!isset($inputs[$key]) || $inputs[$key] === '') {
                    return redirect()->back()->with('error', "Field {$key} is required.");
                }
            }

            // Konversi input menjadi array nilai sesuai urutan
            $data = [
                'inputs' => array_map(
                    fn($key) => floatval($inputs[$key] ?? 0), // Gunakan 0 jika key tidak ada
                    $feature_order
                )
            ];

            // Kirim data ke Flask API
            $response = Http::post('http://127.0.0.1:5000/predict', $data);

            // Periksa respon Flask API
            if ($response->successful()) {
                $result = $response->json();
                return redirect()->back()->with('success', $result['prediction']);
            } else {
                return redirect()->back()->with('error', 'API Prediction Error: ' . $response->body());
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

}
