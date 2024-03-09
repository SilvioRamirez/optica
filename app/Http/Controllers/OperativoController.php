<?php

namespace App\Http\Controllers;

use App\DataTables\OperativosDataTable;
use App\Models\Operativo;
use App\Http\Requests\StoreOperativoRequest;
use App\Http\Requests\UpdateOperativoRequest;
use App\Models\Estado;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OperativoController extends Controller
{
    /**
     * Realiza las validaciones en los permisos de spatie
     *
     */
    function __construct()
    {
        $this->middleware('permission:operativo-list|operativo-create|operativo-edit|operativo-delete', ['only' => ['index','show']]);
        $this->middleware('permission:operativo-create', ['only' => ['create','store']]);
        $this->middleware('permission:operativo-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:operativo-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(OperativosDataTable $dataTable)
    {
        return $dataTable->render('operativos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estados = Estado::get(['id_estado', 'estado']);

        return view('operativos.create', compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOperativoRequest $request): RedirectResponse
    {
        $data = $request->all();

        $operativo = Operativo::create($data);

        return redirect()->route('operativos.index', $operativo->id)
                            ->with('success','Registro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Operativo $operativo): View
    {
        return view('operativos.show', compact('operativo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Operativo $operativo): View
    {
        $estados = Estado::get(['id_estado', 'estado']);

        return view('operativos.edit',compact('operativo', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOperativoRequest $request, Operativo $operativo)
    {
        $data = $request->all();

        if(!$operativo->update($data)){
            return redirect()->back()
                            ->with('danger','Registro no actualizado.');
        }

        return redirect()->route('operativos.index')
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
        $operativo = Operativo::find($id);
        return view('operativos.delete',compact('operativo'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operativo $operativo): RedirectResponse
    {
        $operativo->delete();
        return redirect()->route('operativos.index')
                            ->with('success','Registro eliminado exitosamente.');
    }
}
