<?php

namespace App\Http\Controllers;

use App\DataTables\CategoriasDataTable;
use App\Models\Categoria;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Realiza las validaciones en los permisos de spatie
     *
     */
    function __construct()
    {
        $this->middleware('permission:categoria-list|categoria-create|categoria-edit|categoria-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:categoria-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:categoria-edit',   ['only' => ['edit', 'update']]);
        $this->middleware('permission:categoria-delete', ['only' => ['delete', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(CategoriasDataTable $dataTable)
    {
        return $dataTable->render('categorias.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $categoria = Categoria::create($data);

        return redirect()->route('categorias.index', $categoria->id)
            ->with('success', 'Registro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria): View
    {
        return view('categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria): View
    {
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria): RedirectResponse
    {
        $data = $request->all();

        if (!$categoria->update($data)) {
            return redirect()->back()
                ->with('danger', 'Registro no actualizado.');
        }

        return redirect()->route('categorias.index')
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
        $categoria = Categoria::find($id);
        return view('categorias.delete', compact('categoria'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria): RedirectResponse
    {
        $categoria->delete();
        return redirect()->route('categorias.index')
            ->with('success', 'Registro eliminado exitosamente.');
    }
}
