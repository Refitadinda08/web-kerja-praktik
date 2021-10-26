<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pasien extends Authenticatable
{
    use HasApiTokens, Notifiable;
    
    protected $fillable = [
        'nama_pasien',
        'email',
        'password',
        'alamat_pasien',
        'umur_pasien',
    ];
}
