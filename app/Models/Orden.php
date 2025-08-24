<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orden extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'cliente_id', 
        'numero_orden', 
        'fecha_recibida', 
        'fecha_entrega', 
        'status', 
        'cedula', 
        'paciente', 
        'edad', 
        'genero', 
        'tipo_lente_id',
        'tipo_tratamiento_id', 
        'tipo_formula', 
        'od_esf',
        'od_cil',
        'od_eje',
        'oi_esf',
        'oi_cil',
        'oi_eje',
        'add',
        'dp',
        'alt',
        'observaciones_extras',
        'precio_cristal', 
        'precio_montaje', 
        'precio_total', 
        'precio_descuento', 
        'precio_saldo', 
        'precio_porcentaje_pago',
        'created_by', 
        'updated_by',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function tipoTratamiento()
    {
        return $this->belongsTo(TipoTratamiento::class);
    }

    public function tipoLente()
    {
        return $this->belongsTo(TipoLente::class);
    }

    public function ordenPayments()
    {
        return $this->hasMany(OrdenPayment::class);
    }

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format('Y-m-d h:m:s');
    }

    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])->format('Y-m-d h:m:s');
    }

    public function calculoPagos()
    {

        $pagos = OrdenPayment::where('orden_id', $this->id)->get();

        $totalPagos = $pagos->sum('monto');

        $totalOrden = $this->precio_total;

        $saldo = $totalOrden - $totalPagos;

        // Evitar división por cero para formularios gratuitos
        if ($totalOrden == 0) {
            // Si el formulario es gratuito (total = 0), el porcentaje es 100%
            $porcentaje = 100;
        } else {
            $porcentaje = round(($totalPagos / $totalOrden) * 100);
        }

        // Actualizar los campos en el modelo Formulario
        $this->precio_saldo = $saldo;
        $this->precio_porcentaje_pago = $porcentaje;
        $this->save();

        return $this;

    }
}
