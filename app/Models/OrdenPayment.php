<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class OrdenPayment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['orden_id', 'orden_payment_origin_id', 'orden_payment_type_id', 'monto', 'pago_fecha', 'referencia', 'image_path', 'created_by', 'updated_by'];

    public function orden()
    {
        return $this->belongsTo(Orden::class);
    }


    public function paymentOrigin()
    {
        return $this->belongsTo(OrdenPaymentOrigin::class, 'orden_payment_origin_id');
    }

    public function paymentType()
    {
        return $this->belongsTo(OrdenPaymentType::class, 'orden_payment_type_id');
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
