<?php

namespace App\Http\Controllers;

use App\DataTables\RutaEntregasDataTable;
use App\Models\RutaEntrega;
use App\Http\Requests\StoreRutaEntregaRequest;
use App\Http\Requests\UpdateRutaEntregaRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
class RutaEntregaController extends Controller
{
    /**
     * Check Spatie Permissions
     *
     */
    function __construct()
    {
        $this->middleware('permission:ruta-entrega-list|ruta-entrega-create|ruta-entrega-edit|ruta-entrega-delete', ['only' => ['index','show']]);
        $this->middleware('permission:ruta-entrega-create', ['only' => ['create','store']]);
        $this->middleware('permission:ruta-entrega-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:ruta-entrega-delete', ['only' => ['delete','destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(RutaEntregasDataTable $dataTable)
    {
        return $dataTable->render('rutaEntregas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('rutaEntregas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRutaEntregaRequest $request): RedirectResponse
    {
        $data = $request->all();

        $rutaEntrega = RutaEntrega::create($data);

        return redirect()->route('rutaEntregas.index', $rutaEntrega->id)
                            ->with('success','Registro creado exitosamente: '.$rutaEntrega->ruta_entrega.'.');

    }

    /**
     * Display the specified resource.
     */
    public function show(RutaEntrega $rutaEntrega): View
    {
        return view('rutaEntregas.show', compact('rutaEntrega'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RutaEntrega $rutaEntrega): View
    {
        return view('rutaEntregas.edit', compact('rutaEntrega'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRutaEntregaRequest $request, RutaEntrega $rutaEntrega): RedirectResponse
    {
        $data = $request->all();

        if(!$rutaEntrega->update($data)){
            return redirect()->back()
                            ->with('danger','Registro no actualizado.');
        }

        return redirect()->route('rutaEntregas.index')
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
        $rutaEntrega = RutaEntrega::find($id);
        return view('rutaEntregas.delete',compact('rutaEntrega'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RutaEntrega $rutaEntrega): RedirectResponse
    {
        $rutaEntrega->delete();
        return redirect()->route('rutaEntregas.index')
                            ->with('success','Registro eliminado exitosamente.');
    }
}
