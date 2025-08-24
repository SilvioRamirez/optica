<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Cliente extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['identity_id', 'document_number', 'name', 'email', 'address', 'phone'];

    public function identity()
    {
        return $this->belongsTo(Identity::class);
    }

    public function clientePayments()
    {
        return $this->hasMany(ClientePayment::class);
    }

    public function ordens()
    {
        return $this->hasMany(Orden::class);
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
