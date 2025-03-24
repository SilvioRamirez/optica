<?php

namespace App\Http\Controllers;

use App\Models\Descuento;
use App\Http\Requests\StoreDescuentoRequest;
use App\Http\Requests\UpdateDescuentoRequest;
use App\DataTables\DescuentosDataTable;
class DescuentoController extends Controller
{
    /**
     * Check Spatie Permissions
     *
     */
    function __construct()
    {
        $this->middleware('permission:descuento-list|descuento-create|descuento-edit|descuento-delete', ['only' => ['index','show']]);
        $this->middleware('permission:descuento-create', ['only' => ['create','store']]);
        $this->middleware('permission:descuento-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:descuento-delete', ['only' => ['delete','destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(DescuentosDataTable $dataTable)
    {
        return $dataTable->render('descuentos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('descuentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDescuentoRequest $request)
    {
        $data = $request->all();
        $descuento = Descuento::create($data);

        return redirect()->route('descuentos.index', $descuento->id)
                            ->with('success','Registro creado exitosamente: '.$descuento->nombre.'.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Descuento $descuento)
    {
        return view('descuentos.show', compact('descuento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Descuento $descuento)
    {
        return view('descuentos.edit', compact('descuento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDescuentoRequest $request, Descuento $descuento)
    {
        $data = $request->all();

        if(!$descuento->update($data)){
            return redirect()->back()
                            ->with('danger','Registro no actualizado.');
        }

        return redirect()->route('descuentos.index')
                            ->with('success','Registro actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Descuento $descuento)
    {
        $descuento->delete();

        return redirect()->route('descuentos.index')
                            ->with('success','Registro eliminado exitosamente.');
    }
}
