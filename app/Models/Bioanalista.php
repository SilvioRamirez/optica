<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bioanalista extends Model
{
    use HasFactory, SoftDeletes;

    static $rules= [
        'cedula' => 'required|unique:bioanalistas',
        'nombres' => 'required',
        'apellidos' => 'required',
        'direccion' => 'required',
        'telefono' => 'required',
        'fecha_nacimiento' => 'required',
        'colegio' => 'required',
        'documento' => 'required',
        'fecha_ingreso' => 'required',
        'expediente' => '',
        'status' => '',
    ];

    protected $guarded = [];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format('d-m-Y');
    }

    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])->format('d-m-Y');
    }
}
