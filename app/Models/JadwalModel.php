<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalModel extends Model
{
    protected $table = 'jadwal';

    protected $fillable = [
        'psikolog_id',
        'hari',
        'jam_mulai',
        'jam_selesai',
    ];

}
