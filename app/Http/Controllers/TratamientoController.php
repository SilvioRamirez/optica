<?php

namespace App\Http\Controllers;

use App\DataTables\TratamientosDataTable;
use App\Models\Tratamiento;
use App\Http\Requests\StoreTratamientoRequest;
use App\Http\Requests\UpdateTratamientoRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TratamientoController extends Controller
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
    public function index(TratamientosDataTable $dataTable)
    {
        return $dataTable->render('tratamientos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('tratamientos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTratamientoRequest $request): RedirectResponse
    {
        //request()->validate(Persona::$rules);

        $data = $request->all();
        //$data['status'] = $request->status ? 1 : 0;

        $tratamiento = Tratamiento::create($data);

        return redirect()->route('tratamientos.index', $tratamiento->id)
                            ->with('success','Registro creado exitosamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Tratamiento $tratamiento): View
    {
        return view('tratamientos.show', compact('tratamiento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tratamiento $tratamiento): View
    {
        return view('tratamientos.edit',compact('tratamiento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTratamientoRequest $request, Tratamiento $tratamiento): RedirectResponse
    {
        $data = $request->all();
        //$data['status'] = $request->status ? 1 : 0;

        if(!$tratamiento->update($data)){
            return redirect()->back()
                            ->with('danger','Registro no actualizado.');
        }

        return redirect()->route('tratamientos.index')
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
        $tratamiento = Tratamiento::find($id);
        return view('tratamientos.delete',compact('tratamiento'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tratamiento $tratamiento): RedirectResponse
    {
        $tratamiento->delete();
        return redirect()->route('tratamientos.index')
                            ->with('success','Registro eliminado exitosamente.');
    }
}
