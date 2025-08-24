<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ClientePayment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'cliente_id', 
        'saldo', 
        'saldo_bs', 
        'total', 
        'tasa_cambio', 
        'fecha', 
        'banco_emisor', 
        'referencia', 
        'monto', 
        'monto_usd', 
        'fecha_pago', 
        'file', 
        'status', 
        'created_by', 
        'updated_by'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
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
