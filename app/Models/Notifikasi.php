<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notifikasi extends Model
{
    use HasFactory;

    protected $table = 'notifikasis'; // pastikan nama tabel sesuai migrasi

    protected $fillable = [
        'title',
        'message',
        'is_read',
        'id_pengajuan',
        'id_guru',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'id_pengajuan');
    }
}