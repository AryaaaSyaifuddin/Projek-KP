<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'nama', 'role', 'username', 'password', 'email', 'no_hp', 'status',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];
}
