<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use App\Models\Refractante;
use App\Models\Pago;
use App\Models\Operativo;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

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
    public function index()
    {
        // Mes actual
        $mesActual = now()->startOfMonth();
        $mesAnterior = now()->subMonth()->startOfMonth();

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

        $mesActualNombre = $meses[$mesActual->month];
        $mesAnteriorNombre = $meses[$mesAnterior->month];

        // Formularios
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


        $chart_options = [
            'chart_title' => 'Formularios por mes',
            'chart_type' => 'line',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Formulario',
            'conditions'            => [
                ['name' => 'Formularios', 'condition' => 'estatus = 1', 'color' => 'black', 'fill' => true],
                ['name' => 'Refractados', 'condition' => 'estatus = 2', 'color' => 'blue', 'fill' => true],
            ],

            'group_by_field' => 'created_at',
            'group_by_period' => 'month',

            'aggregate_function' => 'sum',
            'aggregate_field' => 'amount',
            'aggregate_transform' => function($value) {
                return round($value / 100, 2);
            },
            
            'filter_field' => 'created_at',
            'filter_days' => 30, // show only transactions for last 30 days
            'filter_period' => 'month', // show only transactions for this week
            'continuous_time' => true, // show continuous timeline including dates without data
        ];

        $chart1 = new LaravelChart($chart_options);

        return view('home', compact(
            'formulariosActual', 'formulariosAnterior', 'formulariosVariacion',
            'refractadosActual', 'refractadosAnterior', 'refractadosVariacion',
            'pagosActual', 'pagosAnterior', 'pagosVariacion',
            'operativosActual', 'operativosAnterior', 'operativosVariacion',
            'mesActualNombre', 'mesAnteriorNombre',
            'chart1'
        ));
    }

    private function calcularVariacion($actual, $anterior)
    {
        if ($anterior == 0) {
            return $actual > 0 ? 100 : 0;
        }
        return round((($actual - $anterior) / $anterior) * 100, 2);
    }
}
