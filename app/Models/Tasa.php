<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Tasa extends Model
{
    use LogsActivity;

    /**
     * Implementa el registro de Logs
     *
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()
            ->logOnlyDirty()
            ->setDescriptionForEvent(fn(string $eventName) => "Este modelo ha sido {$eventName}")
            ->dontSubmitEmptyLogs();
    }
    protected $fillable = ['valor', 'fecha'];
    
    public static function getLastTasa(){
        return self::orderBy('fecha', 'desc')->first();
    }
}
