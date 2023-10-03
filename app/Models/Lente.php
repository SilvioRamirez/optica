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

}
