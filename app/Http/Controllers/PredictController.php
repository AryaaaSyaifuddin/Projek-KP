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
                'BMICat', 'Hipertensi_Kategori', 'tuberkulosis', 'penyakit_jantung', 'hipertensi', 'diabetes_melitus',
                'gangguan_jiwa', 'trauma_pada_kepala', 'hepatitis', 'Spirometri', 'Treadmil', 'Audiometri',
                'foto_thorax', 'Nadi(kali/menit)', 'FrekuensiNapas(kali/menit)', 'Tingkatan_Kesadaran',
                'Buta_Warna', 'Jantung', 'hemoglobin', 'leukosit', 'eritrosit', 'LED', 'eosinofil', 'basofil',
                'neutrofil', 'lymphosit', 'monosit', 'trombosit', 'hematokrit', 'MCV', 'SGOT', 'SGPT',
                'BUN', 'kreatinin', 'asam_urat', 'kolestrol_total', 'trigliserida', 'kolestrol_HDL_(direct)',
                'kolestrol_LDL_(direct)', 'gula_darah_puasa', 'gula_darah_2_jam_pp', 'anti_HBs', 'HBs_Ag_Kuantitatif', 'pH_pada_urine', 'berat_jenis_pada_urine', 'nitrite_pada_urine',
                'protein_pada_urine', 'reduksi_pada_urine', 'ketone_pada_urine', 'urobilinogen_pada_urine',
                'billirubin_pada_urine', 'eritrosit_pada_urine', 'lekosit_pada_urine', 'silinder_pada_urine', 'kristal_pada_urine', 'yeast_pada_urine',
                'bakteri_pada_urine'
            ];

            foreach ($feature_order as $key) {
                if (!isset($inputs[$key]) || $inputs[$key] === '') {
                    return redirect()->back()->with('error', "Field {$key} is required.");
                }
            }

            // Konversi input menjadi array nilai sesuai urutan
            $data = [
                'inputs' => array_map(
                    fn($key) => $this->convertToBinary($key, $inputs[$key] ?? 0, $inputs['gender']), // Gunakan 0 jika key tidak ada
                    $feature_order
                )
            ];

            // Debug: Tampilkan data yang akan dikirim ke API
            // dd($data);

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

    private function convertToBinary($key, $value, $gender)
    {
        switch ($key) {
            // Parameter dengan 0 = normal, 1 = tidak normal
            case 'hemoglobin':
                return ($gender == '2' && $value >= 8 && $value <= 16.5) || ($gender == '1' && $value >= 10 && $value <= 18) ? 0 : 1;

            case 'leukosit':
                return ($value >= 4000 && $value <= 11000) ? 0 : 1;

            case 'eritrosit':
                return ($gender == '2' && $value >= 4 && $value <= 5) || ($gender == '1' && $value >= 4.5 && $value <= 5.5) ? 0 : 1;

            case 'LED':
                return ($gender == '2' && $value >= 0 && $value <= 20) || ($gender == '1' && $value >= 0 && $value <= 15) ? 0 : 1;

            case 'eosinofil':
                return ($value >= 0 && $value <= 1) ? 0 : 1;

            case 'basofil':
                return ($value >= 0 && $value <= 1) ? 0 : 1;

            case 'neutrofil':
                return ($value >= 50 && $value <= 70) ? 0 : 1;

            case 'lymphosit':
                return ($value >= 25 && $value <= 33) ? 0 : 1;

            case 'monosit':
                return ($value >= 3 && $value <= 8) ? 0 : 1;

            case 'trombosit':
                return ($value >= 150000 && $value <= 400000) ? 0 : 1;

            case 'hematokrit':
                return ($gender == '2' && $value >= 37 && $value <= 45) || ($gender == '1' && $value >= 40 && $value <= 50) ? 0 : 1;

            case 'MCV':
                return ($value >= 82 && $value <= 92) ? 0 : 1;

            case 'SGOT':
                return ($gender == '2' && $value < 31) || ($gender == '1' && $value < 37) ? 0 : 1;

            case 'SGPT':
                return ($gender == '2' && $value < 32) || ($gender == '1' && $value < 42) ? 0 : 1;

            case 'BUN':
                return ($value >= 5 && $value <= 23.5) ? 0 : 1;

            case 'kreatinin':
                return ($gender == '2' && $value >= 0.7 && $value <= 1.1) || ($gender == '1' && $value >= 0.8 && $value <= 1.4) ? 0 : 1;

            case 'asam_urat':
                return ($gender == '2' && $value >= 2.6 && $value <= 6) || ($gender == '1' && $value >= 3.5 && $value <= 7.2) ? 0 : 1;

            case 'kolestrol_total':
                return ($value < 200) ? 0 : 1;

            case 'trigliserida':
                return ($value < 200) ? 0 : 1;

            case 'kolestrol_HDL_(direct)':
                return ($value > 35) ? 0 : 1;

            case 'kolestrol_LDL_(direct)':
                return ($value < 115) ? 0 : 1;

            case 'pH_pada_urine':
                return ($value >= 5 && $value <= 8) ? 0 : 1;

            case 'berat_jenis_pada_urine':
                return ($value >= 1.005 && $value <= 1.030) ? 0 : 1;

            case 'eritrosit_pada_urine':
                return ($value >= 0 && $value <= 2) ? 0 : 1;

            case 'lekosit_pada_urine':
                return ($value >= 0 && $value <= 5) ? 0 : 1;

            case 'Nadi(kali/menit)':
                return ($value >= 60 && $value <= 100) ? 0 : 1;

            case 'FrekuensiNapas(kali/menit)':
                return ($value >= 12 && $value <= 20) ? 0 : 1;

            // Parameter dengan 3 kategori (0, 1, 2)
            case 'gula_darah_puasa':
                if ($value > 200) return 0;       // Diatas 200
                elseif ($value < 126) return 1;   // Normal
                else return 2;                    // Tidak normal (126-200)

            case 'gula_darah_2_jam_pp':
                if ($value > 200) return 0;       // Diatas 200
                elseif ($value < 140) return 1;   // Normal
                else return 2;                    // Tidak normal (140-200)

            default:
                // Konversi ke integer untuk field kategori
                if (in_array($key, [
                    'BMICat', 'Hipertensi_Kategori', 'tuberkulosis', 'penyakit_jantung',
                    'hipertensi', 'diabetes_melitus', 'gangguan_jiwa', 'trauma_pada_kepala',
                    'hepatitis', 'Spirometri', 'Treadmil', 'Audiometri', 'foto_thorax',
                    'Tingkatan_Kesadaran', 'Buta_Warna', 'Jantung', 'anti_HBs','HBs_Ag_Kuantitatif',
                    'nitrite_pada_urine', 'protein_pada_urine', 'reduksi_pada_urine',
                    'ketone_pada_urine', 'urobilinogen_pada_urine', 'billirubin_pada_urine',
                    'silinder_pada_urine', 'kristal_pada_urine', 'yeast_pada_urine',
                    'bakteri_pada_urine'
                ])) {
                    return intval($value);
                }
                return floatval($value);
        }
    }


}
