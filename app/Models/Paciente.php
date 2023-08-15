<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    static $rules= [
        'cedula' => 'required|unique:pacientes',
        'nombres' => 'required',
        'apellidos' => 'required',
        'fecha_nacimiento' => 'required',
        'edad' => 'required',
        'sexo' => 'required',
        'telefono' => '',
        'direccion' => '',
        'correo' => '',
        'observacion' => '',
        'status' => '',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function resultados()
    {
        return $this->hasMany(Resultados::class);
    }

}
