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
use App\Models\Cola;
use App\Models\ColaResultados;
use App\Models\Configuracion;
use App\Models\Estado;
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
        $estados = Estado::get(['id_estado', 'estado']);
        //$estados = Estado::pluck('estado', 'id_estado');
        //dd($estados);
        return view('pacientes.create', compact('estados'));
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
        $estados = Estado::get(['id_estado', 'estado']);
        return view('pacientes.show',compact('paciente', 'estados'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paciente $paciente): View
    {
        $estados = Estado::get(['id_estado', 'estado']);

        return view('pacientes.edit',compact('paciente', 'estados'));
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

            //$cola = Paciente::find($id)->with('resultados')->get();

            $cola = Paciente::where('id', $paciente->id)
                    ->with(['resultados' => function($query){
                        $query->where('status_cola', true); //Me indica sin el = si es verdadero o falso y debemos definir en el modelo que es un boleano 1 o 0
                        $query->with('examen');
                        $query->with('examen.caracteristicas');
                        $query->with('bioanalista');
                        $query->with('muestra');
                        $query->orderBy('created_at', 'desc');
                    }])
                    ->get();

            /* $cola = Paciente::with(['controls' => function ($query) {
                $query->whereNotNull('created_at');
                $query->orderBy('created_at', 'desc');
            }])->take(5)->get(); */

            //$resultado = Resultados::with('examen.caracteristicas')->with('paciente')->with('bioanalista')->with('muestra')->find($id);
            
            //return get_defined_vars();

            return view('resultados.index', compact('paciente', 'examen', 'bioanalista', 'muestra', 'cola'));
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
        return redirect()->route('pacientes.resultados.index', $paciente->id)
                            ->with('success','Resultados agregados exitosamente.');
    }



    public function resultados_detalle_cola($id){

        //$resultado = Resultados::find($id);
        //$examen = Examen::find($resultado->examen_id);
        
        /* $resultado = Resultados::find($id); */
        /* $bioanalista = Resultados::find($id)->bioanalista; */
        /* $muestra = Resultados::find($id)->muestra; */
        /* $paciente = Resultados::find($id)->paciente; */
        /* $examen = Resultados::find($id)->examen->with(['caracteristicas']); */
        // $resultado = Resultados::with('examen.caracteristicas')->with('paciente')->with('bioanalista')->with('muestra')->find($id);
        /* $caracteristicas = $resultado->examen->caracteristicas; */
        /* $user = User::with('comments')->find($id); */
        
        /* $cola = new Cola();
        $cola->paciente_id = $resultado->paciente->id;
        $cola->resultados_id = $resultado->id;
        $cola->save(); */

        //$cola = Cola::where('paciente_id', $resultado->paciente->id);

        //$cola->resultados()->attach([$cola->id]);


        //return get_defined_vars();

        //return $resultado;

        //return view('resultados.index', compact('paciente', 'examen', 'bioanalista', 'muestra', 'cola'));

        if($resultado = Resultados::find($id)){
            $resultado->status_cola = true;
            $resultado->update();
        }

        return redirect()->route('pacientes.resultados.index', $resultado->paciente->id)->with('success','Se ha agregado el Examen a la cola de impresión.');

        //return redirect()->back()->with('success','Examen agregado a la cola de impresión.');
    }

    public function resultados_detalle_cola_delete($id){

        if($resultado = Resultados::find($id)){
            $resultado->status_cola = false;
            $resultado->update();
        }

        return redirect()->route('pacientes.resultados.index', $resultado->paciente->id)->with('success','Se ha eliminado el Examen a la cola de impresión.');
    }

    public function paciente_resultados_cola_vaciar($id){

        $paciente = Paciente::find($id);

        foreach($paciente->resultados as $resultado){
            $resultado->status_cola = false;
            $resultado->update();
        }

        return redirect()->route('pacientes.resultados.index', $paciente->id)->with('success','Se ha vaciado la cola de impresión del paciente.'); 
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
            $configuracion = Configuracion::find(1);
        }
        $pdf = PDF::loadView('resultados.pdf', compact('resultado', 'paciente', 'examen', 'caracteristicas', 'configuracion'));

        return $pdf->stream();
    }

    public function paciente_resultados_cola_pdf($id){

        $paciente = Paciente::where('id', $id)
                    ->with(['resultados' => function($query){
                        $query->where('status_cola', true); //Me indica sin el = si es verdadero o falso y debemos definir en el modelo que es un boleano 1 o 0
                        $query->with('examen');
                        $query->with('examen.caracteristicas');
                        $query->with('bioanalista');
                        $query->with('muestra');
                        $query->orderBy('created_at', 'desc');
                    }])
                    ->get();

        $configuracion = Configuracion::first();

        get_defined_vars();
        
        $pdf = PDF::loadView('resultados.pdf-cola', compact('paciente', 'configuracion'));

        return $pdf->stream();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function resultados_destroy($id): RedirectResponse
    {
        
        if($resultado = Resultados::find($id)){
            $resultado->delete();
            return redirect()->back()->with('success','Registro eliminado exitosamente.');
        }
        return redirect()->back()->with('error','Ha ocurrido un error al eliminar el registro.');
        
    }
}
