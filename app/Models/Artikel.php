<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;  // Tambahkan baris ini

class Artikel extends Model
{
    use HasFactory;
    protected $table = 'artikel';
    protected $fillable = [
        'judul',
        'isi',
        'gambar',
    ];
}
