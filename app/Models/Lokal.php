<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokal extends Model
{
    use HasFactory;

    protected $table = 'lokals'; // Nama tabel di database
    protected $fillable = ['nama_kelas']; // Kolom yang dapat diisi
}
