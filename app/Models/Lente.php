<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Lente extends Model
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

    /**
     * Los pacientes que pertenecen a los lentes.
     */
    public function pacientes()
    {
        return $this->belongsToMany(Paciente::class, 'lente_paciente');
    }

    /**
     * Las formulas que pertenecen al lente.
     */
    public function formulas()
    {
        return $this->belongsToMany(Formula::class, 'formula_lente');
    }

    /**
     * Los Tratamientos que pertenecen al lente.
     */
    public function tratamientos()
    {
        return $this->belongsToMany(Tratamiento::class, 'lente_tratamiento');
    }

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format('d-m-Y');
    }

    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])->format('d-m-Y');
    }

    public function getNumeroOrdenAttribute($value)
    {
        if($value){
            return str_pad($value, 6, '0', STR_PAD_LEFT);
        }else{
            return null;
        }
    }   

}
