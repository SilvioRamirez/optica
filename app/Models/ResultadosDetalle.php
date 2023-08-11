<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultadosDetalle extends Model
{
    use HasFactory;

    public function caracteristicas()
    {
        return $this->belongsTo(Caracteristicas::class);
    }
}
