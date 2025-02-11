<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekomendasiMedisTable extends Migration
{
    public function up()
    {
        Schema::create('rekomendasi_medis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hasil_pemeriksaan_id');
            $table->text('diagnosis');
            $table->text('rekomendasi');
            $table->timestamps();

            $table->foreign('hasil_pemeriksaan_id')->references('id')->on('hasil_pemeriksaan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rekomendasi_medis');
    }
}
