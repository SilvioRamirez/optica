<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Muestra extends Model
{
    use HasFactory;

    static $rules= [
        'nombre' => 'required|unique:muestras',
        'status' => ''
    ];

    protected $guarded = [];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format('d-m-Y');
    }

    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])->format('d-m-Y');
    }
}
