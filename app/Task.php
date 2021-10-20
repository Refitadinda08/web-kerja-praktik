<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = [
        'id_pasien',
        'nama_pasien',
        'alamat_pasien',
    ];
}
