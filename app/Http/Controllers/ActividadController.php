<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pago;
use App\Models\Formulario;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Configuracion;

class ActividadController extends Controller
{
    public function index()
    {
        return view('actividades.index');
    }

    public function buscarActividades(Request $request)
    {
        $fecha = $request->fecha ?? Carbon::now()->format('Y-m-d');
        
        // Consultar pagos del día seleccionado
        $pagos = Pago::whereDate('created_at', $fecha)
                    ->orWhereDate('updated_at', $fecha)
                    ->with(['formulario', 'tipo'])
                    ->get();

        
        
        // Consultar formularios creados o actualizados en el día seleccionado
        $formularios = Formulario::whereDate('created_at', $fecha)
                        ->orWhereDate('updated_at', $fecha)
                        ->with(['tipoLente', 'especialistaLente', 'rutaEntrega'])
                        ->get();
        
        return response()->json([
            'pagos' => $pagos,
            'formularios' => $formularios,
            'fecha' => $fecha
        ]);
    }

    public function generarPDF(Request $request)
    {
        $fecha = $request->get('fecha', Carbon::now()->format('Y-m-d'));
        
        // Obtener los datos de actividades
        $actividades = $this->obtenerActividades($fecha);
        
        if (empty($actividades['pagos']) && empty($actividades['formularios'])) {
            return redirect()->back()->with('error', 'No hay actividades para la fecha seleccionada');
        }

        // Obtener la configuración
        $configuracion = Configuracion::first();
        
        $pdf = PDF::loadView('actividades.pdf', [
            'fecha' => $fecha,
            'pagos' => $actividades['pagos'],
            'formularios' => $actividades['formularios'],
            'configuracion' => $configuracion
        ]);

       /*  return $pdf->stream('actividades-' . $fecha . '.pdf'); */

        return $pdf->download('Reporte de Actividades - ' . $fecha . '.pdf');
    }

    private function obtenerActividades($fecha)
    {
        // Consultar pagos del día seleccionado
        $pagos = Pago::whereDate('created_at', $fecha)
                    ->orWhereDate('updated_at', $fecha)
                    ->with(['formulario', 'tipo'])
                    ->get();
        
        // Consultar formularios creados o actualizados en el día seleccionado
        $formularios = Formulario::whereDate('created_at', $fecha)
                        ->orWhereDate('updated_at', $fecha)
                        ->with(['tipoLente', 'especialistaLente', 'rutaEntrega'])
                        ->get();
        
        return [
            'pagos' => $pagos,
            'formularios' => $formularios
        ];
    }
}
