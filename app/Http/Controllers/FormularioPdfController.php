<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use App\Models\Formulario;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class FormularioPdfController extends Controller
{
    public function orden_pdf($id){

        if($orden = Formulario::find($id)){
            $tipoLente = $orden->tipoLente;
            $tipoTratamiento = $orden->tipoTratamiento;
            $especialista = $orden->especialistaLente;
            $configuracion = Configuracion::find(1);
            /* $paciente = Paciente::find($resultado->paciente_id);
            $examen = Examen::find($resultado->examen_id);
            $caracteristicas = $examen->caracteristicas;
             */
        }

        /* dd($tipoTratamiento); */

        $pdf = PDF::loadView('formularios.pdf.orden', compact('orden', 'tipoLente', 'tipoTratamiento', 'especialista', 'configuracion'))
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

            return view('formularios.web', compact('orden', 'tipoLente', 'tipoTratamiento'));
        }
        return response([], 404);

    }

    public function orden_cedula(Request $request){
        
        /* $orden = Formulario::where('cedula', $request->cedula)->get(); */

        $orden = Formulario::where('cedula', $request->cedula)
                    ->with('tipoLente')
                    ->with('tipoTratamiento')
                    ->with('rutaEntrega')
                    ->with('especialistaLente')
        ->get();

        /* dd($orden); */

        /* return $orden; */

        if($orden){
            /* $tipoLente = $orden->tipoLente;
            $tipoTratamiento = $orden->tipoTratamiento; */

            return view('formularios.web_consulta', compact('orden'));
        }
        return response([], 404);

    }

}
