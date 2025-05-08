<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Pago extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;
    
    /**
     * Implementa el registro de Logs
     *
     * @var array<int, string>
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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (Auth::check()) {
                $model->created_by = Auth::user()->name;
            }
        });

        static::updating(function ($model) {
            if (Auth::check()) {
                $model->updated_by = Auth::user()->name;
            }
        });
    }


    public function formulario()
    {
        return $this->belongsTo(Formulario::class);
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }

    /**
     * Los pacientes que pertenecen a los lentes.
     */
    public function pacientes()
    {
        return $this->belongsToMany(Paciente::class, 'paciente_pago');
    }

    /**
     * Los Cuotas que pertenecen al paciente.
     */
    public function Cuotas()
    {
        return $this->belongsToMany(Cuota::class, 'cuota_pago');
    }

    public function origen()
    {
        return $this->belongsTo(Origen::class);
    }

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format('Y-m-d h:m:s');
    }

    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])->format('Y-m-d h:m:s');
    }
}
