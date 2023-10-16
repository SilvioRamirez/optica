<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Formula extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $guarded = [];
    
    /**
     * Implementa el registro de Logs
     *
     * @var array<int, string>
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    /*
    * Los lentes que pertenecen al paciente.
    */
    public function lentes()
    {
        return $this->belongsToMany(Lente::class, 'formula_lente');
    }
}
