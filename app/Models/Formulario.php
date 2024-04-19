<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class Formulario extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    /**
     * Implementa el registro de Logs
     *
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    protected $guarded = [];

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format('Y-m-d h:m:s');
        /* return \Carbon\Carbon::parse($this->attributes['created_at'])->diffForHumans(now()); */

        /* return \Carbon\Carbon::parse($this->attributes['created_at'])->diffInDays(now(), 2); */

    }

    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])->format('Y-m-d h:m:s');
    }

    /* public function getFechaAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['fecha'])->diffInDays(now(), 2);
    } */

    /* public function Days()
    {
        return \Carbon\Carbon::parse($this->attributes['fecha'])->diffInDays(now(), 2);
    } */
    
    public function tipoLente()
    {
        return $this->belongsTo(TipoLente::class, 'tipo');
    }

    public function tipoTratamiento()
    {
        return $this->belongsTo(TipoTratamiento::class, 'tipo_tratamiento_id');
    }
}
