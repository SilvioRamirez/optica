<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use App\Models\Refractante;
use App\Models\Pago;
use App\Models\Operativo;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // Obtener el mes seleccionado o usar el mes actual por defecto
        $mesSeleccionado = $request->get('mes', now()->format('Y-m'));
        
        // Corregir el parsing de fechas
        try {
            // Agregar día explícitamente para evitar problemas de parsing
            $fechaSeleccionada = Carbon::createFromFormat('Y-m-d', $mesSeleccionado . '-01');
        } catch (\Exception $e) {
            // Si hay error en el formato, usar mes actual
            $fechaSeleccionada = now()->startOfMonth();
            $mesSeleccionado = now()->format('Y-m');
        }
        
        // Usar las fechas directamente sin copiar para evitar problemas
        $mesActual = $fechaSeleccionada->copy();
        $mesAnterior = $fechaSeleccionada->copy()->subMonth();

        // Formatear nombres de meses en español
        $meses = [
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre'
        ];

        $mesActualNombre = $meses[$mesActual->month] . ' ' . $mesActual->year;
        $mesAnteriorNombre = $meses[$mesAnterior->month] . ' ' . $mesAnterior->year;

        // Obtener meses disponibles con datos
        $mesesDisponibles = $this->getMesesDisponibles();

        // Formularios - Debug de la consulta
        $formulariosActual = Formulario::whereMonth('created_at', $mesActual->month)
            ->whereYear('created_at', $mesActual->year)
            ->count();
        
        $formulariosAnterior = Formulario::whereMonth('created_at', $mesAnterior->month)
            ->whereYear('created_at', $mesAnterior->year)
            ->count();
        $formulariosVariacion = $this->calcularVariacion($formulariosActual, $formulariosAnterior);

        // Refractados
        $refractadosActual = Refractante::whereMonth('created_at', $mesActual->month)
            ->whereYear('created_at', $mesActual->year)
            ->count();
        $refractadosAnterior = Refractante::whereMonth('created_at', $mesAnterior->month)
            ->whereYear('created_at', $mesAnterior->year)
            ->count();
        $refractadosVariacion = $this->calcularVariacion($refractadosActual, $refractadosAnterior);

        // Pagos
        $pagosActual = Pago::whereMonth('created_at', $mesActual->month)
            ->whereYear('created_at', $mesActual->year)
            ->count();
        $pagosAnterior = Pago::whereMonth('created_at', $mesAnterior->month)
            ->whereYear('created_at', $mesAnterior->year)
            ->count();
        $pagosVariacion = $this->calcularVariacion($pagosActual, $pagosAnterior);

        // Operativos
        $operativosActual = Operativo::whereMonth('created_at', $mesActual->month)
            ->whereYear('created_at', $mesActual->year)
            ->count();
        $operativosAnterior = Operativo::whereMonth('created_at', $mesAnterior->month)
            ->whereYear('created_at', $mesAnterior->year)
            ->count();
        $operativosVariacion = $this->calcularVariacion($operativosActual, $operativosAnterior);

        // Formularios con CASHEA
        $casheaActual = Formulario::whereMonth('created_at', $mesActual->month)
            ->whereYear('created_at', $mesActual->year)
            ->where('cashea', true)
            ->count();
        $casheaAnterior = Formulario::whereMonth('created_at', $mesAnterior->month)
            ->whereYear('created_at', $mesAnterior->year)
            ->where('cashea', true)
            ->count();
        $casheaVariacion = $this->calcularVariacion($casheaActual, $casheaAnterior);

        // ===== NUEVAS ESTADÍSTICAS =====
        
        // 1. Estadísticas por Tipo de Lente (para el mes seleccionado)
        $formulariosPorTipoLente = Formulario::whereMonth('formularios.created_at', $mesActual->month)
            ->whereYear('formularios.created_at', $mesActual->year)
            ->whereNotNull('tipo')
            ->join('tipo_lentes', 'formularios.tipo', '=', 'tipo_lentes.id')
            ->selectRaw('tipo_lentes.tipo_lente, COUNT(*) as cantidad, AVG(formularios.total) as precio_promedio, SUM(formularios.total) as total_ventas')
            ->groupBy('tipo_lentes.id', 'tipo_lentes.tipo_lente')
            ->orderByDesc('cantidad')
            ->get();

        // 2. Formulario más caro del mes
        $formularioMasCaro = Formulario::whereMonth('created_at', $mesActual->month)
            ->whereYear('created_at', $mesActual->year)
            ->whereNotNull('total')
            ->select('id', 'numero_orden', 'paciente', 'total', 'created_at')
            ->orderByDesc('total')
            ->first();

        // 3. Operativo con más formularios del mes
        $operativoConMasFormularios = Operativo::whereHas('formularios', function($query) use ($mesActual) {
                $query->whereMonth('created_at', $mesActual->month)
                      ->whereYear('created_at', $mesActual->year);
            })
            ->withCount(['formularios' => function($query) use ($mesActual) {
                $query->whereMonth('created_at', $mesActual->month)
                      ->whereYear('created_at', $mesActual->year);
            }])
            ->orderByDesc('formularios_count')
            ->first();

        // 4. Estadísticas adicionales para las tarjetas
        $totalVentasActual = Formulario::whereMonth('created_at', $mesActual->month)
            ->whereYear('created_at', $mesActual->year)
            ->sum('total');
        
        $totalVentasAnterior = Formulario::whereMonth('created_at', $mesAnterior->month)
            ->whereYear('created_at', $mesAnterior->year)
            ->sum('total');
        
        $ventasVariacion = $this->calcularVariacion($totalVentasActual, $totalVentasAnterior);

        $chart_options1 = [
            'chart_title' => 'Formularios por Mes',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Formulario',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
            'filter_field' => 'created_at',
            'filter_days' => 630, // show only last 30 days
            'chart_color' => '13,110,253',
        ];

        $chart1 = new LaravelChart($chart_options1);

        $chart_options2 = [
            'chart_title' => 'Refractados por Mes',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Refractante',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
            'filter_field' => 'created_at',
            'filter_days' => 630, // show only last 30 days
            'chart_color' => '108,117,125',
        ];

        $chart2 = new LaravelChart($chart_options2);

        $chart_options3 = [
            'chart_title' => 'Pagos por Mes',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Pago',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
            'filter_field' => 'created_at',
            'filter_days' => 630, // show only last 30 days
            'chart_color' => '25,135,84',
        ];

        $chart3 = new LaravelChart($chart_options3);

        $chart_options4 = [
            'chart_title' => 'Operativos por Mes',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Operativo',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
            'filter_field' => 'created_at',
            'filter_days' => 630, // show only last 30 days
            'chart_color' => '255,193,7',
        ];

        $chart4 = new LaravelChart($chart_options4);

        return view('home', compact(
            'formulariosActual', 'formulariosAnterior', 'formulariosVariacion',
            'refractadosActual', 'refractadosAnterior', 'refractadosVariacion',
            'pagosActual', 'pagosAnterior', 'pagosVariacion',
            'operativosActual', 'operativosAnterior', 'operativosVariacion',
            'casheaActual', 'casheaAnterior', 'casheaVariacion',
            'mesActualNombre', 'mesAnteriorNombre', 'mesesDisponibles', 'mesSeleccionado',
            'chart1', 'chart2', 'chart3', 'chart4',
            'formulariosPorTipoLente', 'formularioMasCaro', 'operativoConMasFormularios', 
            'totalVentasActual', 'totalVentasAnterior', 'ventasVariacion'
        ));
    }

    private function calcularVariacion($actual, $anterior)
    {
        if ($anterior == 0) {
            return $actual > 0 ? 100 : 0;
        }
        return round((($actual - $anterior) / $anterior) * 100, 2);
    }

    private function getMesesDisponibles()
    {
        $meses = [
            1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
            5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
            9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
        ];

        // Obtener fechas únicas de todas las tablas con validación
        $fechasFormularios = Formulario::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month')
            ->whereNotNull('created_at')
            ->groupBy('year', 'month')->get();
        
        $fechasRefractantes = Refractante::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month')
            ->whereNotNull('created_at')
            ->groupBy('year', 'month')->get();
        
        $fechasPagos = Pago::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month')
            ->whereNotNull('created_at')
            ->groupBy('year', 'month')->get();
        
        $fechasOperativos = Operativo::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month')
            ->whereNotNull('created_at')
            ->groupBy('year', 'month')->get();

        // Combinar todas las fechas
        $todasLasFechas = collect()
            ->merge($fechasFormularios)
            ->merge($fechasRefractantes)
            ->merge($fechasPagos)
            ->merge($fechasOperativos)
            ->filter(function ($item) {
                // Filtrar elementos válidos
                return $item && $item->year && $item->month && 
                       $item->month >= 1 && $item->month <= 12;
            })
            ->unique(function ($item) {
                return $item->year . '-' . $item->month;
            })
            ->sortByDesc(function ($item) {
                return $item->year * 100 + $item->month;
            });

        $mesesDisponibles = [];
        
        // Si no hay datos, al menos mostrar el mes actual
        if ($todasLasFechas->isEmpty()) {
            $mesActual = now();
            $valor = $mesActual->format('Y-m');
            $texto = $meses[$mesActual->month] . ' ' . $mesActual->year;
            $mesesDisponibles[$valor] = $texto;
        } else {
            foreach ($todasLasFechas as $fecha) {
                if (isset($meses[$fecha->month])) {
                    $valor = sprintf('%04d-%02d', $fecha->year, $fecha->month);
                    $texto = $meses[$fecha->month] . ' ' . $fecha->year;
                    $mesesDisponibles[$valor] = $texto;
                }
            }
        }

        return $mesesDisponibles;
    }
}
