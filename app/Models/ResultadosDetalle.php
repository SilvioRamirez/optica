<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResultadosDetalle extends Model
{
    use HasFactory, SoftDeletes;

    public function caracteristicas()
    {
        return $this->belongsTo(Caracteristicas::class);
    }

    /* Mucho a muchos */
    public function resultados()
    {
        return $this->belongsToMany(Resultados::class, 'resultados_resultados_detalle');
    }
}
