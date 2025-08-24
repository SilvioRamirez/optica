<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class OrdenPayment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['orden_id', 'origen_id', 'tipo_id', 'monto', 'pago_fecha', 'referencia', 'image_path', 'created_by', 'updated_by'];

    public function orden()
    {
        return $this->belongsTo(Orden::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function origen()
    {
        return $this->belongsTo(Origen::class);
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
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
