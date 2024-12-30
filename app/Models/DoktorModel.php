<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DoktorModel extends Model
{
    protected $table = 'dokter';

    protected $fillable = [
        'dokter', 'gambar', 'lulusan', 'tahun_lulus', 'spesialis_id'
    ];

    public $timestamps = true;

    public function spesialis(): HasOne
    {
        return $this->hasOne(SpesialisModel::class, 'id', 'spesialis_id');
    }

}
