<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HasilPemeriksaan;
use App\Models\RekomendasiMedis;

class RekomendasiMedisController extends Controller
{
    /**
     * Menampilkan form rekomendasi medis dengan data pemeriksaan yang sudah ada.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function formRekommendasiMedis($id)
    {
        $hasilPemeriksaan = HasilPemeriksaan::findOrFail($id);
        return view('form_rekomendasi_medis', compact('hasilPemeriksaan'));
    }

    /**
     * Memproses input form rekomendasi medis dan menghasilkan diagnosis serta rekomendasi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeRekomendasiMedis(Request $request, $id)
    {
        try {
            $inputs = $request->all();

            // Validasi sederhana: pastikan field selain _token berupa angka (atau string yang mewakili angka)
            foreach ($inputs as $key => $value) {
                if ($key !== '_token' && !is_numeric($value)) {
                    return redirect()->back()->with('error', "Field {$key} harus berupa angka.");
                }
            }

            // Ambil data hasil pemeriksaan jika diperlukan (misalnya untuk data tambahan)
            $hasilPemeriksaan = HasilPemeriksaan::findOrFail($id);

            // Inisialisasi array untuk diagnosis dan rekomendasi
            $diagnoses = [];
            $recommendations = [];

            // ---------------------------
            // 1. BMICat
            if (isset($inputs['BMICat'])) {
                $bmiCat = intval($inputs['BMICat']);
                if ($bmiCat == 1) {
                    $diagnoses[] = "Obesitas Tingkat I";
                    $recommendations[] = "\nObesitas Tingkat I :\n- Perbaiki pola makan dengan mengurangi asupan kalori.\n- Tingkatkan aktivitas fisik ringan seperti berjalan kaki 30 menit sehari.\n- Konsultasikan dengan ahli gizi untuk rencana diet yang sesuai.";
                } elseif ($bmiCat == 2) {
                    $diagnoses[] = "Obesitas Tingkat II";
                    $recommendations[] = "\nObesitas Tingkat II :\n- Kurangi asupan makanan berlemak dan tinggi gula.\n- Lakukan olahraga teratur seperti berenang atau bersepeda.\n- Segera berkonsultasi dengan ahli gizi atau dokter untuk evaluasi lebih lanjut.";
                } elseif ($bmiCat == 3) {
                    $diagnoses[] = "Kelebihan Berat Badan (Overweight)";
                    $recommendations[] = "\nKelebihan Berat Badan (Overweight) :\n- Mulai program penurunan berat badan dengan diet seimbang.\n- Tingkatkan aktivitas fisik secara bertahap.\n- Pantau berat badan secara berkala.";
                } elseif ($bmiCat == 4) {
                    $diagnoses[] = "Kekurangan Berat Badan (Underweight)";
                    $recommendations[] = "\nKekurangan Berat Badan (Underweight) :\n- Tingkatkan asupan nutrisi dengan makanan tinggi kalori dan protein.\n- Konsultasikan dengan ahli gizi untuk rencana diet yang tepat.\n- Lakukan latihan kekuatan untuk membangun massa otot.";
                }
            }

            // ---------------------------
            // 2. Hipertensi_Kategori
            if (isset($inputs['Hipertensi_Kategori'])) {
                $htKategori = intval($inputs['Hipertensi_Kategori']);
                if ($htKategori === 0) { // Hipertensi Tingkat 1
                    $diagnoses[] = "Hipertensi Tingkat 1";
                    $recommendations[] = "\nHipertensi Tingkat 1 :\n- Batasi asupan garam dan makanan tinggi sodium.\n- Lakukan olahraga ringan seperti jalan cepat 30 menit sehari.\n- Rutin periksa tekanan darah dan catat perkembangannya.";
                } elseif ($htKategori === 1) { // Hipertensi Tingkat 2
                    $diagnoses[] = "Hipertensi Tingkat 2";
                    $recommendations[] = "\nHipertensi Tingkat 2 :\n- Segera konsultasikan dengan dokter untuk penyesuaian terapi.\n- Hindari makanan tinggi lemak dan garam.\n- Lakukan aktivitas fisik ringan sesuai anjuran dokter.";
                } elseif ($htKategori === 3) { // Pra-hipertensi
                    $diagnoses[] = "Pra-hipertensi";
                    $recommendations[] = "\nPra-hipertensi :\n- Awasi tekanan darah secara berkala.\n- Terapkan pola makan sehat seperti diet DASH.\n- Hindari stres berlebihan dan cukup tidur.";
                }
            }

            // ---------------------------
            // 3. Tuberkulosis
            if (isset($inputs['tuberkulosis']) && intval($inputs['tuberkulosis']) === 0) {
                $diagnoses[] = "Tuberkulosis";
                $recommendations[] = "\nTuberkulosis :\n- Segera lakukan pemeriksaan paru (rontgen atau tes dahak).\n- Konsultasikan dengan dokter spesialis paru untuk pengobatan.\n- Hindari kontak dekat dengan orang lain untuk mencegah penularan.";
            }

            // ---------------------------
            // 4. Penyakit Jantung
            if (isset($inputs['penyakit_jantung']) && intval($inputs['penyakit_jantung']) === 0) {
                $diagnoses[] = "Penyakit Jantung";
                $recommendations[] = "\nPenyakit Jantung :\n- Segera periksakan ke dokter jantung untuk evaluasi lebih lanjut.\n- Hindari aktivitas berat yang dapat membebani jantung.\n- Ikuti pola makan sehat rendah lemak dan rendah garam.";
            }

            // ---------------------------
            // 5. Hipertensi (parameter tambahan)
            if (isset($inputs['hipertensi']) && intval($inputs['hipertensi']) === 0) {
                $diagnoses[] = "Hipertensi (Parameter Tambahan)";
                $recommendations[] = "\nHipertensi (Parameter Tambahan) :\n- Perhatikan pola hidup sehat dengan mengurangi stres.\n- Rutin periksa tekanan darah dan catat perkembangannya.\n- Konsultasikan dengan dokter untuk penyesuaian terapi.";
            }

            // ---------------------------
            // 6. Diabetes Melitus
            if (isset($inputs['diabetes_melitus']) && intval($inputs['diabetes_melitus']) === 0) {
                $diagnoses[] = "Diabetes Melitus";
                $recommendations[] = "\nDiabetes Melitus :\n- Perbaiki pola makan dengan mengurangi asupan gula dan karbohidrat sederhana.\n- Lakukan aktivitas fisik ringan secara teratur.\n- Pantau kadar gula darah secara berkala dan konsultasikan dengan dokter.";
            }

            // ---------------------------
            // 7. Gangguan Jiwa
            if (isset($inputs['gangguan_jiwa']) && intval($inputs['gangguan_jiwa']) === 0) {
                $diagnoses[] = "Gangguan Jiwa";
                $recommendations[] = "\nGangguan Jiwa :\n- Segera cari bantuan profesional (psikiater/psikolog) untuk evaluasi lebih lanjut.\n- Jaga pola tidur yang teratur dan hindari stres berlebihan.\n- Ikuti terapi atau pengobatan yang direkomendasikan oleh ahli.";
            }

            // ---------------------------
            // 8. Trauma pada Kepala
            if (isset($inputs['trauma_pada_kepala']) && intval($inputs['trauma_pada_kepala']) === 0) {
                $diagnoses[] = "Trauma pada Kepala";
                $recommendations[] = "\nTrauma pada Kepala :\n- Segera periksa ke unit gawat darurat untuk penanganan lebih lanjut.\n- Hindari aktivitas berat dan istirahat yang cukup.\n- Pantau gejala seperti pusing, mual, atau kehilangan kesadaran.";
            }

            // ---------------------------
            // 9. Hepatitis
            if (isset($inputs['hepatitis']) && intval($inputs['hepatitis']) === 0) {
                $diagnoses[] = "Hepatitis";
                $recommendations[] = "\nHepatitis :\n- Segera konsultasikan dengan dokter spesialis hati untuk evaluasi lebih lanjut.\n- Hindari konsumsi alkohol dan obat-obatan yang dapat membebani hati.\n- Ikuti pola makan sehat dan rendah lemak.";
            }

            // ---------------------------
            // 10. Spirometri
            if (isset($inputs['Spirometri']) && intval($inputs['Spirometri']) === 1) {
                $diagnoses[] = "Spirometri Abnormal";
                $recommendations[] = "\nSpirometri Abnormal :\n- Lakukan pemeriksaan paru lebih mendalam seperti tes fungsi paru.\n- Hindari paparan polusi udara dan asap rokok.\n- Konsultasikan dengan dokter spesialis paru untuk penanganan lebih lanjut.";
            }

            // ---------------------------
            // 11. Treadmil
            if (isset($inputs['Treadmil']) && intval($inputs['Treadmil']) === 1) {
                $diagnoses[] = "Treadmil Abnormal";
                $recommendations[] = "\nTreadmil Abnormal :\n- Konsultasikan dengan dokter jantung untuk evaluasi lebih lanjut.\n- Hindari aktivitas fisik berat sebelum pemeriksaan lebih lanjut.\n- Pantau gejala seperti nyeri dada atau sesak napas.";
            }

            // ---------------------------
            // 12. Audiometri
            if (isset($inputs['Audiometri']) && intval($inputs['Audiometri']) === 1) {
                $diagnoses[] = "Audiometri Abnormal";
                $recommendations[] = "\nAudiometri Abnormal :\n- Lakukan pemeriksaan pendengaran lebih lanjut dengan dokter THT.\n- Hindari paparan suara keras yang dapat merusak pendengaran.\n- Gunakan alat bantu dengar jika direkomendasikan oleh dokter.";
            }

            // ---------------------------
            // 13. Foto Thorax
            if (isset($inputs['foto_thorax']) && intval($inputs['foto_thorax']) === 1) {
                $diagnoses[] = "Foto Thorax Abnormal";
                $recommendations[] = "\nFoto Thorax Abnormal :\n- Lakukan pemeriksaan radiologi lanjutan untuk evaluasi paru-paru dan jantung.\n- Hindari paparan asap rokok dan polusi udara.\n- Konsultasikan dengan dokter spesialis paru atau jantung.";
            }

            // ---------------------------
            // 14. Nadi (kali/menit)
            if (isset($inputs['Nadi(kali/menit)'])) {
                $nadi = floatval($inputs['Nadi(kali/menit)']);
                if ($nadi < 60) {
                    $diagnoses[] = "Nadi Rendah (Bradikardia)";
                    $recommendations[] = "\nNadi Rendah (Bradikardia) :\n- Periksa kemungkinan bradikardia dengan dokter jantung.\n- Hindari aktivitas berat yang dapat memperburuk kondisi.\n- Pantau gejala seperti pusing atau kelelahan.";
                } elseif ($nadi > 100) {
                    $diagnoses[] = "Nadi Tinggi (Takikardia)";
                    $recommendations[] = "\nNadi Tinggi (Takikardia) :\n- Periksa kemungkinan takikardia dengan dokter jantung.\n- Hindari konsumsi kafein dan alkohol.\n- Lakukan relaksasi untuk mengurangi stres.";
                }
            }

            // ---------------------------
            // 15. Frekuensi Napas (kali/menit)
            if (isset($inputs['FrekuensiNapas(kali/menit)'])) {
                $napas = floatval($inputs['FrekuensiNapas(kali/menit)']);
                if ($napas < 12) {
                    $diagnoses[] = "Frekuensi Napas Rendah";
                    $recommendations[] = "\nFrekuensi Napas Rendah :\n- Evaluasi fungsi paru-paru dengan dokter spesialis.\n- Hindari aktivitas berat yang dapat memperburuk kondisi.\n- Pantau gejala seperti sesak napas atau kelelahan.";
                } elseif ($napas > 20) {
                    $diagnoses[] = "Frekuensi Napas Tinggi";
                    $recommendations[] = "\nFrekuensi Napas Tinggi :\n- Periksa kemungkinan gangguan pernapasan seperti asma atau infeksi.\n- Hindari paparan alergen atau polusi udara.\n- Konsultasikan dengan dokter untuk penanganan lebih lanjut.";
                }
            }

            // ---------------------------
            // 16. Tingkatan Kesadaran
            if (isset($inputs['Tingkatan_Kesadaran']) && intval($inputs['Tingkatan_Kesadaran']) !== 1) {
                $diagnoses[] = "Tingkatan Kesadaran Abnormal";
                $recommendations[] = "\nTingkatan Kesadaran Abnormal :\n- Segera evaluasi kondisi neurologis dengan dokter spesialis.\n- Hindari aktivitas yang membutuhkan konsentrasi tinggi.\n- Pantau gejala seperti kebingungan atau kehilangan kesadaran.";
            }

            // ---------------------------
            // 17. Buta Warna
            if (isset($inputs['Buta_Warna']) && intval($inputs['Buta_Warna']) === 1) {
                $diagnoses[] = "Buta Warna";
                $recommendations[] = "\nButa Warna :\n- Lakukan pemeriksaan mata untuk evaluasi gangguan persepsi warna.\n- Hindari pekerjaan yang membutuhkan penglihatan warna akurat.\n- Konsultasikan dengan dokter mata untuk penanganan lebih lanjut.";
            }

            // ---------------------------
            // 18. Jantung
            if (isset($inputs['Jantung']) && intval($inputs['Jantung']) === 1) {
                $diagnoses[] = "Jantung Abnormal";
                $recommendations[] = "\nJantung Abnormal :\n- Segera periksa kondisi jantung ke dokter spesialis jantung.\n- Hindari aktivitas berat yang dapat membebani jantung.\n- Ikuti pola makan sehat dan rendah lemak.";
            }

            // ---------------------------
            // 19. Hemoglobin (rekomendasi baru)
            // Normal: Wanita 12 - 16 g/dL, Pria 13 - 17 g/dL
            if (isset($inputs['hemoglobin'], $inputs['gender'])) {
                $gender = $inputs['gender'];
                $hb = floatval($inputs['hemoglobin']);
                if ($gender == '2') { // Perempuan
                    if ($hb < 12) {
                        $diagnoses[] = "Hemoglobin Rendah";
                        $recommendations[] = "\nHemoglobin Rendah :\n- Perbanyak makanan kaya zat besi (daging merah tanpa lemak, hati, bayam, kacang-kacangan).\n- Tambahkan vitamin C (misalnya jeruk, paprika) untuk membantu penyerapan zat besi.\n- Pastikan pola makan seimbang dan istirahat yang cukup.";
                    } elseif ($hb > 16) {
                        $diagnoses[] = "Hemoglobin Tinggi";
                        $recommendations[] = "\nHemoglobin Tinggi :\n- Periksa kemungkinan dehidrasi atau kebiasaan merokok.\n- Pastikan hidrasi optimal (minimal 8 gelas air per hari).\n- Periksa ulang gaya hidup dan kebiasaan jika perlu.\n- Ulangi pemeriksaan jika ada gejala lain seperti pusing atau lelah.";
                    }
                } else { // Laki-laki
                    if ($hb < 13) {
                        $diagnoses[] = "Hemoglobin Rendah";
                        $recommendations[] = "\nHemoglobin Rendah :\n- Perbanyak konsumsi makanan kaya zat besi (daging merah, hati, sayuran hijau).\n- Tambahkan vitamin C untuk mendukung penyerapan zat besi.\n- Perhatikan asupan nutrisi secara keseluruhan.";
                    } elseif ($hb > 17) {
                        $diagnoses[] = "Hemoglobin Tinggi";
                        $recommendations[] = "\nHemoglobin Tinggi :\n- Pastikan cukup minum air.\n- Periksa ulang gaya hidup dan kebiasaan seperti merokok.\n- Amati adanya gejala lain dan ulangi pemeriksaan bila perlu.";
                    }
                }
            }

            // ---------------------------
            // 20. Leukosit (normal 4000 - 11000 sel/µL)
            if (isset($inputs['leukosit'])) {
                $leukosit = floatval($inputs['leukosit']);
                if ($leukosit < 4000) {
                    $diagnoses[] = "Leukosit Rendah";
                    $recommendations[] = "\nLeukosit Rendah :\n- Istirahat yang cukup dan perhatikan asupan nutrisi.\n- Hindari keramaian dan kontak dengan orang yang sakit.\n- Konsumsi buah dan sayuran untuk mendukung sistem kekebalan.";
                } elseif ($leukosit > 11000) {
                    $diagnoses[] = "Leukosit Tinggi";
                    $recommendations[] = "\nLeukosit Tinggi :\n- Perhatikan gejala seperti demam, nyeri, atau sakit tenggorokan.\n- Istirahat yang cukup dan konsumsi makanan bergizi.\n- Kurangi stres dengan teknik relaksasi.";
                }
            }

            // ---------------------------
            // 21. Eritrosit (normal: Wanita 4 - 5 juta, Pria 4.5 - 5.5 juta sel/µL)
            if (isset($inputs['eritrosit'], $inputs['gender'])) {
                $eritrosit = floatval($inputs['eritrosit']);
                if ($inputs['gender'] == '2') {
                    if ($eritrosit < 4.0) {
                        $diagnoses[] = "Eritrosit Rendah";
                        $recommendations[] = "\nEritrosit Rendah :\n- Perbanyak asupan zat besi dan vitamin B12.\n- Konsumsi makanan seperti daging, telur, dan sayuran hijau.";
                    } elseif ($eritrosit > 5.0) {
                        $diagnoses[] = "Eritrosit Tinggi";
                        $recommendations[] = "\nEritrosit Tinggi :\n- Pastikan hidrasi optimal dengan minum cukup air.\n- Amati kondisi tubuh secara keseluruhan.";
                    }
                } else {
                    if ($eritrosit < 4.5) {
                        $diagnoses[] = "Eritrosit Rendah";
                        $recommendations[] = "\nEritrosit Rendah :\n- Pastikan konsumsi makanan kaya zat besi dan vitamin B12.\n- Perbanyak asupan protein dan nutrisi seimbang.";
                    } elseif ($eritrosit > 5.5) {
                        $diagnoses[] = "Eritrosit Tinggi";
                        $recommendations[] = "\nEritrosit Tinggi :\n- Pastikan Anda cukup terhidrasi.\n- Perhatikan gejala lain dan ulangi pemeriksaan bila perlu.";
                    }
                }
            }

            // ---------------------------
            // 22. LED (Laju Endap Darah) (Wanita: 0-20 mm/jam, Pria: 0-15 mm/jam)
            if (isset($inputs['LED'], $inputs['gender'])) {
                $led = floatval($inputs['LED']);
                if ($inputs['gender'] == '2') {
                    if ($led < 0 || $led > 20) {
                        $diagnoses[] = "LED Abnormal";
                        $recommendations[] = "\nLED Abnormal :\n- Perbanyak konsumsi makanan anti-inflamasi (buah dan sayur segar).\n- Jaga pola hidup sehat dengan olahraga teratur dan istirahat cukup.";
                    }
                } else {
                    if ($led < 0 || $led > 15) {
                        $diagnoses[] = "LED Abnormal";
                        $recommendations[] = "\nLED Abnormal :\n- Konsumsi makanan bergizi dan antioksidan tinggi.\n- Pastikan istirahat cukup dan hindari stres.";
                    }
                }
            }

            // ---------------------------
            // 23. Eosinofil (normal 0 - 1)
            if (isset($inputs['eosinofil'])) {
                $eos = floatval($inputs['eosinofil']);
                if ($eos < 0 || $eos > 1) {
                    $diagnoses[] = "Eosinofil Abnormal";
                    $recommendations[] = "\nEosinofil Abnormal :\n- Perhatikan apakah ada pemicu alergi di lingkungan Anda.\n- Konsumsi makanan tinggi antioksidan (buah beri, sayuran hijau).";
                }
            }

            // ---------------------------
            // 24. Basofil (normal 0 - 1)
            if (isset($inputs['basofil'])) {
                $baso = floatval($inputs['basofil']);
                if ($baso < 0 || $baso > 1) {
                    $diagnoses[] = "Basofil Abnormal";
                    $recommendations[] = "\nBasofil Abnormal :\n- Perhatikan gejala lain (misalnya ruam atau demam ringan).\n- Pastikan asupan nutrisi dan hidrasi optimal.";
                }
            }

            // ---------------------------
            // 25. Neutrofil (normal 50 - 70%)
            if (isset($inputs['neutrofil'])) {
                $neutrofil = floatval($inputs['neutrofil']);
                if ($neutrofil < 50 || $neutrofil > 70) {
                    $diagnoses[] = "Neutrofil Abnormal";
                    $recommendations[] = "\nNeutrofil Abnormal :\n- Konsumsi makanan bergizi untuk mendukung sistem kekebalan (misalnya buah dan sayuran).\n- Pastikan istirahat yang cukup dan kelola stres.";
                }
            }

            // ---------------------------
            // 26. Limfosit (normal 25 - 33%)
            if (isset($inputs['lymphosit'])) {
                $lymphosit = floatval($inputs['lymphosit']);
                if ($lymphosit < 25 || $lymphosit > 33) {
                    $diagnoses[] = "Limfosit Abnormal";
                    $recommendations[] = "\nLimfosit Abnormal :\n- Jaga pola makan seimbang dan kaya vitamin.\n- Hindari paparan infeksi dengan menjaga kebersihan diri.";
                }
            }

            // ---------------------------
            // 27. Monosit (normal 3 - 8%)
            if (isset($inputs['monosit'])) {
                $monosit = floatval($inputs['monosit']);
                if ($monosit < 3 || $monosit > 8) {
                    $diagnoses[] = "Monosit Abnormal";
                    $recommendations[] = "\nMonosit Abnormal :\n- Perbanyak konsumsi makanan dengan kandungan anti-inflamasi (misalnya kunyit, jahe).\n- Pastikan hidrasi yang cukup.";
                }
            }

            // ---------------------------
             // 28. Trombosit (normal 150000 - 400000 sel/µL)
            if (isset($inputs['trombosit'])) {
                $trombosit = floatval($inputs['trombosit']);
                if ($trombosit < 150000) {
                    $diagnoses[] = "Trombosit Rendah";
                    $recommendations[] = "\nTrombosit Rendah :\n- Evaluasi risiko perdarahan dengan dokter.\n- Hindari aktivitas yang dapat menyebabkan cedera.\n- Periksa fungsi sumsum tulang dengan tes lanjutan.";
                } elseif ($trombosit > 400000) {
                    $diagnoses[] = "Trombosit Tinggi";
                    $recommendations[] = "\nTrombosit Tinggi :\n- Periksa kemungkinan gangguan trombosit dengan dokter.\n- Hindari konsumsi alkohol dan rokok.\n- Pantau risiko pembekuan darah dengan tes lanjutan.";
                }
            }

            // ---------------------------
            // 29. Hematokrit (normal: Wanita 37-45%, Pria 40-50%)
            if (isset($inputs['hematokrit'], $inputs['gender'])) {
                $hematokrit = floatval($inputs['hematokrit']);
                if ($inputs['gender'] == '2') {
                    if ($hematokrit < 37) {
                        $diagnoses[] = "Hematokrit Rendah";
                        $recommendations[] = "\nHematokrit Rendah :\n- Pastikan asupan cairan yang cukup.\n- Periksa kemungkinan anemia dengan tes darah lengkap.\n- Konsultasikan dengan dokter untuk evaluasi lebih lanjut.";
                    } elseif ($hematokrit > 45) {
                        $diagnoses[] = "Hematokrit Tinggi";
                        $recommendations[] = "\nHematokrit Tinggi :\n- Evaluasi kemungkinan dehidrasi atau gangguan darah.\n- Hindari konsumsi alkohol dan rokok.\n- Konsultasikan dengan dokter untuk penanganan lebih lanjut.";
                    }
                } else {
                    if ($hematokrit < 40) {
                        $diagnoses[] = "Hematokrit Rendah";
                        $recommendations[] = "\nHematokrit Rendah :\n- Periksa kemungkinan anemia dengan tes darah lengkap.\n- Tingkatkan asupan zat besi dan vitamin B12.\n- Konsultasikan dengan dokter untuk evaluasi lebih lanjut.";
                    } elseif ($hematokrit > 50) {
                        $diagnoses[] = "Hematokrit Tinggi";
                        $recommendations[] = "\nHematokrit Tinggi :\n- Evaluasi kemungkinan dehidrasi atau kelainan darah.\n- Hindari konsumsi alkohol dan rokok.\n- Konsultasikan dengan dokter untuk penanganan lebih lanjut.";
                    }
                }
            }

            // ---------------------------
            // 30. MCV (normal 82 - 92 fL)
            if (isset($inputs['MCV'])) {
                $mcv = floatval($inputs['MCV']);
                if ($mcv < 82 || $mcv > 92) {
                    $diagnoses[] = "MCV Abnormal";
                    $recommendations[] = "\nMCV Abnormal :\n- Perbanyak konsumsi vitamin B12 dan asam folat (daging, telur, sayuran hijau).\n- Pastikan pemeriksaan lanjutan jika gejala anemia muncul.";
                }
            }

            // ---------------------------
            // 31. SGOT (normal: Wanita ≤31 U/L, Pria ≤37 U/L)
            if (isset($inputs['SGOT'], $inputs['gender'])) {
                $sgot = floatval($inputs['SGOT']);
                if ($inputs['gender'] == '2') {
                    if ($sgot < 0 || $sgot > 31) {
                        $diagnoses[] = "SGOT Tinggi";
                        $recommendations[] = "\nSGOT Tinggi :\n- Hindari konsumsi alkohol dan makanan berminyak.\n- Perbanyak konsumsi sayur dan buah segar untuk mendukung fungsi hati.";
                    }
                } else {
                    if ($sgot < 0 || $sgot > 37) {
                        $diagnoses[] = "SGOT Tinggi";
                        $recommendations[] = "\nSGOT Tinggi :\n- Batasi konsumsi alkohol dan makanan berlemak.\n- Perbanyak konsumsi makanan detoks (sayuran hijau, buah-buahan).";
                    }
                }
            }

            // ---------------------------
            // 32. SGPT (normal: Wanita ≤32 U/L, Pria ≤42 U/L)
            if (isset($inputs['SGPT'], $inputs['gender'])) {
                $sgpt = floatval($inputs['SGPT']);
                if ($inputs['gender'] == '2') {
                    if ($sgpt < 0 || $sgpt > 32) {
                        $diagnoses[] = "SGPT Tinggi";
                        $recommendations[] = "\nSGPT Tinggi :\n- Kurangi konsumsi alkohol dan makanan berat/berlemak.\n- Perbanyak konsumsi sayuran dan buah segar.";
                    }
                } else {
                    if ($sgpt < 0 || $sgpt > 42) {
                        $diagnoses[] = "SGPT Tinggi";
                        $recommendations[] = "\nSGPT Tinggi :\n- Hindari makanan berlemak dan alkohol.\n- Perbanyak konsumsi makanan yang mendukung detoksifikasi hati (sayur hijau, buah-buahan).";
                    }
                }
            }

            // ---------------------------
            // 33. BUN (normal 5 - 23.5 mg/dL)
            if (isset($inputs['BUN'])) {
                $bun = floatval($inputs['BUN']);
                if ($bun < 5 || $bun > 23.5) {
                    $diagnoses[] = "BUN Abnormal";
                    $recommendations[] = "\nBUN Abnormal :\n- Pastikan asupan cairan optimal.\n- Atur asupan protein agar tidak berlebihan.";
                }
            }

            // ---------------------------
            // 34. Kreatinin (normal: Wanita 0.7-1.1 mg/dL, Pria 0.8-1.4 mg/dL)
            if (isset($inputs['kreatinin'], $inputs['gender'])) {
                $kreatinin = floatval($inputs['kreatinin']);
                if ($inputs['gender'] == '2') {
                    if ($kreatinin < 0.7 || $kreatinin > 1.1) {
                        $diagnoses[] = "Kreatinin Abnormal";
                        $recommendations[] = "\nKreatinin Abnormal :\n- Pastikan hidrasi yang cukup.\n- Kurangi asupan protein jika diperlukan.";
                    }
                } else {
                    if ($kreatinin < 0.8 || $kreatinin > 1.4) {
                        $diagnoses[] = "Kreatinin Abnormal";
                        $recommendations[] = "\nKreatinin Abnormal :\n- Pastikan asupan cairan optimal.\n- Perhatikan asupan protein dan gaya hidup sehat.";
                    }
                }
            }

            // ---------------------------
            // 35. Asam Urat (normal: Wanita 2.6-6 mg/dL, Pria 3.5-7.2 mg/dL)
            if (isset($inputs['asam_urat'], $inputs['gender'])) {
                $uric = floatval($inputs['asam_urat']);
                if ($inputs['gender'] == '2') {
                    if ($uric < 2.6 || $uric > 6) {
                        $diagnoses[] = "Asam Urat Abnormal";
                        $recommendations[] = "\nAsam Urat Abnormal :\n- Hindari makanan tinggi purin (misal: daging merah, makanan laut).\n- Perbanyak minum air putih.\n- Konsumsi buah seperti ceri yang dapat membantu menurunkan asam urat.";
                    }
                } else {
                    if ($uric < 3.5 || $uric > 7.2) {
                        $diagnoses[] = "Asam Urat Abnormal";
                        $recommendations[] = "\nAsam Urat Abnormal :\n- Batasi makanan tinggi purin dan konsumsi alkohol.\n- Perbanyak asupan air putih.\n- Konsumsi buah yang dapat membantu menurunkan asam urat (misal: ceri).";
                    }
                }
            }

            // ---------------------------
            // 36. Kolesterol Total (normal: <200 mg/dL)
            if (isset($inputs['kolestrol_total'])) {
                $kolTotal = floatval($inputs['kolestrol_total']);
                if ($kolTotal >= 200) {
                    $diagnoses[] = "Kolesterol Total Tinggi";
                    $recommendations[] = "\nKolesterol Total Tinggi :\n- Kurangi konsumsi makanan tinggi lemak jenuh (gorengan, makanan olahan).\n- Perbanyak konsumsi serat (buah, sayur, gandum utuh).\n- Lakukan aktivitas fisik rutin.";
                }
            }

            // ---------------------------
            // 37. Trigliserida (normal: <200 mg/dL)
            if (isset($inputs['trigliserida'])) {
                $trigliserida = floatval($inputs['trigliserida']);
                if ($trigliserida >= 200) {
                    $diagnoses[] = "Trigliserida Tinggi";
                    $recommendations[] = "\nTrigliserida Tinggi :\n- Batasi konsumsi gula dan karbohidrat sederhana.\n- Perbanyak asupan asam lemak omega-3 (ikan salmon, kacang-kacangan).\n- Tingkatkan aktivitas fisik.";
                }
            }

            // ---------------------------
            // 38. Kolesterol HDL (direct) (normal: >35 mg/dL)
            if (isset($inputs['kolestrol_HDL_(direct)'])) {
                $hdl = floatval($inputs['kolestrol_HDL_(direct)']);
                if ($hdl <= 35) {
                    $diagnoses[] = "Kolesterol HDL Rendah";
                    $recommendations[] = "\nKolesterol HDL Rendah :\n- Perbanyak olahraga aerobik (jalan cepat, bersepeda).\n- Konsumsi lemak sehat (minyak zaitun, alpukat, kacang-kacangan).\n- Hindari lemak trans dan jenuh.";
                }
            }

            // ---------------------------
            // 39. Kolesterol LDL (direct) (normal: <115 mg/dL)
            if (isset($inputs['kolestrol_LDL_(direct)'])) {
                $ldl = floatval($inputs['kolestrol_LDL_(direct)']);
                if ($ldl >= 115) {
                    $diagnoses[] = "Kolesterol LDL Tinggi";
                    $recommendations[] = "\nKolesterol LDL Tinggi :\n- Kurangi konsumsi lemak jenuh.\n- Perbanyak konsumsi serat dan lemak sehat.\n- Lakukan olahraga secara teratur.";
                }
            }


            // ---------------------------
            // 40. Gula Darah Puasa
            if (isset($inputs['gula_darah_puasa'])) {
                $gdp = floatval($inputs['gula_darah_puasa']);
                if ($gdp >= 126 && $gdp <= 200) {
                    $diagnoses[] = "Gula Darah Puasa Tidak Normal";
                    $recommendations[] = "\nGula Darah Puasa Tidak Normal :\n- Perbaiki pola makan dengan mengurangi asupan gula dan karbohidrat sederhana.\n- Lakukan aktivitas fisik ringan secara teratur.\n- Pantau kadar gula darah secara berkala.";
                } elseif ($gdp > 200) {
                    $diagnoses[] = "Gula Darah Puasa Sangat Tinggi";
                    $recommendations[] = "\nGula Darah Puasa Sangat Tinggi :\n- Segera konsultasikan dengan dokter untuk evaluasi diabetes.\n- Hindari makanan tinggi gula dan lemak.\n- Ikuti rencana pengobatan yang direkomendasikan oleh dokter.";
                }
            }

            // ---------------------------
            // 41. Gula Darah 2 Jam PP
            if (isset($inputs['gula_darah_2_jam_pp'])) {
                $g2pp = floatval($inputs['gula_darah_2_jam_pp']);
                if ($g2pp >= 140 && $g2pp <= 200) {
                    $diagnoses[] = "Gula Darah 2 Jam PP Tidak Normal";
                    $recommendations[] = "\nGula Darah 2 Jam PP Tidak Normal :\n- Hindari konsumsi gula berlebih dan makanan dengan indeks glikemik tinggi.\n- Perbanyak asupan serat dan protein berkualitas.\n- Lakukan aktivitas fisik secara rutin.";
                } elseif ($g2pp > 200) {
                    $diagnoses[] = "Gula Darah 2 Jam PP Sangat Tinggi";
                    $recommendations[] = "\nGula Darah 2 Jam PP Sangat Tinggi :\n- Segera konsultasikan dengan dokter untuk evaluasi kondisi diabetes.\n- Ikuti rencana pengobatan yang direkomendasikan oleh dokter.\n- Pantau kadar gula darah secara berkala.";
                }
            }

            // ---------------------------
            // 42. Anti HBs (0 = negatif, abnormal)
            if (isset($inputs['anti_HBs']) && intval($inputs['anti_HBs']) === 0) {
                $diagnoses[] = "Anti HBs Negatif";
                $recommendations[] = "\nAnti HBs Negatif :\n- Konsultasikan dengan dokter untuk pemeriksaan status hepatitis.\n- Pertimbangkan vaksinasi hepatitis B jika diperlukan.\n- Hindari kontak dengan darah atau cairan tubuh orang lain.";
            }

            // ---------------------------
            // 43. HBs Ag Kuantitatif (nilai selain 0 menunjukkan antigen)
            if (isset($inputs['HBs_Ag_Kuantitatif']) && intval($inputs['HBs_Ag_Kuantitatif']) !== 0) {
                $diagnoses[] = "HBs Ag Positif";
                $recommendations[] = "\nHBs Ag Positif :\n- Segera evaluasi dan konsultasikan dengan dokter spesialis hati.\n- Hindari konsumsi alkohol dan obat-obatan yang dapat membebani hati.\n- Ikuti rencana pengobatan yang direkomendasikan oleh dokter.";
            }

            // ---------------------------
            // 44. pH pada Urine (normal 5 - 8)
            if (isset($inputs['pH_pada_urine'])) {
                $ph = floatval($inputs['pH_pada_urine']);
                if ($ph < 5 || $ph > 8) {
                    $diagnoses[] = "pH Urine Abnormal";
                    $recommendations[] = "\npH Urine Abnormal :\n- Pastikan asupan cairan optimal.\n- Konsumsi makanan seimbang dan hindari makanan yang terlalu asam atau basa.\n- Konsultasikan dengan dokter untuk evaluasi lebih lanjut.";
                }
            }

            // ---------------------------
            // 45. Berat Jenis pada Urine (normal 1.005 - 1.030)
            if (isset($inputs['berat_jenis_pada_urine'])) {
                $beratJenis = floatval($inputs['berat_jenis_pada_urine']);
                if ($beratJenis < 1.005 || $beratJenis > 1.030) {
                    $diagnoses[] = "Berat Jenis Urine Abnormal";
                    $recommendations[] = "\nBerat Jenis Urine Abnormal :\n- Pastikan asupan cairan cukup.\n- Perhatikan asupan garam dan elektrolit.\n- Konsultasikan dengan dokter untuk evaluasi lebih lanjut.";
                }
            }

            // ---------------------------
            // 46. Nitrite pada Urine (0 = normal)
            if (isset($inputs['nitrite_pada_urine']) && intval($inputs['nitrite_pada_urine']) !== 0) {
                $diagnoses[] = "Nitrit pada Urine Positif";
                $recommendations[] = "\nNitrit pada Urine Positif :\n- Periksa kemungkinan infeksi saluran kemih.\n- Konsultasikan dengan dokter untuk pengobatan antibiotik jika diperlukan.\n- Perbanyak asupan air putih untuk membersihkan saluran kemih.";
            }

            // ---------------------------
            // 47. Protein pada Urine (jika bukan 0)
            if (isset($inputs['protein_pada_urine']) && intval($inputs['protein_pada_urine']) !== 0) {
                $diagnoses[] = "Protein pada Urine Positif";
                $recommendations[] = "\nProtein pada Urine Positif :\n- Evaluasi fungsi ginjal dengan tes lanjutan.\n- Hindari makanan tinggi protein sementara waktu.\n- Konsultasikan dengan dokter untuk penanganan lebih lanjut.";
            }

            // ---------------------------
            // 48. Reduksi pada Urine (jika bukan 0)
            if (isset($inputs['reduksi_pada_urine']) && intval($inputs['reduksi_pada_urine']) !== 0) {
                $diagnoses[] = "Reduksi pada Urine Abnormal";
                $recommendations[] = "\nReduksi pada Urine Abnormal :\n- Periksa kondisi metabolisme urine dengan dokter.\n- Hindari konsumsi gula berlebih.\n- Konsultasikan dengan dokter untuk evaluasi lebih lanjut.";
            }

            // ---------------------------
            // 49. Ketone pada Urine (jika bukan 0)
            if (isset($inputs['ketone_pada_urine']) && intval($inputs['ketone_pada_urine']) !== 0) {
                $diagnoses[] = "Ketone pada Urine Positif";
                $recommendations[] = "\nKetone pada Urine Positif :\n- Evaluasi kemungkinan ketoasidosis, terutama pada penderita diabetes.\n- Perbanyak asupan cairan dan hindari puasa berkepanjangan.\n- Konsultasikan dengan dokter untuk penanganan lebih lanjut.";
            }

            // ---------------------------
            // 50. Urobilinogen pada Urine (nilai selain 0 abnormal)
            if (isset($inputs['urobilinogen_pada_urine']) && intval($inputs['urobilinogen_pada_urine']) !== 0) {
                $diagnoses[] = "Urobilinogen pada Urine Abnormal";
                $recommendations[] = "\nUrobilinogen pada Urine Abnormal :\n- Evaluasi fungsi hati dan ginjal lebih lanjut.\n- Hindari konsumsi alkohol dan obat-obatan yang dapat membebani hati.\n- Konsultasikan dengan dokter untuk penanganan lebih lanjut.";
            }

            // ---------------------------
            // 51. Bilirubin pada Urine (jika bukan 0)
            if (isset($inputs['billirubin_pada_urine']) && intval($inputs['billirubin_pada_urine']) !== 0) {
                $diagnoses[] = "Bilirubin pada Urine Positif";
                $recommendations[] = "\nBilirubin pada Urine Positif :\n- Segera periksa fungsi hati dengan tes lanjutan.\n- Hindari konsumsi alkohol dan obat-obatan yang dapat membebani hati.\n- Konsultasikan dengan dokter untuk penanganan lebih lanjut.";
            }

            // ---------------------------
            // 52. Eritrosit pada Urine (normal 0 - 2)
            if (isset($inputs['eritrosit_pada_urine'])) {
                $eritUrine = floatval($inputs['eritrosit_pada_urine']);
                if ($eritUrine < 0 || $eritUrine > 2) {
                    $diagnoses[] = "Eritrosit pada Urine Abnormal";
                    $recommendations[] = "\nEritrosit pada Urine Abnormal :\n- Evaluasi kemungkinan infeksi atau kerusakan ginjal.\n- Hindari aktivitas berat yang dapat menyebabkan cedera.\n- Konsultasikan dengan dokter untuk penanganan lebih lanjut.";
                }
            }

            // ---------------------------
            // 53. Lekosit pada Urine (normal 0 - 5)
            if (isset($inputs['lekosit_pada_urine'])) {
                $lekUrine = floatval($inputs['lekosit_pada_urine']);
                if ($lekUrine < 0 || $lekUrine > 5) {
                    $diagnoses[] = "Lekosit pada Urine Abnormal";
                    $recommendations[] = "\nLekosit pada Urine Abnormal :\n- Periksa kemungkinan infeksi saluran kemih.\n- Perbanyak asupan air putih untuk membersihkan saluran kemih.\n- Konsultasikan dengan dokter untuk pengobatan antibiotik jika diperlukan.";
                }
            }

            // ---------------------------
            // 54. Silinder pada Urine (jika bukan 0)
            if (isset($inputs['silinder_pada_urine']) && intval($inputs['silinder_pada_urine']) !== 0) {
                $diagnoses[] = "Silinder pada Urine Abnormal";
                $recommendations[] = "\nSilinder pada Urine Abnormal :\n- Evaluasi kondisi ginjal dengan pemeriksaan lanjutan.\n- Hindari konsumsi obat-obatan yang dapat membebani ginjal.\n- Konsultasikan dengan dokter untuk penanganan lebih lanjut.";
            }

            // ---------------------------
            // 55. Kristal pada Urine (jika bukan 0)
            if (isset($inputs['kristal_pada_urine']) && intval($inputs['kristal_pada_urine']) !== 0) {
                $diagnoses[] = "Kristal pada Urine Abnormal";
                $recommendations[] = "\nKristal pada Urine Abnormal :\n- Periksa kemungkinan pembentukan batu ginjal atau gangguan metabolisme.\n- Perbanyak asupan air putih untuk mencegah pembentukan kristal.\n- Konsultasikan dengan dokter untuk penanganan lebih lanjut.";
            }

            // ---------------------------
            // 56. Yeast pada Urine (jika bukan 0)
            if (isset($inputs['yeast_pada_urine']) && intval($inputs['yeast_pada_urine']) !== 0) {
                $diagnoses[] = "Yeast pada Urine Positif";
                $recommendations[] = "\nYeast pada Urine Positif :\n- Evaluasi kemungkinan infeksi jamur pada saluran kemih.\n- Hindari penggunaan antibiotik tanpa resep dokter.\n- Konsultasikan dengan dokter untuk pengobatan antijamur jika diperlukan.";
            }

            // ---------------------------
            // 57. Bakteri pada Urine (jika bukan 0)
            if (isset($inputs['bakteri_pada_urine']) && intval($inputs['bakteri_pada_urine']) !== 0) {
                $diagnoses[] = "Bakteri pada Urine Terdeteksi";
                $recommendations[] = "\nBakteri pada Urine Terdeteksi :\n- Segera konsultasikan dengan dokter untuk evaluasi infeksi saluran kemih.\n- Perbanyak asupan air putih untuk membersihkan saluran kemih.\n- Ikuti pengobatan antibiotik yang direkomendasikan oleh dokter.";
            }


            // ---------------------------
            // Gabungkan diagnosis dan rekomendasi
            if (empty($diagnoses)) {
                $diagnosisMessage = "Semua parameter dalam batas normal.";
                $recommendationMessage = "Tidak ada rekomendasi khusus.";
            } else {
                $diagnosisMessage = implode(", ", $diagnoses);
                $recommendationMessage = implode(" ", $recommendations);
            }

            // Simpan masing-masing pesan ke session
            session()->flash('diagnosisMessage', $diagnosisMessage);
            session()->flash('recommendationMessage', $recommendationMessage);

            return redirect()->back()->with('successrekom', 'Generate success!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_rekammedis' => 'required|exists:hasil_pemeriksaan,id',
            'diagnosa'      => 'required|string',
            'rekom_medis'   => 'required|string',
        ]);

        // Cek apakah data dengan rekam medis yang sama sudah ada
        $exists = RekomendasiMedis::where('hasil_pemeriksaan_id', $validatedData['id_rekammedis'])->exists();
        if ($exists) {
            return redirect()->back()->with('error', 'Rekam medis sudah ada!');
        }

        RekomendasiMedis::create([
            'hasil_pemeriksaan_id' => $validatedData['id_rekammedis'],
            'diagnosis'            => $validatedData['diagnosa'],
            'rekomendasi'          => $validatedData['rekom_medis'],
        ]);

        return redirect()->back()->with('success', 'Data rekomendasi medis berhasil disimpan!');
    }

    public function detail($id)
    {
        // Asumsikan bahwa 'hasil_pemeriksaan_id' adalah acuan untuk mengaitkan rekomendasi medis
        $rekomMedis = RekomendasiMedis::where('hasil_pemeriksaan_id', $id)->first();

        if ($rekomMedis) {
            return response()->json([
                'success' => true,
                'data' => [
                    'diagnosis'   => $rekomMedis->diagnosis,
                    'rekomendasi' => $rekomMedis->rekomendasi,
                ]
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
    }


}
