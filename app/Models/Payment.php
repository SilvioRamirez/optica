<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth;

class Payment extends Model
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

    protected $fillable = [
        'formulario_id',
        'saldo',
        'saldo_bs',
        'total',
        'tasa_cambio',
        'fecha',
        'paciente',
        'numero_orden',
        'cedula',
        'edad',
        'telefono',
        'banco_emisor',
        'referencia',
        'monto',
        'fecha_pago',
        'file',
        'status',
        'created_by',
        'updated_by',
        'monto_usd',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = 'Web';
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


    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format('Y-m-d h:m:s');
    }

    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])->format('Y-m-d h:m:s');
    }


}
