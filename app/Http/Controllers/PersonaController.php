<?php

namespace App\Http\Controllers;

use App\DataTables\PersonasDataTable;
use App\Models\Persona;
use App\Http\Requests\StorePersonaRequest;
use App\Http\Requests\UpdatePersonaRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PersonaController extends Controller
{

    /**
     * Realiza las validaciones en los permisos de spatie
     *
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
    public function index(PersonasDataTable $dataTable)
    {
        return $dataTable->render('personas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('personas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //request()->validate(Persona::$rules);

        $data = $request->all();
        $data['status'] = $request->status ? 1 : 0;

        $persona = Persona::create($data);

        return redirect()->route('personas.index', $persona->id)
                            ->with('success','Registro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Persona $persona): View
    {
        return view('personas.show', compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persona $persona): View
    {
        return view('personas.edit',compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonaRequest $request, Persona $persona)
    {
        $data = $request->all();
        $data['status'] = $request->status ? 1 : 0;

        if(!$persona->update($data)){
            return redirect()->back()
                            ->with('danger','Registro no actualizado.');
        }

        return redirect()->route('personas.index')
                            ->with('success','Registro actualizado exitosamente.');
    }

    /**
     * Show de form to confirm the remove from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\View
     */
    public function delete($id): View
    {
        $persona = Persona::find($id);
        return view('personas.delete',compact('persona'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persona $persona): RedirectResponse
    {
        $persona->delete();
        return redirect()->route('personas.index')
                            ->with('success','Registro eliminado exitosamente.');
    }

    /**
    * Write code on Method
    *
    * @return response()
    */
    public function fetchPersonas()
    {
        $data['personas'] = Persona::get(["id", "cedula", "nombres", "apellidos"]);
        //return response()->json($data);

        /* return view('dropdown', $data);

        $data['municipios'] = Municipio::where("id_estado", $request->id_estado)
                                                    ->get(["municipio", "id_municipio"]); */
        return response()->json($data);
    }

    public function datatablePersonas(){
        return datatables()->eloquent(Persona::query())->toJson();
    }

}
