<?php

namespace App\Http\Controllers;

use App\DataTables\TipoTratamientosDataTable;
use App\Models\TipoTratamiento;
use App\Http\Requests\StoreTipoTratamientoRequest;
use App\Http\Requests\UpdateTipoTratamientoRequest;
use App\Models\TipoLente;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TipoTratamientoController extends Controller
{
    /**
     * Check Spatie Permissions
     *
     */
    function __construct()
    {
        $this->middleware('permission:tipo-tratamiento-list|tipo-tratamiento-create|tipo-tratamiento-edit|tipo-tratamiento-delete', ['only' => ['index','show']]);
        $this->middleware('permission:tipo-tratamiento-create', ['only' => ['create','store']]);
        $this->middleware('permission:tipo-tratamiento-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:tipo-tratamiento-delete', ['only' => ['delete','destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(TipoTratamientosDataTable $dataTable)
    {
        return $dataTable->render('tipoTratamientos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tipoLentes = TipoLente::orderBy('tipo_lente','asc')->pluck('tipo_lente', 'id')->prepend('-- Seleccione --', '');

        return view('tipoTratamientos.create', compact('tipoLentes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTipoTratamientoRequest $request): RedirectResponse
    {
        $data = $request->all();

        $tipoTratamiento = TipoTratamiento::create($data);

        return redirect()->route('tipoTratamientos.index', $tipoTratamiento->id)
                            ->with('success','Registro creado exitosamente: '.$tipoTratamiento->tipo_tratamiento.'.');

    }

    /**
     * Display the specified resource.
     */
    public function show(TipoTratamiento $tipoTratamiento): View
    {
        return view('tipoTratamientos.show', compact('tipoTratamiento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoTratamiento $tipoTratamiento): View
    {
        $tipoLentes = TipoLente::orderBy('tipo_lente','asc')->pluck('tipo_lente', 'id')->prepend('-- Seleccione --', '');

        return view('tipoTratamientos.edit', compact('tipoTratamiento', 'tipoLentes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTipoTratamientoRequest $request, TipoTratamiento $tipoTratamiento): RedirectResponse
    {
        $data = $request->all();

        if(!$tipoTratamiento->update($data)){
            return redirect()->back()
                            ->with('danger','Registro no actualizado.');
        }

        return redirect()->route('tipoTratamientos.index')
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
        $tipoTratamiento = TipoTratamiento::find($id);
        return view('tipoTratamientos.delete',compact('tipoTratamiento'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoTratamiento $tipoTratamiento): RedirectResponse
    {
        $tipoTratamiento->delete();
        return redirect()->route('tipoTratamientos.index')
                            ->with('success','Registro eliminado exitosamente.');
    }
}
