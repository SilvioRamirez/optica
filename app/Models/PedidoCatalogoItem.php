<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoCatalogoItem extends Model
{
    use HasFactory;

    protected $table = 'pedido_catalogo_items';

    protected $fillable = [
        'pedido_catalogo_id',
        'producto_id',
        'nombre_producto',
        'precio_unitario',
        'cantidad',
        'subtotal',
    ];

    protected $casts = [
        'precio_unitario' => 'decimal:2',
        'subtotal' => 'decimal:2',
    ];

    public function pedido()
    {
        return $this->belongsTo(PedidoCatalogo::class, 'pedido_catalogo_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}


