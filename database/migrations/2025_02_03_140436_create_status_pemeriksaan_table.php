<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusPemeriksaanTable extends Migration
{
    public function up(): void
    {
        Schema::create('status_pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_hasil_pemeriksaan'); // Foreign key ke tabel hasil_pemeriksaan
            $table->string('status'); // Contoh: 'Menunggu', 'Selesai', 'Ditolak'
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('id_hasil_pemeriksaan')->references('id')->on('hasil_pemeriksaan')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('status_pemeriksaan');
    }
}
