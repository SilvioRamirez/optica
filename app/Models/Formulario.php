<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth;

class Formulario extends Model
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

    public function rutaEntrega()
    {
        return $this->belongsTo(RutaEntrega::class, 'ruta_entrega_id');
    }

    public function especialistaLente()
    {
        return $this->belongsTo(Especialista::class, 'especialista');
    }

    public function descuento()
    {
        return $this->belongsTo(Descuento::class, 'descuento_id');
    }

    //Relacion de uno a muchos
    public function imagenContratos()
    {
        return $this->hasMany(ImagenContrato::class);
    }

    public function operativo()
    {
        return $this->belongsTo(Operativo::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }

    public function origen()
    {
        return $this->belongsTo(Origen::class);
    }

    public function calculoPagos()
    {

        $pagos = Pago::where('formulario_id', $this->id)->get();

        $totalPagos = $pagos->sum('monto');

        $totalFormulario = $this->total;

        $saldo = $totalFormulario - $totalPagos;

        $porcentaje = round(($totalPagos / $totalFormulario) * 100);

        // Actualizar los campos en el modelo Formulario
        $this->saldo = $saldo;
        $this->porcentaje_pago = $porcentaje;
        $this->save();

        return $this;

    }
}
