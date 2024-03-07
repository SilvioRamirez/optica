<?php

namespace App\Http\Controllers;

use App\DataTables\TiposDataTable;
use App\Models\Tipo;
use App\Http\Requests\StoreTipoRequest;
use App\Http\Requests\UpdateTipoRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TipoController extends Controller
{

    /**
     * Realiza las validaciones en los permisos de spatie
     *
     */
    function __construct()
    {
        $this->middleware('permission:tipo-list|tipo-create|tipo-edit|tipo-delete', ['only' => ['index','show']]);
        $this->middleware('permission:tipo-create', ['only' => ['create','store']]);
        $this->middleware('permission:tipo-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:tipo-delete', ['only' => ['delete','destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(TiposDataTable $dataTable)
    {
        return $dataTable->render('tipos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTipoRequest $request)
    {
        $data = $request->all();

        $tipo = Tipo::create($data);

        return redirect()->route('tipos.index', $tipo->id)
                            ->with('success','Registro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tipo $tipo): View
    {
        return view('tipos.show', compact('tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tipo $tipo): View
    {
        return view('tipos.edit',compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTipoRequest $request, Tipo $tipo): RedirectResponse
    {
        $data = $request->all();

        if(!$tipo->update($data)){
            return redirect()->back()
                            ->with('danger','Registro no actualizado.');
        }

        return redirect()->route('tipos.index')
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
        $tipo = Tipo::find($id);
        return view('tipos.delete',compact('tipo'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tipo $tipo): RedirectResponse
    {
        $tipo->delete();
        return redirect()->route('tipos.index')
                            ->with('success','Registro eliminado exitosamente.');
    }
}
