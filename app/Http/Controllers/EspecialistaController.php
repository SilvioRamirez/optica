<?php

namespace App\Http\Controllers;

use App\DataTables\EspecialistasDataTable;
use App\Models\Especialista;
use App\Http\Requests\StoreEspecialistaRequest;
use App\Http\Requests\UpdateEspecialistaRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EspecialistaController extends Controller
{
    /**
     * Realiza las validaciones en los permisos de spatie
     *
     */
    function __construct()
    {
        $this->middleware('permission:especialista-list|especialista-create|especialista-edit|especialista-delete', ['only' => ['index','show']]);
        $this->middleware('permission:especialista-create', ['only' => ['create','store']]);
        $this->middleware('permission:especialista-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:especialista-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(EspecialistasDataTable $dataTable)
    {
        return $dataTable->render('especialistas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('especialistas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEspecialistaRequest $request): RedirectResponse
    {
        $data = $request->all();

        $especialista = Especialista::create($data);

        return redirect()->route('especialistas.index', $especialista->id)
                            ->with('success','Registro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Especialista $especialista): View
    {
        return view('especialistas.show', compact('especialista'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Especialista $especialista): View
    {
        return view('especialistas.edit',compact('especialista'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEspecialistaRequest $request, Especialista $especialista)
    {
        $data = $request->all();

        if(!$especialista->update($data)){
            return redirect()->back()
                            ->with('danger','Registro no actualizado.');
        }

        return redirect()->route('especialistas.index')
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
        $especialista = Especialista::find($id);
        return view('especialistas.delete',compact('especialista'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Especialista $especialista)
    {
        $especialista->delete();
        return redirect()->route('especialistas.index')
                            ->with('success','Registro eliminado exitosamente.');
    }
}
