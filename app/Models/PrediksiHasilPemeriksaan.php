<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrediksiHasilPemeriksaan extends Model
{
    use HasFactory;

    protected $table = 'prediksi_hasil_pemeriksaan';

    protected $fillable = [
        'id_rekammedis',
        'hasil_pemeriksaan',
    ];

    public function rekamMedis()
    {
        return $this->belongsTo(HasilPemeriksaan::class, 'id_rekammedis');
    }
}
