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
            /* $paciente = Paciente::find($resultado->paciente_id);
            $examen = Examen::find($resultado->examen_id);
            $caracteristicas = $examen->caracteristicas;
            $configuracion = Configuracion::find(1); */
        }

        /* dd($tipoTratamiento); */

        $pdf = PDF::loadView('formularios.pdf.orden', compact('orden', 'tipoLente', 'tipoTratamiento'))->setPaper('A8','portrait');

        return $pdf->stream();
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

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
