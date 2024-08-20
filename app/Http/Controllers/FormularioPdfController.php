<?php

namespace App\Http\Controllers;

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
            
            /* $paciente = Paciente::find($resultado->paciente_id);
            $examen = Examen::find($resultado->examen_id);
            $caracteristicas = $examen->caracteristicas;
            $configuracion = Configuracion::find(1); */
        }

        /* dd($tipoTratamiento); */

        $pdf = PDF::loadView('formularios.pdf.orden', compact('orden', 'tipoLente', 'tipoTratamiento', 'especialista'))
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

}
