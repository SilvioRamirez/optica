<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Formulario;
use Carbon\Carbon;

class DebugFormularios extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'debug:formularios {mes?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Debug formularios más caros';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $mes = $this->argument('mes') ?: now()->format('Y-m');
        $fecha = Carbon::createFromFormat('Y-m-d', $mes . '-01');
        
        $this->info("=== FORMULARIOS MÁS CAROS GLOBALMENTE ===");
        $globales = Formulario::whereNotNull('total')
            ->orderByRaw('CAST(total AS DECIMAL(10,2)) DESC')
            ->limit(10)
            ->get(['numero_orden', 'total', 'created_at', 'paciente']);
            
        foreach($globales as $f) {
            $this->line(sprintf("Orden: %s - Total: %s - Fecha: %s", 
                $f->numero_orden, 
                number_format($f->total, 2), 
                \Carbon\Carbon::parse($f->created_at)->format('Y-m-d')
            ));
        }
        
        $this->info("\n=== FORMULARIOS MÁS CAROS DEL MES: {$mes} ===");
        $delMes = Formulario::whereMonth('created_at', $fecha->month)
            ->whereYear('created_at', $fecha->year)
            ->whereNotNull('total')
            ->orderByRaw('CAST(total AS DECIMAL(10,2)) DESC')
            ->limit(10)
            ->get(['numero_orden', 'total', 'created_at', 'paciente']);
            
        foreach($delMes as $f) {
            $this->line(sprintf("Orden: %s - Total: %s - Fecha: %s", 
                $f->numero_orden, 
                number_format($f->total, 2), 
                \Carbon\Carbon::parse($f->created_at)->format('Y-m-d')
            ));
        }
        
        $this->info("\n=== VERIFICAR FORMULARIO 13076 ===");
        $f13076 = Formulario::where('numero_orden', '13076')->first();
        if($f13076) {
            $this->line(sprintf("Orden 13076 - Total: %s - Fecha: %s - Mes: %s", 
                number_format($f13076->total, 2), 
                \Carbon\Carbon::parse($f13076->created_at)->format('Y-m-d'),
                \Carbon\Carbon::parse($f13076->created_at)->format('Y-m')
            ));
        } else {
            $this->error("Formulario 13076 no encontrado");
        }
        
        $this->info("\n=== VERIFICAR FORMULARIO ID 6182 ===");
        $f6182 = Formulario::where('id', 6182)->first();
        if($f6182) {
            $this->line(sprintf("ID: %s - Orden: %s - Total: %s - Fecha: %s", 
                $f6182->id,
                $f6182->numero_orden,
                number_format($f6182->total, 2), 
                \Carbon\Carbon::parse($f6182->created_at)->format('Y-m-d')
            ));
        } else {
            $this->error("Formulario ID 6182 no encontrado");
        }
        
        $this->info("\n=== BÚSQUEDA DE TOTALES > 100 ===");
        $altos = Formulario::whereNotNull('total')
            ->whereRaw('CAST(total AS DECIMAL(10,2)) > 100')
            ->orderByRaw('CAST(total AS DECIMAL(10,2)) DESC')
            ->limit(10)
            ->get(['id', 'numero_orden', 'total', 'created_at', 'paciente']);
            
        foreach($altos as $f) {
            $this->line(sprintf("ID: %s - Orden: %s - Total: %s - Fecha: %s", 
                $f->id,
                $f->numero_orden, 
                number_format($f->total, 2), 
                \Carbon\Carbon::parse($f->created_at)->format('Y-m-d')
            ));
        }
        
        $this->info("\n=== VERIFICAR TIPO DE DATOS DEL CAMPO TOTAL ===");
        $sample = Formulario::whereNotNull('total')->first();
        if($sample) {
            $this->line(sprintf("Ejemplo - ID: %s, Total: %s, Tipo PHP: %s", 
                $sample->id,
                $sample->total,
                gettype($sample->total)
            ));
        }
        
        return 0;
    }
}
