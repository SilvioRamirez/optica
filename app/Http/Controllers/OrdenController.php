<?php

namespace App\Http\Controllers;

use App\DataTables\OrdensDataTable;
use App\Models\Cliente;
use App\Models\Orden;
use App\Models\Estatus;
use App\Models\TipoLente;
use App\Models\TipoTratamiento;
use App\Http\Requests\StoreOrdenRequest;
use App\Http\Requests\UpdateOrdenRequest;
use App\Models\Tipo;
use App\Models\Origen;
use Illuminate\Http\Request;

class OrdenController extends Controller
{

    /**
     * Realiza las validaciones en los permisos de spatie
     *
     */
    function __construct()
    {
        $this->middleware('permission:orden-list|orden-create|orden-edit|orden-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:orden-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:orden-edit',   ['only' => ['edit', 'update']]);
        $this->middleware('permission:orden-delete', ['only' => ['delete', 'destroy']]);
        $this->middleware('permission:orden-estatus', ['only' => ['estatusFormulario', 'cambiarEstatus']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(OrdensDataTable $dataTable)
    {
        $tipos = Tipo::orderBy('tipo', 'asc')->pluck('tipo', 'id')->prepend('-- Seleccione --', '');
        $origens = Origen::orderBy('nombre', 'asc')->pluck('nombre', 'id')->prepend('-- Seleccione --', '');
        $statuses = Estatus::pluck('estatus', 'estatus')->prepend('-- Seleccione --', '');
        return $dataTable->render('ordens.index', compact('tipos', 'origens', 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::orderBy('name', 'desc')->pluck('name', 'id')->prepend('-- Seleccione --', '');
        $tipoLentes = TipoLente::get(['id', 'tipo_lente']);
        $tipoTratamientos = TipoTratamiento::orderBy('tipo_tratamiento', 'desc')->pluck('tipo_tratamiento', 'id')->prepend('-- Seleccione --', '');
        $tipoFormulas = ['TERMINADA' => 'TERMINADA', 'TALLADA' => 'TALLADA'];
        $estatuses = Estatus::pluck('estatus', 'estatus')->prepend('-- Seleccione --', '');
        $orden = null;

        return view('ordens.create', compact('clientes', 'tipoLentes', 'tipoTratamientos', 'tipoFormulas', 'estatuses', 'orden'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrdenRequest $request)
    {
        $data = $request->all();

        if (!Orden::create($data)) {
            return redirect()->back()
                ->with('danger', 'Error al crear la orden.');
        }

        return redirect()->route('ordens.index')
            ->with('success', 'Orden creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Orden $orden)
    {
        $clientes = Cliente::orderBy('name', 'desc')->pluck('name', 'id')->prepend('-- Seleccione --', '');
        $tipoLentes = TipoLente::get(['id', 'tipo_lente']);
        $tipoTratamientos = TipoTratamiento::orderBy('tipo_tratamiento', 'desc')->pluck('tipo_tratamiento', 'id')->prepend('-- Seleccione --', '');
        $tipoFormulas = ['TERMINADA' => 'TERMINADA', 'TALLADA' => 'TALLADA'];
        $estatuses = Estatus::pluck('estatus', 'estatus')->prepend('-- Seleccione --', '');

        return view('ordens.show', compact('orden', 'clientes', 'tipoLentes', 'tipoTratamientos', 'tipoFormulas', 'estatuses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orden $orden)
    {
        $clientes = Cliente::orderBy('name', 'desc')->pluck('name', 'id')->prepend('-- Seleccione --', '');
        $tipoLentes = TipoLente::get(['id', 'tipo_lente']);
        $tipoTratamientos = TipoTratamiento::orderBy('tipo_tratamiento', 'desc')->pluck('tipo_tratamiento', 'id')->prepend('-- Seleccione --', '');
        $tipoFormulas = ['TERMINADA' => 'TERMINADA', 'TALLADA' => 'TALLADA'];
        $estatuses = Estatus::pluck('estatus', 'estatus')->prepend('-- Seleccione --', '');


        return view('ordens.edit', compact('orden', 'clientes', 'tipoLentes', 'tipoTratamientos', 'tipoFormulas', 'estatuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrdenRequest $request, Orden $orden)
    {
        $data = $request->all();

        if (!$orden->update($data)) {
            return redirect()->back()
                ->with('danger', 'Error al actualizar la orden.');
        }

        return redirect()->route('ordens.index')
            ->with('success', 'Orden actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orden $orden)
    {
        if (!$orden->delete()) {
            return redirect()->back()
                ->with('danger', 'Error al eliminar la orden.');
        }

        return redirect()->route('ordens.index')
            ->with('success', 'Orden eliminada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Orden $orden)
    {
        return view('ordens.delete', compact('orden'));
    }

    /* Consulta de Pagos Orden */
    public function ordenPayments(Orden $orden)
    {
        return $orden = Orden::where('id', $orden->id)
            ->with('cliente')
            ->with('tipoTratamiento')
            ->with('tipoLente')
            ->with('ordenPayments', function ($query) {
                $query->with('origen')
                    ->with('tipo');
            })
            ->get()
            ->first()
            ->toJson();
    }

    /* Actualizar Estatus de la Orden */
    public function updateStatus(Request $request)
    {
        $data = $request->all();
        $orden = Orden::find($data['orden_id']);
        $orden->status = $data['status'];
        $orden->fecha_entrega = $data['fecha_entrega'];
        $orden->save();

        /* $orden->load(
            'cliente', 
            'tipoTratamiento', 
            'tipoLente', 
            'ordenPayments',
            'ordenPayments.origen',
            'ordenPayments.tipo'
        ); */

        return response()->json(['message' => 'Estatus actualizado correctamente', 'orden' => $orden]);
    }
}
