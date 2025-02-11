<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilPemeriksaan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hasil_pemeriksaan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_pasien',
        'gender',
        'height',
        'weight',
        'Sistolik',
        'Diastolik',
        'Age',
        'BMI',
        'BMICat',
        'Hipertensi_Kategori',
        'tuberkulosis',
        'penyakit_jantung',
        'hipertensi',
        'diabetes_melitus',
        'gangguan_jiwa',
        'trauma_pada_kepala',
        'hepatitis',
        'Spirometri',
        'Treadmil',
        'Audiometri',
        'foto_thorax',
        'Nadi(kali/menit)',
        'FrekuensiNapas(kali/menit)',
        'Tingkatan_Kesadaran',
        'Buta_Warna',
        'Jantung',
        'hemoglobin',
        'leukosit',
        'eritrosit',
        'LED',
        'eosinofil',
        'basofil',
        'neutrofil',
        'lymphosit',
        'monosit',
        'trombosit',
        'hematokrit',
        'MCV',
        'SGOT',
        'SGPT',
        'BUN',
        'kreatinin',
        'asam_urat',
        'kolestrol_total',
        'trigliserida',
        'kolestrol_HDL_(direct)',
        'kolestrol_LDL_(direct)',
        'gula_darah_puasa',
        'gula_darah_2_jam_pp',
        'anti_HBs',
        'HBs_Ag_Kuantitatif',
        'pH_pada_urine',
        'berat_jenis_pada_urine',
        'nitrite_pada_urine',
        'protein_pada_urine',
        'reduksi_pada_urine',
        'ketone_pada_urine',
        'urobilinogen_pada_urine',
        'billirubin_pada_urine',
        'eritrosit_pada_urine',
        'lekosit_pada_urine',
        'silinder_pada_urine',
        'kristal_pada_urine',
        'yeast_pada_urine',
        'bakteri_pada_urine',
    ];
    /**
     * Get the patient associated with the medical record.
     */
    public function patient()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }

        public function statusPemeriksaan()
    {
        return $this->hasOne(StatusPemeriksaan::class, 'id_hasil_pemeriksaan');
    }

    public function prediksi()
    {
        return $this->hasOne(PrediksiHasilPemeriksaan::class, 'id_rekammedis');
    }

    public function rekomMedis()
    {
        return $this->hasOne(RekomendasiMedis::class, 'hasil_pemeriksaan_id');
    }
}
