<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreExamenRequest;
use App\Http\Requests\UpdateExamenRequest;
use App\DataTables\ExamenesDataTable;

class ExamenController extends Controller
{
    /**
     * Realiza las validaciones en los permisos de spatie
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:examen-list|examen-create|examen-edit|examen-delete', ['only' => ['index','show']]);
        $this->middleware('permission:examen-create', ['only' => ['create','store']]);
        $this->middleware('permission:examen-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:examen-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(ExamenesDataTable $dataTable)
    {
        return $dataTable->render('examenes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('examenes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        request()->validate(Examen::$rules);

        $data = $request->all();
        $data['status'] = $request->status ? 1 : 0;

        Examen::create($data);

        return redirect()->route('examenes.index')
                            ->with('success','Examen creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Examen $examene): View
    {
        return view('examenes.show',compact('examene'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Examen $examene): View
    {
        return view('examenes.edit',compact('examene'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Examen $examene): RedirectResponse
    {

        request()->validate(Examen::$rules);

        $data = $request->all();
        $data['status'] = $request->status ? 1 : 0;

        $examene->update($data);

        return redirect()->route('examenes.index')
                            ->with('success','Examen actualizado exitosamente.');
    }

    /**
     * Show de form to confirm the remove from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id): View
    {
        $examen = Examen::find($id);
        return view('examenes.delete',compact('examen'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Examen $examene): RedirectResponse
    {
        $examene->delete();
        return redirect()->route('examenes.index')
                            ->with('success','Examen eliminado exitosamente.');
    }

    public function caracteristicas_index($id): View
    {
        if($examen = Examen::find($id)){
            $examen->load('examen.caracteristicas');
            return view('caracteristicas.edit',compact('examen'));
        }
    }

}
