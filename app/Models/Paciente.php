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
        'estado' => '',
        'municipio' => '',
        'parroquia' => '',
        'sector' => '',
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

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format('d-m-Y');
    }

    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])->format('d-m-Y');
    }

    /* public function getFechaNacimientoAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['fecha_nacimiento'])->format('d-m-Y');
    } */

    /* public function getAgeAttribute()
    {
	
        $nacimiento = $this->attributes['fecha_nacimiento'].' 00:00:00';

        $actual = \Carbon\Carbon::now();

        return $actual->diffForHumans($nacimiento, $actual);

    } */

}
