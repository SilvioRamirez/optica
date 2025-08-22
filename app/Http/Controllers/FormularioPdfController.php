<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use App\Models\Formulario;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Http;
use App\Services\TasaBCV;
use App\Models\Tasa;

class FormularioPdfController extends Controller
{
    public function orden_pdf($id){

        if($orden = Formulario::find($id)){
            $tipoLente = $orden->tipoLente;
            $tipoTratamiento = $orden->tipoTratamiento;
            $especialista = $orden->especialistaLente;
            $configuracion = Configuracion::find(1);
            $operativo = $orden->operativo;
            /* $paciente = Paciente::find($resultado->paciente_id);
            $examen = Examen::find($resultado->examen_id);
            $caracteristicas = $examen->caracteristicas;
             */
        }

        /* dd($tipoTratamiento); */

        $pdf = PDF::loadView('formularios.pdf.orden', compact('orden', 'tipoLente', 'tipoTratamiento', 'especialista', 'configuracion', 'operativo'))
                    ->setOption(['dpi' => 150, 'isRemoteEnabled' => true])
                    ->setPaper([0, 0, 164.409448819, 595.275590551]);
                    /* ->setPaper('A8','portrait'); */

        return $pdf->download('Orden Nro. '.$orden->numero_orden.'.pdf');
    }

    public function orden_qrcode($formId, $numeroOrden){

        $orden = Formulario::findOrFail($formId);

        if($orden->numero_orden == $numeroOrden){
            $tipoLente = $orden->tipoLente;
            $tipoTratamiento = $orden->tipoTratamiento;
            $especialista = $orden->especialistaLente;
            return view('formularios.web', compact('orden', 'tipoLente', 'tipoTratamiento', 'especialista'));
        }
        return response([], 404);

    }

    public function tasa_cambio(TasaBCV $tasaService){
        

        $tasaHoy = $tasaService->getTasaActivaHoy();

        return response()->json($tasaHoy);
    }

    public function orden_cedula(Request $request){

        $data = Tasa::getLastTasa();
        $tasaCambio['price'] = 0;
        $tasaCambio['last_update'] = 'No hay tasa disponible';

        if($data){
            $tasaCambio['price'] = number_format($data->valor, 2, '.', '');
            $tasaCambio['last_update'] = $data->fecha;
        }

        $orden = Formulario::where('cedula', $request->cedula)
                    ->with('tipoLente')
                    ->with('tipoTratamiento')
                    ->with('rutaEntrega')
                    ->with('especialistaLente')
                    ->with('operativo')
        ->get();

        $orden = $orden->map(function($item) use ($tasaCambio){
            $item['total_bs'] = number_format($item->total * $tasaCambio['price'], 2, '.', '');
            $item['saldo_bs'] = number_format($item->saldo * $tasaCambio['price'], 2, '.', '');
            return $item;
        });

        if($orden){
            return view('formularios.web_consulta', compact('orden', 'tasaCambio'));
        }
        return response([], 404);

    }

}
