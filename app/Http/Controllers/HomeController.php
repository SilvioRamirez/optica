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


        /* $chart_options = [
            'chart_title' => 'Formularios por mes',
            'chart_type' => 'line',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Formulario',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'aggregate_function' => 'count',
            'aggregate_field' => 'id',
            'filter_field' => 'created_at',
            'filter_days' => 365,
            'filter_period' => 'month',
            'continuous_time' => true,
        ]; */

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
            'mesActualNombre', 'mesAnteriorNombre',
            'chart1', 'chart2', 'chart3', 'chart4'
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
