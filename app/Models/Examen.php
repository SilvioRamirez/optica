<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Examen extends Model
{
    use HasFactory, SoftDeletes;

    static $rules= [
        'nombre' => 'required|unique:examens',
        'status' => ''
    ];

    protected $guarded = [];

    protected $casts = [
        'status' => 'boolean',
    ];


    /* En pruebas */
    public function caracteristicas(): HasMany
    {
        return $this->hasMany(Caracteristicas::class);
    }
}
