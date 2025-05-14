<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = [
        'nama',
        'username',
        'nip',
        'mata_pelajaran',
        'password',
        'id_user',
    ];
}
