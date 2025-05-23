<?php

namespace App\Http\Controllers;

use App\Models\Origen;
use App\Http\Requests\StoreOrigenRequest;
use App\Http\Requests\UpdateOrigenRequest;
use App\DataTables\OrigensDataTable;

class OrigenController extends Controller
{

    /**
     * Realiza las validaciones en los permisos de spatie
     *
     */
    function __construct()
    {
        $this->middleware('permission:origen-list|origen-create|origen-edit|origen-delete', ['only' => ['index','show']]);
        $this->middleware('permission:origen-create', ['only' => ['create','store']]);
        $this->middleware('permission:origen-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:origen-delete', ['only' => ['delete','destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(OrigensDataTable $dataTable)
    {
        return $dataTable->render('origens.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('origens.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrigenRequest $request)
    {
        $origen = Origen::create($request->all());
        return redirect()->route('origens.index')->with('success', 'Origen creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Origen $origen)
    {
        return view('origens.show', compact('origen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Origen $origen)
    {
        return view('origens.edit', compact('origen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrigenRequest $request, Origen $origen)
    {
        $origen->update($request->all());
        return redirect()->route('origens.index')->with('success', 'Origen actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Origen $origen)
    {
        $origen->delete();
        return response()->json([
            'message' => 'Origen eliminado correctamente',
            'status' => 'success'
        ]);
    }
}
