<?php

namespace App\Http\Controllers;

use App\DataTables\ProductosDataTable;
use App\Models\Categoria;
use App\Models\Producto;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Realiza las validaciones en los permisos de spatie
     *
     */
    function __construct()
    {
        $this->middleware('permission:producto-list|producto-create|producto-edit|producto-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:producto-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:producto-edit',   ['only' => ['edit', 'update']]);
        $this->middleware('permission:producto-delete', ['only' => ['delete', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(ProductosDataTable $dataTable)
    {
        return $dataTable->render('productos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nombre','asc')->pluck('nombre', 'id')->prepend('-- Seleccione --', '');
        return view('productos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // Procesar la imagen si se subió una
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $rutaImagen = $imagen->storeAs('productos', $nombreImagen, 'public');
            $data['imagen'] = $rutaImagen;
        }

        // Procesar checkboxes
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['exento_iva'] = $request->has('exento_iva') ? 1 : 0;

        $producto = Producto::create($data);

        return redirect()->route('productos.index', $producto->id)
            ->with('success', 'Registro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto): View
    {
        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto): View
    {
        $categorias = Categoria::orderBy('nombre','asc')->pluck('nombre', 'id')->prepend('-- Seleccione --', '');
        return view('productos.edit', compact('producto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto): RedirectResponse
    {
        $data = $request->all();

        // Procesar la imagen si se subió una nueva
        if ($request->hasFile('imagen')) {
            // Eliminar imagen anterior si existe
            if ($producto->imagen && \Storage::disk('public')->exists($producto->imagen)) {
                \Storage::disk('public')->delete($producto->imagen);
            }
            
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $rutaImagen = $imagen->storeAs('productos', $nombreImagen, 'public');
            $data['imagen'] = $rutaImagen;
        }

        // Procesar checkboxes
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['exento_iva'] = $request->has('exento_iva') ? 1 : 0;

        if (!$producto->update($data)) {
            return redirect()->back()
                ->with('danger', 'Registro no actualizado.');
        }

        return redirect()->route('productos.index')
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
        $producto = Producto::find($id);
        return view('productos.delete', compact('producto'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto): RedirectResponse
    {
        $producto->delete();
        return redirect()->route('productos.index')
            ->with('success', 'Registro eliminado exitosamente.');
    }
}
