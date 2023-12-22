<?php

namespace App\Http\Controllers;

use App\DataTables\MuestrasDataTable;
use App\Models\Muestra;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreMuestraRequest;
use App\Http\Requests\UpdateMuestraRequest;

class MuestraController extends Controller
{
    
    /**
     * Realiza las validaciones en los permisos de spatie
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:muestra-list|muestra-create|muestra-edit|muestra-delete', ['only' => ['index','show']]);
        $this->middleware('permission:muestra-create', ['only' => ['create','store']]);
        $this->middleware('permission:muestra-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:muestra-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(MuestrasDataTable $dataTable)
    {
        return $dataTable->render('muestras.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('muestras.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        request()->validate(Muestra::$rules);

        $data = $request->all();
        $data['status'] = $request->status ? 1 : 0;

        Muestra::create($data);

        return redirect()->route('muestras.index')
                            ->with('success','Muestra creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Muestra $muestra): View
    {
        return view('muestras.show',compact('muestra'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Muestra $muestra): View
    {
        return view('muestras.edit',compact('muestra'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Muestra $muestra): RedirectResponse
    {
        request()->validate(Muestra::$rules);

        $data = $request->all();
        $data['status'] = $request->status ? 1 : 0;

        $muestra->update($data);

        return redirect()->route('muestras.index')
                            ->with('success','Muestra actualizada exitosamente.');
    }

    /**
     * Show de form to confirm the remove from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id): View
    {
        $muestra = Muestra::find($id);
        return view('muestras.delete',compact('muestra'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Muestra $muestra): RedirectResponse
    {
        $muestra->delete();
        return redirect()->route('muestras.index')
                            ->with('success','Muestra eliminada exitosamente.');
    }
}
