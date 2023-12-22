<?php

namespace App\Http\Controllers;

use App\DataTables\LaboratoriosDataTable;
use App\Models\Laboratorio;
use App\Http\Requests\StoreLaboratorioRequest;
use App\Http\Requests\UpdateLaboratorioRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LaboratorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LaboratoriosDataTable $dataTable)
    {
        return $dataTable->render('laboratorios.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('laboratorios.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        /* request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]); */
        $request->request->remove('personasTable_length');
        
        Laboratorio::create($request->all());
    
        return redirect()->route('laboratorios.index')
                        ->with('success','Laboratorio creado exitosamente.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Laboratorio  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Laboratorio $laboratorio): View
    {
        return view('laboratorios.show',compact('laboratorio'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Laboratorio  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Laboratorio $laboratorio): View
    {
        return view('laboratorios.edit',compact('laboratorio'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laboratorio  $laboratorio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laboratorio $laboratorio): RedirectResponse
    {
        /* request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]); */

        $request->request->remove('personasTable_length');

        $laboratorio->update($request->all());
    
        return redirect()->route('laboratorios.index')
                        ->with('success','Laboratorio actualizado exitosamente.');
    }

    /**
     * Show de form to confirm the remove from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id): View
    {
        $laboratorio = Laboratorio::find($id);
        return view('laboratorios.delete',compact('laboratorio'));
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Laboratorio  $laboratorio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laboratorio $laboratorio): RedirectResponse
    {
        $laboratorio->delete();
    
        return redirect()->route('laboratorios.index')
                        ->with('success','Laboratorio eliminado exitosamente.');
    }
}
