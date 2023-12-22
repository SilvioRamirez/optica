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
        'unidad' => 'boolean',
        'ref_inferior' => 'boolean',
        'ref_superior' => 'boolean',
    ];


    /* En pruebas */
    public function caracteristicas(): HasMany
    {
        return $this->hasMany(Caracteristicas::class);
    }

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format('d-m-Y');
    }

    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])->format('d-m-Y');
    }
}
