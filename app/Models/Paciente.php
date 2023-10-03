<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Paciente extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    /**
     * Implementa el registro de Logs
     *
     * @var array<int, string>
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
    
    protected $guarded = [];

    static $rules= [
        'cedula' => 'required|unique:pacientes',
        'cedula'    => 'sometimes|required|unique:pacientes,cedula',
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

    /**
     * Los lentes que pertenecen al paciente.
     */
    public function lentes()
    {
        return $this->belongsToMany(Lente::class, 'lente_paciente');
    }

    public function direccion()
    {
        return $this->hasOne(Direccion::class);
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
