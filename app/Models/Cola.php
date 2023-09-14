<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cola extends Model
{
    use HasFactory, SoftDeletes;

    //Relationships Many to Many
    public function resultados(){
        return $this->belongsToMany(Resultados::class, 'cola_resultado');
    }
}
