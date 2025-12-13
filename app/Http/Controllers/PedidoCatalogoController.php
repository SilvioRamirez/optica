<?php

namespace App\Http\Controllers;

use App\DataTables\PedidosCatalogoDataTable;
use App\Models\Categoria;
use App\Models\PedidosCatalogo;
use App\Models\Pedido;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PedidoCatalogoController extends Controller
{
    /**
     * Realiza las validaciones en los permisos de spatie
     *
     */
    function __construct()
    {
        $this->middleware('permission:pedidos-catalogo-list|pedidos-catalogo-create|pedidos-catalogo-edit|pedidos-catalogo-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:pedidos-catalogo-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:pedidos-catalogo-edit',   ['only' => ['edit', 'update']]);
        $this->middleware('permission:pedidos-catalogo-delete', ['only' => ['delete', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(PedidosCatalogoDataTable $dataTable)
    {
        return $dataTable->render('pedidos-catalogo.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nombre','asc')->pluck('nombre', 'id')->prepend('-- Seleccione --', '');
        return view('pedidos-catalogo.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();        

        $pedido = PedidosCatalogo::create($data);

        return redirect()->route('pedidos-catalogo.index', $pedido->id)
            ->with('success', 'Registro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PedidosCatalogo $pedido): View
    {
        return view('pedidos-catalogo.show', compact('pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PedidosCatalogo $pedido): View
    {
        $categorias = Categoria::orderBy('nombre','asc')->pluck('nombre', 'id')->prepend('-- Seleccione --', '');
        return view('pedidos-catalogo.edit', compact('pedido', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PedidosCatalogo $pedido): RedirectResponse
    {
        $data = $request->all();

        if (!$pedido->update($data)) {
            return redirect()->back()
                ->with('danger', 'Registro no actualizado.');
        }

        return redirect()->route('pedidos-catalogo.index')
            ->with('success', 'Registro actualizado exitosamente.');
    }

    /**
     * Show de form to confirm the remove from storage.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function delete($id): View
    {
        $pedido = PedidosCatalogo::find($id);
        return view('pedidos-catalogo.delete', compact('pedido'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PedidosCatalogo $pedido): RedirectResponse
    {
        $pedido->delete();
        return redirect()->route('pedidos-catalogo.index')
            ->with('success', 'Registro eliminado exitosamente.');
    }
}
