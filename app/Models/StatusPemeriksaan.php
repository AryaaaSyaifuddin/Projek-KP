<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPemeriksaan extends Model
{
    use HasFactory;

    protected $table = 'status_pemeriksaan';
    protected $fillable = ['id_hasil_pemeriksaan', 'status'];

    // Relasi ke tabel hasil_pemeriksaan
    // StatusPemeriksaan.php
    public function hasilPemeriksaan()
    {
        return $this->belongsTo(HasilPemeriksaan::class, 'id_hasil_pemeriksaan');
    }

    
}
