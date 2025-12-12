<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedidoCatalogo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pedidos_catalogo';

    protected $fillable = [
        'numero_pedido',
        'nombre_cliente',
        'cedula',
        'telefono',
        'email',
        'notas',
        'total_usd',
        'total_bs',
        'tasa_cambio',
        'status',
    ];

    protected $casts = [
        'total_usd' => 'decimal:2',
        'total_bs' => 'decimal:2',
        'tasa_cambio' => 'decimal:4',
    ];

    public function items()
    {
        return $this->hasMany(PedidoCatalogoItem::class);
    }

    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'pendiente' => 'Pendiente',
            'contactado' => 'Contactado',
            'completado' => 'Completado',
            'cancelado' => 'Cancelado',
            default => ucfirst($this->status)
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'pendiente' => 'warning',
            'contactado' => 'info',
            'completado' => 'success',
            'cancelado' => 'danger',
            default => 'secondary'
        };
    }
}


