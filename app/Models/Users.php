<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable
{
    use Notifiable;

    protected $table = 'users'; // Nama tabel
    protected $primaryKey = 'id_user'; // Primary key
    public $incrementing = false; // Nonaktifkan auto-increment
    protected $keyType = 'integer'; // Tipe data ID adalah integer

    protected $fillable = [
        'nama', 'role', 'username', 'password', 'email', 'no_hp', 'status',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Tambahkan logic boot untuk menentukan ID berdasarkan role
    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            // Jika ID belum diisi
            if (!$user->id_user) {
                switch ($user->role) {
                    case 'admin':
                        // ID dimulai dari 100 untuk admin
                        $lastId = Users::where('role', 'admin')->max('id_user') ?? 99;
                        $user->id_user = $lastId + 1;
                        break;

                    case 'perawat':
                        // ID dimulai dari 500 untuk perawat
                        $lastId = Users::where('role', 'perawat')->max('id_user') ?? 499;
                        $user->id_user = $lastId + 1;
                        break;

                    case 'dokter':
                        // ID dimulai dari 1000 untuk dokter
                        $lastId = Users::where('role', 'dokter')->max('id_user') ?? 999;
                        $user->id_user = $lastId + 1;
                        break;

                    default:
                        throw new \Exception("Role tidak valid");
                }

                // Pastikan ID yang dihasilkan tidak ada yang duplikat
                while (Users::where('id_user', $user->id_user)->exists()) {
                    $user->id_user++; // Jika ada, tambahkan satu lagi pada ID yang dihasilkan
                }
            }
        });
    }


    public function pasien()
    {
        return $this->hasMany(Pasien::class, 'id_perawat', 'id_user');
    }
}
