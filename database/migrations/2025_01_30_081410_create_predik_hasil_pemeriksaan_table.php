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
        Schema::create('prediksi_hasil_pemeriksaan', function (Blueprint $table) {
            $table->id(); // Kolom id (primary key, auto-increment)
            $table->unsignedBigInteger('id_rekammedis'); // Kolom id_rekammedis (foreign key)
            $table->string('hasil_pemeriksaan'); // Kolom hasil_prediksi
            $table->timestamps(); // Kolom created_at dan updated_at

            // Foreign key constraint
            $table->foreign('id_rekammedis')->references('id')->on('hasil_pemeriksaan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prediksi_hasil_pemeriksaan');
    }
};
