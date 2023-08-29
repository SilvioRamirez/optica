<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cola extends Model
{
    use HasFactory;

    //Relationships Many to Many
    public function resultados(){
        return $this->belongsToMany(Resultados::class, 'cola_resultado');
    }
}
