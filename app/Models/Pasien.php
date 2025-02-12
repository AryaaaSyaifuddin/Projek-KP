<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien'; // Nama tabel pasien
    protected $primaryKey = 'id_pasien';

    protected $fillable = [
        'nama_panjang',
        'tanggal_lahir',
        'jenis_kelamin',
        'nomor_hp',
        'email',
        'pekerjaan',
        'alamat',
        'nomor_identitas',
        'id_perawat',
        'id_dokter', // Kolom baru untuk dokter
        'tanggal_pemeriksaan',
        'waktu_pemeriksaan',
    ];

    /**
     * Relasi ke model Users (perawat).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function perawat()
    {
        return $this->belongsTo(Users::class, 'id_perawat', 'id_user');
    }

    /**
     * Relasi ke model Users (dokter).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dokter()
    {
        return $this->belongsTo(Users::class, 'id_dokter', 'id_user');
    }

    public function hasilPemeriksaan()
    {
        return $this->hasOne(HasilPemeriksaan::class, 'id_pasien');
    }


}
