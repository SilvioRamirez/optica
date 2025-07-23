<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use App\Models\Formulario;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Http;

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

    public function tasa_cambio(){
        $url = 'https://pydolarve.org/api/v1/dollar?page=bcv';

        $response = Http::get($url);



        return $response->json();

       /*  if($data && $data['monitors'] && $data['monitors']['usd'] && $data['monitors']['usd']['price']){
            $tasaCambio = $data['monitors']['usd']['price'];
        }

        return $tasaCambio; */
    }

    public function orden_cedula(Request $request){

        $data = $this->tasa_cambio();

        if($data && $data['monitors'] && $data['monitors']['usd'] && $data['monitors']['usd']['price']){
            $tasaCambio['price'] = $data['monitors']['usd']['price'];
            $tasaCambio['last_update'] = $data['monitors']['usd']['last_update'];
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
