<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CondicionOptica extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'orden_id',
        'eval_esf_od',
        'eval_esf_oi',
        'eval_esf',
        'eval_cil_od',
        'eval_cil_oi',
        'eval_cil',
        'cond_od',
        'cond_oi',
        'eval_oj',
        'presbicia',
        'miopia_magna',
    ];

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
