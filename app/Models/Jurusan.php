<?php

namespace App\Models;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $fillable = ['nama_jurusan', 'kode_jurusan'];
    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
