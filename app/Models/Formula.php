<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formula extends Model
{
    use HasFactory;

    /*
    * Los lentes que pertenecen al paciente.
    */
    public function lentes()
    {
        return $this->belongsToMany(Lente::class, 'formula_lente');
    }
}
