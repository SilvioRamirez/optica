<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ColaResultados extends Model
{
    use HasFactory, SoftDeletes;

    /* Mucho a muchos */
    public function cola()
    {
        return $this->belongsToMany(Cola::class, 'cola_resultado');
    }
}
