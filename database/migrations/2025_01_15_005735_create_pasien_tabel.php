<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_pasien_table.php
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->id('id_pasien');
            $table->string('nama_panjang');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('nomor_hp');
            $table->string('email')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('nomor_identitas');
            $table->unsignedBigInteger('id_perawat'); // Relasi ke perawat
            $table->unsignedBigInteger('id_dokter'); // Relasi ke dokter
            $table->date('tanggal_pemeriksaan');
            $table->time('waktu_pemeriksaan');
            $table->foreign('id_perawat')->references('id_user')->on('users')->onDelete('cascade'); // Foreign key ke kolom id_user untuk perawat
            $table->foreign('id_dokter')->references('id_user')->on('users')->onDelete('cascade'); // Foreign key ke kolom id_user untuk dokter
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};
