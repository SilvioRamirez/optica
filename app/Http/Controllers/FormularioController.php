<?php

namespace App\Http\Controllers;

use App\DataTables\FormulariosDataTable;
use App\Models\Formulario;
use App\Http\Requests\StoreFormularioRequest;
use App\Http\Requests\UpdateFormularioRequest;
use App\Models\Laboratorio;
use App\Models\Operativo;
use App\Models\Tipo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FormularioController extends Controller
{

    /**
     * Realiza las validaciones en los permisos de spatie
     *
     */
    function __construct()
    {
        $this->middleware('permission:formulario-list|formulario-create|formulario-edit|formulario-delete', ['only' => ['index','show']]);
        $this->middleware('permission:formulario-create', ['only' => ['create','store']]);
        $this->middleware('permission:formulario-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:formulario-delete', ['only' => ['delete','destroy']]);
        $this->middleware('permission:formulario-estatus',['only' => ['estatusFormulario','cambiarEstatus']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(FormulariosDataTable $dataTable)
    {

        $laboratorios = Laboratorio::orderBy('id', 'desc')->pluck('razon_social', 'razon_social')->prepend('-- Seleccione --', '');

        return $dataTable->render('formularios.index', compact('laboratorios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $operativos = Operativo::orderBy('id', 'desc')->pluck('nombre_operativo', 'nombre_operativo')->prepend('-- Seleccione --', '');

        $tipos = Tipo::pluck('tipo', 'tipo')->prepend('-- Seleccione --', '');

        $laboratorios = Laboratorio::orderBy('id', 'desc')->pluck('razon_social', 'razon_social')->prepend('-- Seleccione --', '');

        return view('formularios.create',compact('operativos', 'tipos', 'laboratorios'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFormularioRequest $request): RedirectResponse
    {
        //request()->validate(Persona::$rules);

        $data = $request->all();
        //$data['status'] = $request->status ? 1 : 0;

        $formulario = Formulario::create($data);

        return redirect()->route('formularios.index', $formulario->id)
                            ->with('success','Registro creado exitosamente. Orden Nro. '.$formulario->numero_orden.'.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Formulario $formulario): View
    {
        $operativos = Operativo::orderBy('id', 'desc')->pluck('nombre_operativo', 'nombre_operativo')->prepend('-- Seleccione --', '');

        $tipos = Tipo::pluck('tipo', 'tipo')->prepend('-- Seleccione --', '');

        $laboratorios = Laboratorio::orderBy('id', 'desc')->pluck('razon_social', 'razon_social')->prepend('-- Seleccione --', '');

        return view('formularios.show', compact('formulario', 'laboratorios', 'tipos', 'operativos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formulario $formulario): View
    {
        $operativos = Operativo::orderBy('id', 'desc')->pluck('nombre_operativo', 'nombre_operativo')->prepend('-- Seleccione --', '');
        
        $tipos = Tipo::pluck('tipo', 'tipo')->prepend('-- Seleccione --', '');

        $laboratorios = Laboratorio::orderBy('id', 'desc')->pluck('razon_social', 'razon_social')->prepend('-- Seleccione --', '');

        return view('formularios.edit',compact('formulario', 'operativos', 'tipos', 'laboratorios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFormularioRequest $request, Formulario $formulario): RedirectResponse
    {

        $data = $request->all();

        if(!$formulario->update($data)){
            return redirect()->back()
                            ->with('danger','Registro no actualizado.');
        }

        return redirect()->route('formularios.index')
                            ->with('success','Registro actualizado exitosamente.');
    }

    /**
     * Show de form to confirm the remove from storage.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function delete($id): View
    {
        $formulario = Formulario::find($id);
        return view('formularios.delete',compact('formulario'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formulario $formulario): RedirectResponse
    {
        $formulario->delete();
        return redirect()->route('formularios.index')
                            ->with('success','Registro eliminado exitosamente.');
    }

    public function estatusFormulario(Formulario $formulario){
        return $formulario = Formulario::where('id', $formulario->id)
            ->get([
                'id',
                'numero_orden',
                'paciente',
                'estatus',
                'laboratorio',
                'total',
                'saldo',
                'direccion_operativo',
                'observaciones_extras',
                'edad',
                'fecha',
            ])
            ->first()->toJson();
    }

    public function cambiarEstatus(Formulario $formulario, Request $request){

        $formulario->update([
            'estatus'       => $request->params['estatus'],
            'laboratorio'   => $request->params['laboratorio']
        ]);

        return $formulario->toJson();

    }

    /**
    * Write code on Method
    *
    * @return Laboratorio
    */
    public function fetchLaboratorio(Request $request)
    {
        //Se utiliza params por los parametros de la peticion axios
        $data['laboratorios'] = Laboratorio::get(["razon_social", "razon_social"]);
        return response()->json($data);
    }

}
