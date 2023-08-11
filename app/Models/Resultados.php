<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultados extends Model
{
    use HasFactory;

    public function resultadosDetalle()
    {
        return $this->belongsToMany(ResultadosDetalle::class);
    } 

    public function bioanalista()
    {
        return $this->belongsTo(Bioanalista::class);
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function examen()
    {
        return $this->belongsTo(Examen::class);
    }
}