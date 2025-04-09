<?php

namespace App\Models;

use App\Models\User;
use App\Models\Lokal;
use App\Models\Jurusan;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    // Specify the table name if it's not the plural form of the model name
    protected $table = 'siswas';

    // Specify the primary key if it's not 'id'
    protected $primaryKey = 'id';

    // Allow mass assignment for specific fields
    protected $fillable = [
        'id_jurusan',
        'nama',
        'nisn',
        'jk',
        'no_hp',
        'alamat',
        'username',
        'password',
        'nohp_walimurid',
        'nama_walimurid',
        'id_kelas',
        'id_user',
    ];
    // Disable timestamps if the table doesn't have 'created_at' and 'updated_at' columns
    public $timestamps = false;

    public function jurusan()
{
    return $this->belongsTo(Jurusan::class, 'id_jurusan');
}

public function kelas()
{
    return $this->belongsTo(Lokal::class, 'id_kelas');
}

public function user()
{
    return $this->belongsTo(User::class, 'id_user');
}
}