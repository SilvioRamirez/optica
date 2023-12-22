<?php

namespace App\Http\Controllers;

use App\Models\Bioanalista;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreBioanalistaRequest;
use App\Http\Requests\UpdateBioanalistaRequest;
use App\DataTables\BioanalistasDataTable;

class BioanalistaController extends Controller
{

    /**
     * Realiza las validaciones en los permisos de spatie
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:bioanalista-list|bioanalista-create|bioanalista-edit|bioanalista-delete', ['only' => ['index','show']]);
        $this->middleware('permission:bioanalista-create', ['only' => ['create','store']]);
        $this->middleware('permission:bioanalista-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:bioanalista-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(BioanalistasDataTable $dataTable)
    {
        return $dataTable->render('bioanalistas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('bioanalistas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        request()->validate(Bioanalista::$rules);

        $data = $request->all();
        $data['status'] = $request->status ? 1 : 0;

        Bioanalista::create($data);

        return redirect()->route('bioanalistas.index')
                            ->with('success','Bioanalista creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bioanalista $bioanalista): View
    {
        return view('bioanalistas.show',compact('bioanalista'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bioanalista $bioanalista): View
    {
        return view('bioanalistas.edit',compact('bioanalista'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bioanalista $bioanalista): RedirectResponse
    {

        request()->validate(Bioanalista::$rules);

        $data = $request->all();
        $data['status'] = $request->status ? 1 : 0;

        $bioanalista->update($data);

        return redirect()->route('bioanalistas.index')
                            ->with('success','Bioanalista actualizado exitosamente.');
    }

    /**
     * Show de form to confirm the remove from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id): View
    {
        $bioanalista = Bioanalista::find($id);
        return view('bioanalistas.delete',compact('bioanalista'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bioanalista $bioanalista): RedirectResponse
    {
        $bioanalista->delete();
        return redirect()->route('bioanalistas.index')
                            ->with('success','Bioanalista eliminado exitosamente.');
    }
}
