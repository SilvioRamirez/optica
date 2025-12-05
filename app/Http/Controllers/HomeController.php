<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use App\Models\Refractante;
use App\Models\Pago;
use App\Models\Operativo;
use App\Models\Tasa;
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
            ->selectRaw('tipo_lentes.tipo_lente, COUNT(*) as cantidad, AVG(CAST(formularios.total AS DECIMAL(10,2))) as precio_promedio, SUM(CAST(formularios.total AS DECIMAL(10,2))) as total_ventas')
            ->groupBy('tipo_lentes.id', 'tipo_lentes.tipo_lente')
            ->orderByDesc('cantidad')
            ->get();

        // 2. Promedio del total de formularios del mes
        $promedioTotalActual = Formulario::whereMonth('created_at', $mesActual->month)
            ->whereYear('created_at', $mesActual->year)
            ->whereNotNull('total')
            ->selectRaw('AVG(CAST(total AS DECIMAL(10,2))) as promedio')
            ->value('promedio') ?? 0;

        $promedioTotalAnterior = Formulario::whereMonth('created_at', $mesAnterior->month)
            ->whereYear('created_at', $mesAnterior->year)
            ->whereNotNull('total')
            ->selectRaw('AVG(CAST(total AS DECIMAL(10,2))) as promedio')
            ->value('promedio') ?? 0;

        $promedioVariacion = $this->calcularVariacion($promedioTotalActual, $promedioTotalAnterior);

        // 3. Estadísticas por género del mes
        $generoMasculinoActual = Formulario::whereMonth('created_at', $mesActual->month)
            ->whereYear('created_at', $mesActual->year)
            ->where('genero', 'Masculino')
            ->count();

        $generoFemeninoActual = Formulario::whereMonth('created_at', $mesActual->month)
            ->whereYear('created_at', $mesActual->year)
            ->where('genero', 'Femenino')
            ->count();

        $generoMasculinoAnterior = Formulario::whereMonth('created_at', $mesAnterior->month)
            ->whereYear('created_at', $mesAnterior->year)
            ->where('genero', 'Masculino')
            ->count();

        $generoFemeninoAnterior = Formulario::whereMonth('created_at', $mesAnterior->month)
            ->whereYear('created_at', $mesAnterior->year)
            ->where('genero', 'Femenino')
            ->count();

        $generoMasculinoVariacion = $this->calcularVariacion($generoMasculinoActual, $generoMasculinoAnterior);
        $generoFemeninoVariacion = $this->calcularVariacion($generoFemeninoActual, $generoFemeninoAnterior);

        // 4. Promedio de edad del mes
        $promedioEdadActual = Formulario::whereMonth('created_at', $mesActual->month)
            ->whereYear('created_at', $mesActual->year)
            ->whereNotNull('edad')
            ->avg('edad') ?? 0;

        $promedioEdadAnterior = Formulario::whereMonth('created_at', $mesAnterior->month)
            ->whereYear('created_at', $mesAnterior->year)
            ->whereNotNull('edad')
            ->avg('edad') ?? 0;

        $edadVariacion = $this->calcularVariacion($promedioEdadActual, $promedioEdadAnterior);

        // 5. Estadísticas adicionales para las tarjetas (ventas totales)
        $totalVentasActual = Formulario::whereMonth('created_at', $mesActual->month)
            ->whereYear('created_at', $mesActual->year)
            ->selectRaw('SUM(CAST(total AS DECIMAL(10,2))) as total_sum')
            ->value('total_sum') ?? 0;

        $totalVentasAnterior = Formulario::whereMonth('created_at', $mesAnterior->month)
            ->whereYear('created_at', $mesAnterior->year)
            ->selectRaw('SUM(CAST(total AS DECIMAL(10,2))) as total_sum')
            ->value('total_sum') ?? 0;

        $ventasVariacion = $this->calcularVariacion($totalVentasActual, $totalVentasAnterior);

        // 6. Operativo con más formularios del mes
        $operativoConMasFormularios = Operativo::whereHas('formularios', function ($query) use ($mesActual) {
            $query->whereMonth('created_at', $mesActual->month)
                ->whereYear('created_at', $mesActual->year);
        })
            ->withCount(['formularios' => function ($query) use ($mesActual) {
                $query->whereMonth('created_at', $mesActual->month)
                    ->whereYear('created_at', $mesActual->year);
            }])
            ->orderByDesc('formularios_count')
            ->first();

        // 7. Estadísticas de Condiciones Ópticas del mes
        $condicionesOpticas = \App\Models\CondicionOptica::whereHas('formulario', function ($query) use ($mesActual) {
            $query->whereMonth('created_at', $mesActual->month)
                ->whereYear('created_at', $mesActual->year);
        })
            ->get();

        // Procesar eval_oj (eliminar valores null y vacíos)
        $evalOjStats = $condicionesOpticas->whereNotNull('eval_oj')
            ->where('eval_oj', '!=', '')
            ->groupBy('eval_oj')
            ->map(function ($group) {
                return $group->count();
            })
            ->sortDesc();

        // Procesar presbicia (solo contar los que tienen "PRESBICIA")
        $presbiciaCount = $condicionesOpticas->where('presbicia', 'PRESBICIA')->count();
        $sinPresbiciaCount = $condicionesOpticas->where('presbicia', '!=', 'PRESBICIA')->count();

        // Procesar miopía magna (solo contar los que tienen "MIOPÍA MAGNA")
        $miopiaMagnaCount = $condicionesOpticas->where('miopia_magna', 'MIOPÍA MAGNA')->count();
        $sinMiopiaMagnaCount = $condicionesOpticas->where('miopia_magna', '!=', 'MIOPÍA MAGNA')->count();

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

        $chart_options_condicionesOpticas = [
            'chart_title' => 'Estadísticas de Errores Refractivos - General',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\CondicionOptica',
            'group_by_field' => 'eval_oj',
            'chart_type' => 'bar',
            'chart_color' => '5, 68, 255',
        ];

        $chartCondicionesOpticas = new LaravelChart($chart_options_condicionesOpticas);

        // Gráfico de Cotización del Dólar (BCV vs Binance)
        $chartTasas = $this->crearGraficoTasas();

        return view('home', compact(
            'formulariosActual',
            'formulariosAnterior',
            'formulariosVariacion',
            'refractadosActual',
            'refractadosAnterior',
            'refractadosVariacion',
            'pagosActual',
            'pagosAnterior',
            'pagosVariacion',
            'operativosActual',
            'operativosAnterior',
            'operativosVariacion',
            'casheaActual',
            'casheaAnterior',
            'casheaVariacion',
            'mesActualNombre',
            'mesAnteriorNombre',
            'mesesDisponibles',
            'mesSeleccionado',
            'chart1',
            'chart2',
            'chart3',
            'chart4',
            'formulariosPorTipoLente',
            'operativoConMasFormularios',
            'promedioTotalActual',
            'promedioTotalAnterior',
            'promedioVariacion',
            'generoMasculinoActual',
            'generoFemeninoActual',
            'generoMasculinoAnterior',
            'generoFemeninoAnterior',
            'generoMasculinoVariacion',
            'generoFemeninoVariacion',
            'promedioEdadActual',
            'promedioEdadAnterior',
            'edadVariacion',
            'totalVentasActual',
            'totalVentasAnterior',
            'ventasVariacion',
            'condicionesOpticas',
            'chartCondicionesOpticas',
            'chartTasas',
            'evalOjStats',
            'presbiciaCount',
            'sinPresbiciaCount',
            'miopiaMagnaCount',
            'sinMiopiaMagnaCount'
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

    private function crearGraficoTasas()
    {
        // Obtener tasas de los últimos 30 días
        $fechaInicio = Carbon::now()->subDays(30)->startOfDay();

        $tasasBCV = Tasa::where('fuente', 'BCV')
            ->where('created_at', '>=', $fechaInicio)
            ->orderBy('created_at')
            ->get();

        $tasasBinance = Tasa::where('fuente', 'Binance')
            ->where('created_at', '>=', $fechaInicio)
            ->orderBy('created_at')
            ->get();
        
        $tasasEuro = Tasa::where('fuente', 'Euro')
            ->where('created_at', '>=', $fechaInicio)
            ->orderBy('created_at')
            ->get();

        // Preparar datos para el gráfico
        $labels = [];
        $datosBCV = [];
        $datosBinance = [];
        $datosEuro = [];

        // Crear un array de fechas de los últimos 30 días
        for ($i = 29; $i >= 0; $i--) {
            $fecha = Carbon::now()->subDays($i);
            $fechaStr = $fecha->format('Y-m-d');

            // Label para mostrar
            $labels[] = $fecha->format('d/m');

            // Buscar tasa BCV del día (usando whereDate para comparar solo la fecha)
            $tasaBCV = $tasasBCV->first(function ($tasa) use ($fechaStr) {
                return Carbon::parse($tasa->created_at)->format('Y-m-d') === $fechaStr;
            });
            $datosBCV[] = $tasaBCV ? floatval($tasaBCV->valor) : null;

            // Buscar tasa Binance del día
            $tasaBinance = $tasasBinance->first(function ($tasa) use ($fechaStr) {
                return Carbon::parse($tasa->created_at)->format('Y-m-d') === $fechaStr;
            });
            $datosBinance[] = $tasaBinance ? floatval($tasaBinance->valor) : null;

            // Buscar tasa Euro del día
            $tasaEuro = $tasasEuro->first(function ($tasa) use ($fechaStr) {
                return Carbon::parse($tasa->created_at)->format('Y-m-d') === $fechaStr;
            });
            $datosEuro[] = $tasaEuro ? floatval($tasaEuro->valor) : null;
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Dolar BCV',
                    'data' => $datosBCV,
                    'borderColor' => 'rgb(220, 53, 69)',
                    'backgroundColor' => 'rgba(220, 53, 69, 0.1)',
                    'fill' => true,
                    'tension' => 0.4,
                    'pointRadius' => 3,
                    'pointHoverRadius' => 5,
                    'spanGaps' => true // Conecta los puntos aunque haya nulls
                ],
                [
                    'label' => 'Dolar Binance',
                    'data' => $datosBinance,
                    'borderColor' => 'rgb(255, 193, 7)',
                    'backgroundColor' => 'rgba(255, 193, 7, 0.1)',
                    'fill' => true,
                    'tension' => 0.4,
                    'pointRadius' => 3,
                    'pointHoverRadius' => 5,
                    'spanGaps' => true
                ],
                [
                    'label' => 'Euro BCV',
                    'data' => $datosEuro,
                    'borderColor' => 'rgb(0, 123, 255)',
                    'backgroundColor' => 'rgba(0, 123, 255, 0.1)',
                    'fill' => true,
                    'tension' => 0.4,
                    'pointRadius' => 3,
                    'pointHoverRadius' => 5,
                    'spanGaps' => true
                ]
            ]
        ];
    }
}
