<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Examen;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\Redirect;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StorePacienteRequest;
use App\Http\Requests\UpdatePacienteRequest;
use App\DataTables\PacientesDataTable;
use App\Models\Bioanalista;
use App\Models\Muestra;
use App\Models\Resultados;
use App\Models\ResultadosDetalle;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class PacienteController extends Controller
{
    /**
     * Realiza las validaciones en los permisos de spatie
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:paciente-list|paciente-create|paciente-edit|paciente-delete', ['only' => ['index','show']]);
        $this->middleware('permission:paciente-create', ['only' => ['create','store']]);
        $this->middleware('permission:paciente-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:paciente-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(PacientesDataTable $dataTable)
    {
        return $dataTable->render('pacientes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        request()->validate(Paciente::$rules);

        $data = $request->all();
        $data['status'] = $request->status ? 1 : 0;

        Paciente::create($data);

        return redirect()->route('pacientes.index')
                            ->with('success','Paciente creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paciente $paciente): View
    {
        return view('pacientes.show',compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paciente $paciente): View
    {
        return view('pacientes.edit',compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paciente $paciente): RedirectResponse
    {

        request()->validate(Paciente::$rules);

        $data = $request->all();
        $data['status'] = $request->status ? 1 : 0;

        $paciente->update($data);

        return redirect()->route('pacientes.index')
                            ->with('success','Paciente actualizado exitosamente.');
    }

    /**
     * Show de form to confirm the remove from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id): View
    {
        $paciente = Paciente::find($id);
        return view('pacientes.delete',compact('paciente'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente): RedirectResponse
    {
        $paciente->delete();
        return redirect()->route('pacientes.index')
                            ->with('success','Paciente eliminado exitosamente.');
    }

    public function resultados_index($id)
    {
        if($paciente = Paciente::find($id)){
            $examen = Examen::all();
            $bioanalista = Bioanalista::all();
            $muestra = Muestra::all();
            return view('resultados.index', compact('paciente', 'examen', 'bioanalista', 'muestra'));
        }else{
            return redirect()->route('pacientes.index')->with('error', 'Paciente no encontrado');
        }
    }

    public function resultados_store(Request $request)
    {
        $paciente = Paciente::find($request->paciente_id);
        $resultados = new Resultados();
        $resultados->paciente_id = $request->paciente_id;
        $resultados->bioanalista_id = $request->bioanalista_id;
        $resultados->examen_id = $request->examen_id;
        $resultados->muestra_id = $request->muestra_id;

        if($resultados->save()){
            return redirect()->back()->with('success','Resultado agregado exitosamente.');
        }
    }

    public function resultados_detalle_index($id)
    {
        if($resultado = Resultados::find($id)){
            $examen = Examen::find($resultado->examen_id);
            $caracteristicas = $examen->caracteristicas;

            return view('resultados.create', compact('resultado', 'examen', 'caracteristicas'));
        }
    }

    public function resultados_detalle_store(Request $request){
        $paciente = Paciente::find($request->paciente_id);
        $examen = Examen::find($request->examen_id);
        $resultados = Resultados::find($request->resultado_id);

        /* dd($request); */
        foreach($request->resultadosDetalle as $resultado => $value){
                $resultadosDetalle = new ResultadosDetalle();
                $resultadosDetalle->resultados_id = $request->resultado_id;
                $resultadosDetalle->caracteristicas_id = $resultado;
                $resultadosDetalle->resultado = $value;
                $resultadosDetalle->save();
                $resultados->resultadosDetalle()->attach([$resultadosDetalle->id]);
        }
        return redirect()->back()->with('success','Registro agregado exitosamente.');
    }

    public function resultados_detalle_print($id){
        if($resultado = Resultados::find($id)){
            $paciente = Paciente::find($resultado->paciente_id);
            $examen = Examen::find($resultado->examen_id);
            $caracteristicas = $examen->caracteristicas;
        }
        return view('resultados.print', compact('resultado', 'paciente', 'examen', 'caracteristicas'));
    }

    public function resultados_detalle_pdf($id){
        if($resultado = Resultados::find($id)){
            $paciente = Paciente::find($resultado->paciente_id);
            $examen = Examen::find($resultado->examen_id);
            $caracteristicas = $examen->caracteristicas;
        }
        $pdf = PDF::loadView('resultados.pdf', compact('resultado', 'paciente', 'examen', 'caracteristicas'));

        return $pdf->stream();
    }
}
