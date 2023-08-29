<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resultados extends Model
{
    use HasFactory, SoftDeletes;

    /* Muchos a muchos */
    public function resultadosDetalle()
    {
        return $this->belongsToMany(ResultadosDetalle::class, 'resultados_resultados_detalle');
    }

    public function bioanalista()
    {
        return $this->belongsTo(Bioanalista::class);
    }

    public function muestra()
    {
        return $this->belongsTo(Muestra::class);
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function examen()
    {
        return $this->belongsTo(Examen::class);
    }

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format('d-m-Y');
    }

    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])->format('d-m-Y');
    }

    //Relationships Many to Many
    public function colas(){
        return $this->belongsToMany(Cola::class, 'cola_resultado');
    }
}