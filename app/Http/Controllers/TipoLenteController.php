<?php

namespace App\Http\Controllers;

use App\DataTables\TipoLentesDataTable;
use App\Models\TipoLente;
use App\Http\Requests\StoreTipoLenteRequest;
use App\Http\Requests\UpdateTipoLenteRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TipoLenteController extends Controller
{
    /**
     * Check Spatie Permissions
     *
     */
    function __construct()
    {
        $this->middleware('permission:tipo-lente-list|tipo-lente-create|tipo-lente-edit|tipo-lente-delete', ['only' => ['index','show']]);
        $this->middleware('permission:tipo-lente-create', ['only' => ['create','store']]);
        $this->middleware('permission:tipo-lente-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:tipo-lente-delete', ['only' => ['delete','destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(TipoLentesDataTable $dataTable)
    {
        return $dataTable->render('tipoLentes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipoLentes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTipoLenteRequest $request): RedirectResponse
    {
        $data = $request->all();

        $tipoLente = TipoLente::create($data);

        return redirect()->route('tipoLentes.index', $tipoLente->id)
                            ->with('success','Registro creado exitosamente: '.$tipoLente->tipo_lente.'.');

    }

    /**
     * Display the specified resource.
     */
    public function show(TipoLente $tipoLente): View
    {
        return view('tipoLentes.show', compact('tipoLente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoLente $tipoLente): View
    {
        return view('tipoLentes.edit', compact('tipoLente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTipoLenteRequest $request, TipoLente $tipoLente): RedirectResponse
    {
        $data = $request->all();

        if(!$tipoLente->update($data)){
            return redirect()->back()
                            ->with('danger','Registro no actualizado.');
        }

        return redirect()->route('tipoLentes.index')
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
        $tipoLente = TipoLente::find($id);
        return view('tipoLentes.delete',compact('tipoLente'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoLente $tipoLente): RedirectResponse
    {
        $tipoLente->delete();
        return redirect()->route('tipoLentes.index')
                            ->with('success','Registro eliminado exitosamente.');
    }
}
