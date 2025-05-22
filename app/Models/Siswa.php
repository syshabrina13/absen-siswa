<?php

namespace App\Models;

use App\Models\User;
use App\Models\Lokal;
use App\Models\Jurusan;
use App\Models\Mengabsen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswas';

    protected $fillable = ['nama', 'nisn', 'alamat', 'jk',  'nohp', 'username', 'password', 'nohp_wm', 'nama_wm', 'alamat_wm','status', 'id_lokal', 'id_user'];


    public function lokal()
    {
        return $this->belongsTo(Lokal::class, 'id_lokal');
    }
    
    public function siswaCollection()
    {
        return $this->hasMany(Siswa::class, 'id_user');
    }
    protected $hidden = ['password'];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function mengabsen()
    {
        return $this->hasMany(Mengabsen::class, 'id_siswa');
    }

    public function absensis()
    {
        return $this->hasMany(Mengabsen::class, 'id_siswa');
    }
}