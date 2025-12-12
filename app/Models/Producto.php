<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class Producto extends Model
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

    protected $fillable = [
        'nombre',
        'precio',
        'descripcion',
        'imagen',
        'status',
        'barcode',
        'qrcode',
        'stock',
        'categoria_id',
        'exento_iva',
    ];

    protected $casts = [
        'exento_iva' => 'boolean',
        'status' => 'boolean',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    /**
     * Scope para filtrar productos activos y con stock disponible
     * Nota: stock está definido como string en la BD, por eso usamos CAST
     */
    public function scopeActivo($query)
    {
        return $query->where('status', 1)
                     ->whereRaw('CAST(stock AS UNSIGNED) > 0');
    }

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format('Y-m-d h:m:s');
    }

    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])->format('Y-m-d h:m:s');
    }

    /**
     * Obtener el porcentaje de IVA configurado
     */
    public function getIvaPorcentajeAttribute(): float
    {
        return $this->exento_iva ? 0 : (float) config('app.iva', 16);
    }

    /**
     * Obtener el precio final en USD a tasa BCV (ya incluye IVA si aplica)
     * Fórmula: (precio * tasa_binance) / tasa_bcv
     * El precio base está en USD Binance (YA INCLUYE IVA), se convierte a Bs y luego a USD BCV
     */
    public function getPrecioUsdBcvAttribute(): float
    {
        $tasaBinance = Tasa::getLastTasaBinance();
        $tasaBCV = Tasa::getLastTasa();
        
        if (!$tasaBinance || !$tasaBCV || $tasaBCV->valor <= 0) {
            return (float) $this->precio;
        }
        
        // precio * tasa_binance = precio en Bs
        $precioBs = (float) $this->precio * $tasaBinance->valor;
        // precio_bs / tasa_bcv = precio en USD (BCV)
        return $precioBs / $tasaBCV->valor;
    }

    /**
     * Obtener el precio SIN IVA en USD BCV (extraído del precio que ya incluye IVA)
     * Solo aplica para productos que tienen IVA
     */
    public function getPrecioSinIvaAttribute(): float
    {
        $precioFinal = $this->precio_usd_bcv;
        
        if ($this->exento_iva) {
            return $precioFinal; // Si es exento, no tiene IVA que extraer
        }
        
        $iva = config('app.iva', 16);
        // Extraer el precio base: precio_con_iva / (1 + iva/100)
        return $precioFinal / (1 + $iva / 100);
    }

    /**
     * Obtener el monto del IVA incluido en el precio (extraído del precio)
     * El precio ya incluye IVA, entonces: iva = precio - (precio / (1 + iva%))
     */
    public function getIvaMontoAttribute(): float
    {
        if ($this->exento_iva) {
            return 0;
        }
        
        return $this->precio_usd_bcv - $this->precio_sin_iva;
    }

    /**
     * Obtener el precio final en USD (a tasa BCV) - El precio ya incluye IVA
     */
    public function getPrecioConIvaAttribute(): float
    {
        return $this->precio_usd_bcv;
    }

    /**
     * Obtener el precio en Bolívares (el precio ya incluye IVA)
     * Fórmula: precio_usd_bcv * tasa_bcv
     */
    public function getPrecioBsAttribute(): float
    {
        $tasaBCV = Tasa::getLastTasa();
        
        if (!$tasaBCV) {
            return 0;
        }
        
        return $this->precio_usd_bcv * $tasaBCV->valor;
    }

}
