<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminPengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';  // Menyebutkan tabel yang sudah ada
    protected $fillable = [
        'judul', 'deskripsi', 'status', 'kategori', 'lokasi', 'gambar', 'user_id'
    ];
}
