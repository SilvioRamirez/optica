<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Direccion extends Model
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

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
