<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
     public function up(): void
    {
        Schema::create('hasil_pemeriksaan', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->unsignedBigInteger('id_pasien'); // Foreign Key untuk pasien
            $table->integer('gender'); // Jenis kelamin
            $table->float('height'); // Tinggi badan
            $table->float('weight'); // Berat badan
            $table->integer('Sistolik'); // Tekanan darah sistolik
            $table->integer('Diastolik'); // Tekanan darah diastolik
            $table->integer('Age'); // Usia
            $table->float('BMI'); // Body Mass Index
            $table->integer('BMICat'); // Kategori BMI
            $table->integer('Hipertensi_Kategori'); // Kategori hipertensi
            $table->integer('tuberkulosis'); // Riwayat tuberkulosis
            $table->integer('penyakit_jantung'); // Riwayat penyakit jantung
            $table->integer('hipertensi'); // Riwayat hipertensi
            $table->integer('diabetes_melitus'); // Riwayat diabetes
            $table->integer('gangguan_jiwa'); // Riwayat gangguan jiwa
            $table->integer('trauma_pada_kepala'); // Riwayat trauma kepala
            $table->integer('hepatitis'); // Riwayat hepatitis
            $table->integer('Spirometri'); // Nilai spirometri
            $table->integer('Treadmil'); // Hasil treadmil
            $table->integer('Audiometri'); // Hasil audiometri
            $table->integer('foto_thorax'); // Hasil foto thorax
            $table->integer('Nadi(kali/menit)'); // Frekuensi nadi
            $table->integer('FrekuensiNapas(kali/menit)'); // Frekuensi napas
            $table->integer('Tingkatan_Kesadaran'); // Tingkat kesadaran
            $table->integer('Buta_Warna'); // Tes buta warna
            $table->integer('Jantung'); // Kondisi jantung
            $table->float('hemoglobin'); // Kadar hemoglobin
            $table->float('leukosit'); // Jumlah leukosit
            $table->float('eritrosit'); // Jumlah eritrosit
            $table->float('LED'); // LED
            $table->float('eosinofil'); // Jumlah eosinofil
            $table->float('basofil'); // Jumlah basofil
            $table->float('neutrofil'); // Jumlah neutrofil
            $table->float('lymphosit'); // Jumlah limfosit
            $table->float('monosit'); // Jumlah monosit
            $table->float('trombosit'); // Jumlah trombosit
            $table->float('hematokrit'); // Hematokrit
            $table->float('MCV'); // Mean Corpuscular Volume
            $table->float('SGOT'); // SGOT
            $table->float('SGPT'); // SGPT
            $table->float('BUN'); // Blood Urea Nitrogen
            $table->float('kreatinin'); // Kadar kreatinin
            $table->float('asam_urat'); // Kadar asam urat
            $table->float('kolestrol_total'); // Kolesterol total
            $table->float('trigliserida'); // Trigliserida
            $table->float('kolestrol_HDL_(direct)'); // Kolesterol HDL
            $table->float('kolestrol_LDL_(direct)'); // Kolesterol LDL
            $table->integer('anti_HBs'); // HBsAg Kuantitatif
            $table->integer('HBs_Ag_Kuantitatif'); // HBsAg Kuantitatif
            $table->float('pH_pada_urine'); // pH urine
            $table->integer('nitrite_pada_urine'); // Nitrit pada urine
            $table->integer('protein_pada_urine'); // Protein pada urine
            $table->integer('reduksi_pada_urine'); // Reduksi pada urine
            $table->integer('ketone_pada_urine'); // Keton pada urine
            $table->integer('urobilinogen_pada_urine'); // Urobilinogen pada urine
            $table->integer('billirubin_pada_urine'); // Bilirubin pada urine
            $table->integer('silinder_pada_urine'); // Silinder pada urine
            $table->integer('kristal_pada_urine'); // Kristal pada urine
            $table->integer('yeast_pada_urine'); // Jamur pada urine
            $table->integer('bakteri_pada_urine'); // Bakteri pada urine
            $table->float('berat_jenis_pada_urine'); // Berat jenis urine
            $table->float('eritrosit_pada_urine'); // Eritrosit pada urine
            $table->float('lekosit_pada_urine'); // Leukosit pada urine
            $table->float('gula_darah_puasa'); // Gula darah puasa
            $table->float('gula_darah_2_jam_pp'); // Gula darah 2 jam pp
            $table->timestamps(); // created_at dan updated_at

            // Foreign key constraint
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_pemeriksaan');
    }
};
