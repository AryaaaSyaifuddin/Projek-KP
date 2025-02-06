<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HasilPemeriksaan;

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
            // 0 = Normal, 1 = Obesitas I, 2 = Obesitas II, 3 = Over Weight, 4 = Under Weight
            if (isset($inputs['BMICat'])) {
                $bmiCat = intval($inputs['BMICat']);
                if ($bmiCat == 1) {
                    $diagnoses[] = "Obesitas I";
                    $recommendations[] = "\nObesitas I :\nPerbaiki pola makan dan tambahkan aktivitas fisik ringan.";
                } elseif ($bmiCat == 2) {
                    $diagnoses[] = "Obesitas II";
                    $recommendations[] = "\nObesitas II :\nDisarankan mengurangi asupan makanan berlemak dan berkonsultasi dengan ahli gizi.";
                } elseif ($bmiCat == 3) {
                    $diagnoses[] = "OverWeight";
                    $recommendations[] = "\nOverWeight :\nPertimbangkan program penurunan berat badan dan perbaiki pola makan.";
                } elseif ($bmiCat == 4) {
                    $diagnoses[] = "UnderWeight";
                    $recommendations[] = "\nUnderWeight :\nTingkatkan asupan nutrisi dan konsultasikan dengan ahli gizi.";
                }
            }

            // ---------------------------
            // 2. Hipertensi_Kategori
            if (isset($inputs['Hipertensi_Kategori'])) {
                $htKategori = intval($inputs['Hipertensi_Kategori']);
                if ($htKategori === 0) { // Hipertensi Tingkat 1
                    $diagnoses[] = "Hipertensi Tingkat 1";
                    $recommendations[] = "\nHipertensi Tingkat 1 :\nBatasi asupan garam, perbaiki pola makan, dan rutin periksa tekanan darah.";
                } elseif ($htKategori === 1) { // Hipertensi Tingkat 2
                    $diagnoses[] = "Hipertensi Tingkat 2";
                    $recommendations[] = "\nHipertensi Tingkat 2 :\nSegera konsultasikan dengan dokter untuk evaluasi lebih lanjut dan penyesuaian terapi.";
                } elseif ($htKategori === 3) { // Pra-hipertensi
                    $diagnoses[] = "Pra-hipertensi";
                    $recommendations[] = "\nPra-hipertensi :\nAwasi tekanan darah secara berkala dan terapkan gaya hidup sehat untuk mencegah perkembangan hipertensi.";
                }
            }

            // ---------------------------
            // 3. Tuberkulosis
            // 0 = Ada, 1 = Tidak
            if (isset($inputs['tuberkulosis']) && intval($inputs['tuberkulosis']) === 0) {
                $diagnoses[] = "Tuberkulosis";
                $recommendations[] = "\nTuberkulosis :\nSegera lakukan pemeriksaan paru dan konsultasikan dengan dokter spesialis paru.";
            }

            // ---------------------------
            // 4. Penyakit Jantung
            // 0 = Ada, 1 = Tidak
            if (isset($inputs['penyakit_jantung']) && intval($inputs['penyakit_jantung']) === 0) {
                $diagnoses[] = "Penyakit Jantung";
                $recommendations[] = "\nPenyakit Jantung :\nSegera periksakan ke dokter jantung untuk evaluasi dan pengobatan.";
            }

            // ---------------------------
            // 5. Hipertensi (parameter tambahan)
            if (isset($inputs['hipertensi']) && intval($inputs['hipertensi']) === 0) {
                $diagnoses[] = "Hipertensi (parameter tambahan)";
                $recommendations[] = "\nHipertensi (parameter tambahan) :\nPerhatikan pola hidup dan lakukan pemeriksaan tekanan darah secara rutin.";
            }

            // ---------------------------
            // 6. Diabetes Melitus
            if (isset($inputs['diabetes_melitus']) && intval($inputs['diabetes_melitus']) === 0) {
                $diagnoses[] = "Diabetes Melitus";
                $recommendations[] = "\nDiabetes Melitus :\nPerbaiki pola makan, kurangi gula, dan periksakan kadar gula darah secara berkala.";
            }

            // ---------------------------
            // 7. Gangguan Jiwa
            if (isset($inputs['gangguan_jiwa']) && intval($inputs['gangguan_jiwa']) === 0) {
                $diagnoses[] = "Gangguan Jiwa";
                $recommendations[] = "\nGangguan Jiwa :\nSegera cari bantuan profesional (psikiater/psikolog) untuk evaluasi lebih lanjut.";
            }

            // ---------------------------
            // 8. Trauma pada Kepala
            if (isset($inputs['trauma_pada_kepala']) && intval($inputs['trauma_pada_kepala']) === 0) {
                $diagnoses[] = "Trauma pada Kepala";
                $recommendations[] = "\nTrauma pada Kepala :\nSegera periksa ke unit gawat darurat untuk penanganan lebih lanjut.";
            }

            // ---------------------------
            // 9. Hepatitis
            if (isset($inputs['hepatitis']) && intval($inputs['hepatitis']) === 0) {
                $diagnoses[] = "Hepatitis";
                $recommendations[] = "\nHepatitis :\nSegera konsultasikan dengan dokter spesialis hati untuk evaluasi lebih lanjut.";
            }

            // ---------------------------
            // 10. Spirometri
            if (isset($inputs['Spirometri']) && intval($inputs['Spirometri']) === 1) {
                $diagnoses[] = "Spirometri Abnormal";
                $recommendations[] = "\nSpirometri Abnormal :\nLakukan pemeriksaan paru lebih mendalam untuk mengetahui fungsi pernapasan.";
            }

            // ---------------------------
            // 11. Treadmil
            if (isset($inputs['Treadmil']) && intval($inputs['Treadmil']) === 1) {
                $diagnoses[] = "Treadmil Abnormal";
                $recommendations[] = "\nTreadmil Abnormal :\nKonsultasikan dengan dokter jantung untuk evaluasi lebih lanjut.";
            }

            // ---------------------------
            // 12. Audiometri
            if (isset($inputs['Audiometri']) && intval($inputs['Audiometri']) === 1) {
                $diagnoses[] = "Audiometri Abnormal";
                $recommendations[] = "\nAudiometri Abnormal :\nLakukan pemeriksaan pendengaran untuk evaluasi kondisi telinga.";
            }

            // ---------------------------
            // 13. Foto Thorax
            if (isset($inputs['foto_thorax']) && intval($inputs['foto_thorax']) === 1) {
                $diagnoses[] = "Foto Thorax Abnormal";
                $recommendations[] = "\nFoto Thorax Abnormal :\nLakukan pemeriksaan radiologi lanjutan untuk evaluasi paru-paru dan jantung.";
            }

            // ---------------------------
            // 14. Nadi (kali/menit)
            if (isset($inputs['Nadi(kali/menit)'])) {
                $nadi = floatval($inputs['Nadi(kali/menit)']);
                if ($nadi < 60) {
                    $diagnoses[] = "Nadi Rendah";
                    $recommendations[] = "\nNadi Rendah :\nPeriksa kemungkinan bradikardia dan evaluasi fungsi jantung.";
                } elseif ($nadi > 100) {
                    $diagnoses[] = "Nadi Tinggi";
                    $recommendations[] = "\nNadi Tinggi :\nPeriksa kemungkinan takikardia dan konsultasikan dengan dokter.";
                }
            }

            // ---------------------------
            // 15. Frekuensi Napas (kali/menit)
            if (isset($inputs['FrekuensiNapas(kali/menit)'])) {
                $napas = floatval($inputs['FrekuensiNapas(kali/menit)']);
                if ($napas < 12) {
                    $diagnoses[] = "Frekuensi Napas Rendah";
                    $recommendations[] = "\nFrekuensi Napas Rendah :\nEvaluasi fungsi paru-paru dan kondisi kesehatan secara umum.";
                } elseif ($napas > 20) {
                    $diagnoses[] = "Frekuensi Napas Tinggi";
                    $recommendations[] = "\nFrekuensi Napas Tinggi :\nPeriksa kemungkinan gangguan pernapasan atau kondisi stres.";
                }
            }

            // ---------------------------
            // 16. Tingkatan Kesadaran
            if (isset($inputs['Tingkatan_Kesadaran']) && intval($inputs['Tingkatan_Kesadaran']) !== 1) {
                $diagnoses[] = "Tingkatan Kesadaran Abnormal";
                $recommendations[] = "\nTingkatan Kesadaran Abnormal :\nSegera evaluasi kondisi neurologis dan lakukan pemeriksaan lebih lanjut.";
            }

            // ---------------------------
            // 17. Buta Warna
            if (isset($inputs['Buta_Warna']) && intval($inputs['Buta_Warna']) === 1) {
                $diagnoses[] = "Buta Warna";
                $recommendations[] = "\nButa Warna :\nLakukan pemeriksaan mata untuk evaluasi gangguan persepsi warna.";
            }

            // ---------------------------
            // 18. Jantung
            if (isset($inputs['Jantung']) && intval($inputs['Jantung']) === 1) {
                $diagnoses[] = "Jantung Abnormal";
                $recommendations[] = "\nJantung Abnormal :\nSegera periksa kondisi jantung ke dokter spesialis jantung.";
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
                        $recommendations[] = "\nHemoglobin Rendah :\nPerbanyak makanan kaya zat besi (daging merah tanpa lemak, hati, bayam, kacang-kacangan).\nTambahkan vitamin C (misalnya jeruk, paprika) untuk membantu penyerapan zat besi.\nPastikan pola makan seimbang dan istirahat yang cukup.";
                    } elseif ($hb > 16) {
                        $diagnoses[] = "Hemoglobin Tinggi";
                        $recommendations[] = "\nHemoglobin Tinggi :\nPeriksa kemungkinan dehidrasi atau kebiasaan merokok.\nPastikan hidrasi optimal (minimal 8 gelas air per hari).\nPeriksa ulang gaya hidup dan kebiasaan jika perlu.\nUlangi pemeriksaan jika ada gejala lain seperti pusing atau lelah.";
                    }
                } else { // Laki-laki
                    if ($hb < 13) {
                        $diagnoses[] = "Hemoglobin Rendah";
                        $recommendations[] = "\nHemoglobin Rendah :\nPerbanyak konsumsi makanan kaya zat besi (daging merah, hati, sayuran hijau).\nTambahkan vitamin C untuk mendukung penyerapan zat besi.\nPerhatikan asupan nutrisi secara keseluruhan.";
                    } elseif ($hb > 17) {
                        $diagnoses[] = "Hemoglobin Tinggi";
                        $recommendations[] = "\nHemoglobin Tinggi :\nPastikan cukup minum air.\nPeriksa ulang gaya hidup dan kebiasaan seperti merokok.\nAmati adanya gejala lain dan ulangi pemeriksaan bila perlu.";
                    }
                }
            }

            // ---------------------------
            // 20. Leukosit (normal 4000 - 11000 sel/µL)
            if (isset($inputs['leukosit'])) {
                $leukosit = floatval($inputs['leukosit']);
                if ($leukosit < 4000) {
                    $diagnoses[] = "Leukosit Rendah";
                    $recommendations[] = "\nLeukosit Rendah :\nIstirahat yang cukup dan perhatikan asupan nutrisi.\nHindari keramaian dan kontak dengan orang yang sakit.\nKonsumsi buah dan sayuran untuk mendukung sistem kekebalan.";
                } elseif ($leukosit > 11000) {
                    $diagnoses[] = "Leukosit Tinggi";
                    $recommendations[] = "\nLeukosit Tinggi :\nPerhatikan gejala seperti demam, nyeri, atau sakit tenggorokan.\nIstirahat yang cukup dan konsumsi makanan bergizi.\nKurangi stres dengan teknik relaksasi.";
                }
            }

            // ---------------------------
            // 21. Eritrosit (normal: Wanita 4 - 5 juta, Pria 4.5 - 5.5 juta sel/µL)
            if (isset($inputs['eritrosit'], $inputs['gender'])) {
                $eritrosit = floatval($inputs['eritrosit']);
                if ($inputs['gender'] == '2') {
                    if ($eritrosit < 4.0) {
                        $diagnoses[] = "Eritrosit Rendah";
                        $recommendations[] = "\nEritrosit Rendah :\nPerbanyak asupan zat besi dan vitamin B12.\nKonsumsi makanan seperti daging, telur, dan sayuran hijau.";
                    } elseif ($eritrosit > 5.0) {
                        $diagnoses[] = "Eritrosit Tinggi";
                        $recommendations[] = "\nEritrosit Tinggi :\nPastikan hidrasi optimal dengan minum cukup air.\nAmati kondisi tubuh secara keseluruhan.";
                    }
                } else {
                    if ($eritrosit < 4.5) {
                        $diagnoses[] = "Eritrosit Rendah";
                        $recommendations[] = "\nEritrosit Rendah :\nPastikan konsumsi makanan kaya zat besi dan vitamin B12.\nPerbanyak asupan protein dan nutrisi seimbang.";
                    } elseif ($eritrosit > 5.5) {
                        $diagnoses[] = "Eritrosit Tinggi";
                        $recommendations[] = "\nEritrosit Tinggi :\nPastikan Anda cukup terhidrasi.\nPerhatikan gejala lain dan ulangi pemeriksaan bila perlu.";
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
                        $recommendations[] = "\nLED Abnormal :\nPerbanyak konsumsi makanan anti-inflamasi (buah dan sayur segar).\nJaga pola hidup sehat dengan olahraga teratur dan istirahat cukup.";
                    }
                } else {
                    if ($led < 0 || $led > 15) {
                        $diagnoses[] = "LED Abnormal";
                        $recommendations[] = "\nLED Abnormal :\nKonsumsi makanan bergizi dan antioksidan tinggi.\nPastikan istirahat cukup dan hindari stres.";
                    }
                }
            }

            // ---------------------------
            // 23. Eosinofil (normal 0 - 1)
            if (isset($inputs['eosinofil'])) {
                $eos = floatval($inputs['eosinofil']);
                if ($eos < 0 || $eos > 1) {
                    $diagnoses[] = "Eosinofil Abnormal";
                    $recommendations[] = "\nEosinofil Abnormal :\nPerhatikan apakah ada pemicu alergi di lingkungan Anda.\nKonsumsi makanan tinggi antioksidan (buah beri, sayuran hijau).";
                }
            }

            // ---------------------------
            // 24. Basofil (normal 0 - 1)
            if (isset($inputs['basofil'])) {
                $baso = floatval($inputs['basofil']);
                if ($baso < 0 || $baso > 1) {
                    $diagnoses[] = "Basofil Abnormal";
                    $recommendations[] = "\nBasofil Abnormal :\nPerhatikan gejala lain (misalnya ruam atau demam ringan).\nPastikan asupan nutrisi dan hidrasi optimal.";
                }
            }

            // ---------------------------
            // 25. Neutrofil (normal 50 - 70%)
            if (isset($inputs['neutrofil'])) {
                $neutrofil = floatval($inputs['neutrofil']);
                if ($neutrofil < 50 || $neutrofil > 70) {
                    $diagnoses[] = "Neutrofil Abnormal";
                    $recommendations[] = "\nNeutrofil Abnormal :\nKonsumsi makanan bergizi untuk mendukung sistem kekebalan (misalnya buah dan sayuran).\nPastikan istirahat yang cukup dan kelola stres.";
                }
            }

            // ---------------------------
            // 26. Limfosit (normal 25 - 33%)
            if (isset($inputs['lymphosit'])) {
                $lymphosit = floatval($inputs['lymphosit']);
                if ($lymphosit < 25 || $lymphosit > 33) {
                    $diagnoses[] = "Limfosit Abnormal";
                    $recommendations[] = "\nLimfosit Abnormal :\nJaga pola makan seimbang dan kaya vitamin.\nHindari paparan infeksi dengan menjaga kebersihan diri.";
                }
            }

            // ---------------------------
            // 27. Monosit (normal 3 - 8%)
            if (isset($inputs['monosit'])) {
                $monosit = floatval($inputs['monosit']);
                if ($monosit < 3 || $monosit > 8) {
                    $diagnoses[] = "Monosit Abnormal";
                    $recommendations[] = "\nMonosit Abnormal :\nPerbanyak konsumsi makanan dengan kandungan anti-inflamasi (misalnya kunyit, jahe).\nPastikan hidrasi yang cukup.";
                }
            }

            // ---------------------------
            // 28. Trombosit (normal 150000 - 400000 sel/µL)
            if (isset($inputs['trombosit'])) {
                $trombosit = floatval($inputs['trombosit']);
                if ($trombosit < 150000) {
                    $diagnoses[] = "Trombosit Rendah";
                    $recommendations[] = "\nTrombosit Rendah :\nEvaluasi risiko perdarahan dan periksa fungsi sumsum tulang.";
                } elseif ($trombosit > 400000) {
                    $diagnoses[] = "Trombosit Tinggi";
                    $recommendations[] = "\nTrombosit Tinggi :\nPeriksa kemungkinan gangguan trombosit dan risiko pembekuan.";
                }
            }

            // ---------------------------
            // 29. Hematokrit (normal: Wanita 37-45%, Pria 40-50%)
            if (isset($inputs['hematokrit'], $inputs['gender'])) {
                $hematokrit = floatval($inputs['hematokrit']);
                if ($inputs['gender'] == '2') {
                    if ($hematokrit < 37) {
                        $diagnoses[] = "Hematokrit Rendah";
                        $recommendations[] = "\nHematokrit Rendah :\nPastikan asupan cairan yang cukup.\nPeriksa kemungkinan anemia.";
                    } elseif ($hematokrit > 45) {
                        $diagnoses[] = "Hematokrit Tinggi";
                        $recommendations[] = "\nHematokrit Tinggi :\nEvaluasi kemungkinan dehidrasi atau gangguan darah.";
                    }
                } else {
                    if ($hematokrit < 40) {
                        $diagnoses[] = "Hematokrit Rendah";
                        $recommendations[] = "\nHematokrit Rendah :\nPeriksa kemungkinan anemia dan konsultasikan dengan dokter.";
                    } elseif ($hematokrit > 50) {
                        $diagnoses[] = "Hematokrit Tinggi";
                        $recommendations[] = "\nHematokrit Tinggi :\nEvaluasi kemungkinan dehidrasi atau kelainan darah.";
                    }
                }
            }

            // ---------------------------
            // 30. MCV (normal 82 - 92 fL)
            if (isset($inputs['MCV'])) {
                $mcv = floatval($inputs['MCV']);
                if ($mcv < 82 || $mcv > 92) {
                    $diagnoses[] = "MCV Abnormal";
                    $recommendations[] = "\nMCV Abnormal :\nPerbanyak konsumsi vitamin B12 dan asam folat (daging, telur, sayuran hijau).\nPastikan pemeriksaan lanjutan jika gejala anemia muncul.";
                }
            }

            // ---------------------------
            // 31. SGOT (normal: Wanita ≤31 U/L, Pria ≤37 U/L)
            if (isset($inputs['SGOT'], $inputs['gender'])) {
                $sgot = floatval($inputs['SGOT']);
                if ($inputs['gender'] == '2') {
                    if ($sgot < 0 || $sgot > 31) {
                        $diagnoses[] = "SGOT Tinggi";
                        $recommendations[] = "\nSGOT Tinggi :\nHindari konsumsi alkohol dan makanan berminyak.\nPerbanyak konsumsi sayur dan buah segar untuk mendukung fungsi hati.";
                    }
                } else {
                    if ($sgot < 0 || $sgot > 37) {
                        $diagnoses[] = "SGOT Tinggi";
                        $recommendations[] = "\nSGOT Tinggi :\nBatasi konsumsi alkohol dan makanan berlemak.\nPerbanyak konsumsi makanan detoks (sayuran hijau, buah-buahan).";
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
                        $recommendations[] = "\nSGPT Tinggi :\nKurangi konsumsi alkohol dan makanan berat/berlemak.\nPerbanyak konsumsi sayuran dan buah segar.";
                    }
                } else {
                    if ($sgpt < 0 || $sgpt > 42) {
                        $diagnoses[] = "SGPT Tinggi";
                        $recommendations[] = "\nSGPT Tinggi :\nHindari makanan berlemak dan alkohol.\nPerbanyak konsumsi makanan yang mendukung detoksifikasi hati (sayur hijau, buah-buahan).";
                    }
                }
            }

            // ---------------------------
            // 33. BUN (normal 5 - 23.5 mg/dL)
            if (isset($inputs['BUN'])) {
                $bun = floatval($inputs['BUN']);
                if ($bun < 5 || $bun > 23.5) {
                    $diagnoses[] = "BUN Abnormal";
                    $recommendations[] = "\nBUN Abnormal :\nPastikan asupan cairan optimal.\nAtur asupan protein agar tidak berlebihan.";
                }
            }

            // ---------------------------
            // 34. Kreatinin (normal: Wanita 0.7-1.1 mg/dL, Pria 0.8-1.4 mg/dL)
            if (isset($inputs['kreatinin'], $inputs['gender'])) {
                $kreatinin = floatval($inputs['kreatinin']);
                if ($inputs['gender'] == '2') {
                    if ($kreatinin < 0.7 || $kreatinin > 1.1) {
                        $diagnoses[] = "Kreatinin Abnormal";
                        $recommendations[] = "\nKreatinin Abnormal :\nPastikan hidrasi yang cukup.\nKurangi asupan protein jika diperlukan.";
                    }
                } else {
                    if ($kreatinin < 0.8 || $kreatinin > 1.4) {
                        $diagnoses[] = "Kreatinin Abnormal";
                        $recommendations[] = "\nKreatinin Abnormal :\nPastikan asupan cairan optimal.\nPerhatikan asupan protein dan gaya hidup sehat.";
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
                        $recommendations[] = "\nAsam Urat Abnormal :\nHindari makanan tinggi purin (misal: daging merah, makanan laut).\nPerbanyak minum air putih.\nKonsumsi buah seperti ceri yang dapat membantu menurunkan asam urat.";
                    }
                } else {
                    if ($uric < 3.5 || $uric > 7.2) {
                        $diagnoses[] = "Asam Urat Abnormal";
                        $recommendations[] = "\nAsam Urat Abnormal :\nBatasi makanan tinggi purin dan konsumsi alkohol.\nPerbanyak asupan air putih.\nKonsumsi buah yang dapat membantu menurunkan asam urat (misal: ceri).";
                    }
                }
            }

            // ---------------------------
            // 36. Kolesterol Total (normal: <200 mg/dL)
            if (isset($inputs['kolestrol_total'])) {
                $kolTotal = floatval($inputs['kolestrol_total']);
                if ($kolTotal >= 200) {
                    $diagnoses[] = "Kolesterol Total Tinggi";
                    $recommendations[] = "\nKolesterol Total Tinggi :\nKurangi konsumsi makanan tinggi lemak jenuh (gorengan, makanan olahan).\nPerbanyak konsumsi serat (buah, sayur, gandum utuh).\nLakukan aktivitas fisik rutin.";
                }
            }

            // ---------------------------
            // 37. Trigliserida (normal: <200 mg/dL)
            if (isset($inputs['trigliserida'])) {
                $trigliserida = floatval($inputs['trigliserida']);
                if ($trigliserida >= 200) {
                    $diagnoses[] = "Trigliserida Tinggi";
                    $recommendations[] = "\nTrigliserida Tinggi :\nBatasi konsumsi gula dan karbohidrat sederhana.\nPerbanyak asupan asam lemak omega-3 (ikan salmon, kacang-kacangan).\nTingkatkan aktivitas fisik.";
                }
            }

            // ---------------------------
            // 38. Kolesterol HDL (direct) (normal: >35 mg/dL)
            if (isset($inputs['kolestrol_HDL_(direct)'])) {
                $hdl = floatval($inputs['kolestrol_HDL_(direct)']);
                if ($hdl <= 35) {
                    $diagnoses[] = "Kolesterol HDL Rendah";
                    $recommendations[] = "\nKolesterol HDL Rendah :\nPerbanyak olahraga aerobik (jalan cepat, bersepeda).\nKonsumsi lemak sehat (minyak zaitun, alpukat, kacang-kacangan).\nHindari lemak trans dan jenuh.";
                }
            }

            // ---------------------------
            // 39. Kolesterol LDL (direct) (normal: <115 mg/dL)
            if (isset($inputs['kolestrol_LDL_(direct)'])) {
                $ldl = floatval($inputs['kolestrol_LDL_(direct)']);
                if ($ldl >= 115) {
                    $diagnoses[] = "Kolesterol LDL Tinggi";
                    $recommendations[] = "\nKolesterol LDL Tinggi :\nKurangi konsumsi lemak jenuh.\nPerbanyak konsumsi serat dan lemak sehat.\nLakukan olahraga secara teratur.";
                }
            }

            // ---------------------------
            // 40. Gula Darah Puasa
            if (isset($inputs['gula_darah_puasa'])) {
                $gdp = floatval($inputs['gula_darah_puasa']);
                if ($gdp >= 126 && $gdp <= 200) {
                    $diagnoses[] = "Gula Darah Puasa Tidak Normal";
                    $recommendations[] = "\nGula Darah Puasa Tidak Normal :\nPerbaiki pola makan dan pantau kadar gula darah secara berkala.";
                } elseif ($gdp > 200) {
                    $diagnoses[] = "Gula Darah Puasa Sangat Tinggi";
                    $recommendations[] = "\nGula Darah Puasa Sangat Tinggi :\nSegera konsultasikan dengan dokter untuk evaluasi diabetes.";
                }
            }

            // ---------------------------
            // 41. Gula Darah 2 Jam PP
            if (isset($inputs['gula_darah_2_jam_pp'])) {
                $g2pp = floatval($inputs['gula_darah_2_jam_pp']);
                if ($g2pp >= 140 && $g2pp <= 200) {
                    $diagnoses[] = "Gula Darah 2 Jam PP Tidak Normal";
                    $recommendations[] = "\nGula Darah 2 Jam PP Tidak Normal :\nHindari konsumsi gula berlebih dan makanan dengan indeks glikemik tinggi.\nPerbanyak asupan serat dan protein berkualitas.\nLakukan aktivitas fisik secara rutin.";
                } elseif ($g2pp > 200) {
                    $diagnoses[] = "Gula Darah 2 Jam PP Sangat Tinggi";
                    $recommendations[] = "\nGula Darah 2 Jam PP Sangat Tinggi :\nSegera konsultasikan dengan dokter untuk evaluasi kondisi diabetes.";
                }
            }

            // ---------------------------
            // 42. Anti HBs (0 = negatif, abnormal)
            if (isset($inputs['anti_HBs']) && intval($inputs['anti_HBs']) === 0) {
                $diagnoses[] = "Anti HBs Negatif";
                $recommendations[] = "\nAnti HBs Negatif :\nKonsultasikan dengan dokter untuk pemeriksaan status hepatitis.";
            }

            // ---------------------------
            // 43. HBs Ag Kuantitatif (nilai selain 0 menunjukkan antigen)
            if (isset($inputs['HBs_Ag_Kuantitatif']) && intval($inputs['HBs_Ag_Kuantitatif']) !== 0) {
                $diagnoses[] = "HBs Ag Positif";
                $recommendations[] = "\nHBs Ag Positif :\nSegera evaluasi dan konsultasikan dengan dokter spesialis hati.";
            }

            // ---------------------------
            // 44. pH pada Urine (normal 5 - 8)
            if (isset($inputs['pH_pada_urine'])) {
                $ph = floatval($inputs['pH_pada_urine']);
                if ($ph < 5 || $ph > 8) {
                    $diagnoses[] = "pH Urine Abnormal";
                    $recommendations[] = "\npH Urine Abnormal :\nPastikan asupan cairan optimal.\nKonsumsi makanan seimbang.";
                }
            }

            // ---------------------------
            // 45. Berat Jenis pada Urine (normal 1.005 - 1.030)
            if (isset($inputs['berat_jenis_pada_urine'])) {
                $beratJenis = floatval($inputs['berat_jenis_pada_urine']);
                if ($beratJenis < 1.005 || $beratJenis > 1.030) {
                    $diagnoses[] = "Berat Jenis Urine Abnormal";
                    $recommendations[] = "\nBerat Jenis Urine Abnormal :\nPastikan asupan cairan cukup.\nPerhatikan asupan garam dan elektrolit.";
                }
            }

            // ---------------------------
            // 46. Nitrite pada Urine (0 = normal)
            if (isset($inputs['nitrite_pada_urine']) && intval($inputs['nitrite_pada_urine']) !== 0) {
                $diagnoses[] = "Nitrit pada Urine Positif";
                $recommendations[] = "\nNitrit pada Urine Positif :\nPeriksa kemungkinan infeksi saluran kemih.";
            }

            // ---------------------------
            // 47. Protein pada Urine (jika bukan 0)
            if (isset($inputs['protein_pada_urine']) && intval($inputs['protein_pada_urine']) !== 0) {
                $diagnoses[] = "Protein pada Urine Positif";
                $recommendations[] = "\nProtein pada Urine Positif :\nEvaluasi fungsi ginjal dan kemungkinan adanya proteinuria.";
            }

            // ---------------------------
            // 48. Reduksi pada Urine (jika bukan 0)
            if (isset($inputs['reduksi_pada_urine']) && intval($inputs['reduksi_pada_urine']) !== 0) {
                $diagnoses[] = "Reduksi pada Urine Abnormal";
                $recommendations[] = "\nReduksi pada Urine Abnormal :\nPeriksa kondisi metabolisme urine dan konsultasikan dengan dokter.";
            }

            // ---------------------------
            // 49. Ketone pada Urine (jika bukan 0)
            if (isset($inputs['ketone_pada_urine']) && intval($inputs['ketone_pada_urine']) !== 0) {
                $diagnoses[] = "Ketone pada Urine Positif";
                $recommendations[] = "\nKetone pada Urine Positif :\nEvaluasi kemungkinan ketoasidosis, terutama pada penderita diabetes.";
            }

            // ---------------------------
            // 50. Urobilinogen pada Urine (nilai selain 0 abnormal)
            if (isset($inputs['urobilinogen_pada_urine']) && intval($inputs['urobilinogen_pada_urine']) !== 0) {
                $diagnoses[] = "Urobilinogen pada Urine Abnormal";
                $recommendations[] = "\nUrobilinogen pada Urine Abnormal :\nEvaluasi fungsi hati dan ginjal lebih lanjut.";
            }

            // ---------------------------
            // 51. Bilirubin pada Urine (jika bukan 0)
            if (isset($inputs['billirubin_pada_urine']) && intval($inputs['billirubin_pada_urine']) !== 0) {
                $diagnoses[] = "Bilirubin pada Urine Positif";
                $recommendations[] = "\nBilirubin pada Urine Positif :\nSegera periksa fungsi hati dan konsultasikan dengan dokter.";
            }

            // ---------------------------
            // 52. Eritrosit pada Urine (normal 0 - 2)
            if (isset($inputs['eritrosit_pada_urine'])) {
                $eritUrine = floatval($inputs['eritrosit_pada_urine']);
                if ($eritUrine < 0 || $eritUrine > 2) {
                    $diagnoses[] = "Eritrosit pada Urine Abnormal";
                    $recommendations[] = "\nEritrosit pada Urine Abnormal :\nEvaluasi kemungkinan infeksi atau kerusakan ginjal.";
                }
            }

            // ---------------------------
            // 53. Lekosit pada Urine (normal 0 - 5)
            if (isset($inputs['lekosit_pada_urine'])) {
                $lekUrine = floatval($inputs['lekosit_pada_urine']);
                if ($lekUrine < 0 || $lekUrine > 5) {
                    $diagnoses[] = "Lekosit pada Urine Abnormal";
                    $recommendations[] = "\nLekosit pada Urine Abnormal :\nPeriksa kemungkinan infeksi saluran kemih.";
                }
            }

            // ---------------------------
            // 54. Silinder pada Urine (jika bukan 0)
            if (isset($inputs['silinder_pada_urine']) && intval($inputs['silinder_pada_urine']) !== 0) {
                $diagnoses[] = "Silinder pada Urine Abnormal";
                $recommendations[] = "\nSilinder pada Urine Abnormal :\nEvaluasi kondisi ginjal dengan pemeriksaan lanjutan.";
            }

            // ---------------------------
            // 55. Kristal pada Urine (jika bukan 0)
            if (isset($inputs['kristal_pada_urine']) && intval($inputs['kristal_pada_urine']) !== 0) {
                $diagnoses[] = "Kristal pada Urine Abnormal";
                $recommendations[] = "\nKristal pada Urine Abnormal :\nPeriksa kemungkinan pembentukan batu ginjal atau gangguan metabolisme.";
            }

            // ---------------------------
            // 56. Yeast pada Urine (jika bukan 0)
            if (isset($inputs['yeast_pada_urine']) && intval($inputs['yeast_pada_urine']) !== 0) {
                $diagnoses[] = "Yeast pada Urine Positif";
                $recommendations[] = "\nYeast pada Urine Positif :\nEvaluasi kemungkinan infeksi jamur pada saluran kemih.";
            }

            // ---------------------------
            // 57. Bakteri pada Urine (jika bukan 0)
            if (isset($inputs['bakteri_pada_urine']) && intval($inputs['bakteri_pada_urine']) !== 0) {
                $diagnoses[] = "Bakteri pada Urine Terdeteksi";
                $recommendations[] = "\nBakteri pada Urine Terdeteksi :\nSegera konsultasikan dengan dokter untuk evaluasi infeksi saluran kemih.";
            }
            // ---------------------------
            // Gabungkan diagnosis dan rekomendasi
            if (empty($diagnoses)) {
                $diagnosisMessage = "Semua parameter dalam batas normal.";
                $recommendationMessage = "Tidak ada rekomendasi khusus.";
            } else {
                $diagnosisMessage = "{ -- Diagnosa -- }\n" . implode(", ", $diagnoses);
                $recommendationMessage = "{ -- Rekomendasi medis -- }" . implode(" ", $recommendations);
            }

            // Jika diperlukan, simpan hasil diagnosis dan rekomendasi ke database.
            // Contoh:
            // $hasilPemeriksaan->diagnosis = $diagnosisMessage;
            // $hasilPemeriksaan->rekomendasi = $recommendationMessage;
            // $hasilPemeriksaan->save();

            $finalMessage = $diagnosisMessage . "\n\n----------------------------------------------------------------------------\n\n" . $recommendationMessage;
            return redirect()->back()->with('successrekom', $finalMessage);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
