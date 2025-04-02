<?php

namespace App\Http\Controllers;

use App\Models\TipoGasto;
use App\Http\Requests\StoreTipoGastoRequest;
use App\Http\Requests\UpdateTipoGastoRequest;
use App\DataTables\TipoGastosDataTable;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TipoGastoController extends Controller
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
    public function index(TipoGastosDataTable $dataTable)
    {
        return $dataTable->render('tipoGastos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipoGastos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTipoGastoRequest $request)
    {
        $data = $request->all();

        $tipoGasto = TipoGasto::create($data);

        return redirect()->route('tipoGastos.index', $tipoGasto->id)
                            ->with('success','Registro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoGasto $tipoGasto): View
    {
        return view('tipoGastos.show', compact('tipoGasto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoGasto $tipoGasto): View
    {
        return view('tipoGastos.edit',compact('tipoGasto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTipoGastoRequest $request, TipoGasto $tipoGasto): RedirectResponse
    {
        $data = $request->all();

        if(!$tipoGasto->update($data)){
            return redirect()->back()
                            ->with('danger','Registro no actualizado.');
        }

        return redirect()->route('tipoGastos.index')
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
        $tipoGasto = TipoGasto::find($id);
        return view('tipoGastos.delete',compact('tipoGasto'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoGasto $tipoGasto): RedirectResponse
    {
        $tipoGasto->delete();
        return redirect()->route('tipoGastos.index')
                            ->with('success','Registro eliminado exitosamente.');
    }
}
