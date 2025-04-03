<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Operativo extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    /**
     * Implementa el registro de Logs
     *
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()
            ->logOnlyDirty()
            ->setDescriptionForEvent(fn(string $eventName) => "Este modelo ha sido {$eventName}")
            ->dontSubmitEmptyLogs();
    }

    protected $guarded = [];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    /* Se coloca primero el id asociado q contiene Operativo y luego en que id se asocia en la tabla municipio */
    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id', 'id_municipio');
    }

    public function parroquia()
    {
        return $this->belongsTo(Parroquia::class);
    }

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format('Y-m-d h:m:s');
    }

    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])->format('Y-m-d h:m:s');
    }

    public function formularios()
    {
        return $this->hasMany(Formulario::class);
    }

    public function refractantes()
    {
        return $this->hasMany(Refractante::class);
    }

    public function gastos()
    {
        return $this->hasMany(GastoOperativo::class);
    }

    public function asesores()
    {
        return $this->belongsToMany(Persona::class, 'asesor_operativo')
            ->withPivot('rol')
            ->withTimestamps();
    }

    /* public function personas()
    {
        return $this->hasMany(Persona::class);
    } */
}
