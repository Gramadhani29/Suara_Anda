<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class BookingModel extends Model
{
    protected $table = 'booking';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'tanggal',
        'jadwal_id',
        'psikolog_id',
        'user_id',
    ];

    public $timestamps = true;

    public function psikolog(): BelongsTo
    {
        return $this->belongsTo(PsikologModel::class);
    }

    public function jadwal(): BelongsTo
    {
        return $this->belongsTo(JadwalModel::class);
    }
}
