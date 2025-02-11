<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekomendasiMedis extends Model
{
    use HasFactory;

    protected $table = 'rekomendasi_medis';

    protected $fillable = [
        'hasil_pemeriksaan_id',
        'diagnosis',
        'rekomendasi',
    ];

    public function hasilPemeriksaan()
    {
        return $this->belongsTo(HasilPemeriksaan::class, 'hasil_pemeriksaan_id');
    }
}
