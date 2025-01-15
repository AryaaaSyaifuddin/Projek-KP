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
    ];

    // Relasi ke model User
    public function perawat()
    {
        return $this->belongsTo(Users::class, 'id_perawat', 'id_user');
    }
}
