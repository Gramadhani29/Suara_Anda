<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PsikologModel extends Model
{
    protected $table = 'psikolog';

    protected $fillable = [
        'psikolog', 'gambar', 'lulusan', 'tahun_lulus', 'spesialis_id'
    ];

    public $timestamps = true;

    public function spesialis(): HasOne
    {
        return $this->hasOne(SpesialisModel::class, 'id', 'spesialis_id');
    }


    public function jadwal(): HasMany
    {
        return $this->hasMany(JadwalModel::class, 'psikolog_id', 'id');
    }
}
