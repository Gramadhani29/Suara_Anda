<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpesialisModel extends Model
{
    protected $table = 'spesialis';

    protected $fillable = [
        'spesialis',
    ];

    public $timestamps = true;
}
