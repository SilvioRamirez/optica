<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Orden;

class FormularioLaboratorio extends Model
{
    use HasFactory;

    protected $fillable = [
        'formulario_id',
        'orden_id',
        'laboratorio_id',
        'fecha_envio',
        'fecha_retorno',
        'observacion'
    ];

    public function formulario()
    {
        return $this->belongsTo(Formulario::class);
    }

    public function laboratorio()
    {
        return $this->belongsTo(Laboratorio::class);
    }

    public function orden()
    {
        return $this->belongsTo(Orden::class);
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
