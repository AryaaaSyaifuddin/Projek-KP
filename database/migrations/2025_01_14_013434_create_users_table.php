<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
                $table->id('id_user');
                $table->string('nama');
                $table->string('role');
                $table->string('username')->unique();
                $table->string('password');
                $table->string('email')->unique();
                $table->string('no_hp');
                $table->enum('status', ['sudah diverifikasi', 'belum diverifikasi'])->default('belum diverifikasi');
                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists('users');
        }

};
