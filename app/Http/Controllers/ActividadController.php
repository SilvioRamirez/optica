<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pago;
use App\Models\Formulario;
use Carbon\Carbon;

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
}
