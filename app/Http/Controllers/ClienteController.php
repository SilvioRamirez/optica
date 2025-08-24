<?php

namespace App\Http\Controllers;

use App\DataTables\ClientesDataTable;
use App\Models\Cliente;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Identity;
use Illuminate\Contracts\View\View;

class ClienteController extends Controller
{
    /**
     * Realiza las validaciones en los permisos de spatie
     *
     */
    function __construct()
    {
        $this->middleware('permission:cliente-list|cliente-create|cliente-edit|cliente-delete', ['only' => ['index','show']]);
        $this->middleware('permission:cliente-create', ['only' => ['create','store']]);
        $this->middleware('permission:cliente-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:cliente-delete', ['only' => ['delete','destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(ClientesDataTable $dataTable)
    {
        return $dataTable->render('clientes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $identities = Identity::orderBy('name', 'desc')->pluck('name', 'id')->prepend('-- Seleccione --', '');

        return view('clientes.create', compact('identities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClienteRequest $request)
    {
        $data = $request->all();

        $cliente = Cliente::create($data);

        return redirect()->route('clientes.index', $cliente->id)
                            ->with('success','Registro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        $identities = Identity::orderBy('name', 'desc')->pluck('name', 'id')->prepend('-- Seleccione --', '');

        return view('clientes.show', compact('cliente', 'identities'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        $identities = Identity::orderBy('name', 'desc')->pluck('name', 'id')->prepend('-- Seleccione --', '');

        return view('clientes.edit', compact('cliente', 'identities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        $data = $request->all();

        if(!$cliente->update($data)){
            return redirect()->back()
                            ->with('danger','Registro no actualizado.');
        }
        
        return redirect()->route('clientes.index', $cliente->id)
                            ->with('success','Registro actualizado exitosamente.');
    }

    /**
     * Show de form to confirm the remove from storage.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function delete(Cliente $cliente): View
    {
        return view('clientes.delete',compact('cliente'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        if($cliente->ordens->count() > 0){
            return redirect()->back()
                            ->with('danger','Registro no eliminado, tiene ordenes asociadas.');
        }

        if(!$cliente->delete()){
            return redirect()->back()
                            ->with('danger','Registro no eliminado.');
        }

        return redirect()->route('clientes.index')
                            ->with('success','Registro eliminado exitosamente.');
    }
}
