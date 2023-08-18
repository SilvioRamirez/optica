<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreExamenRequest;
use App\Http\Requests\UpdateExamenRequest;
use App\DataTables\ExamenesDataTable;
use App\Models\Caracteristicas;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


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
        $data = $request->all();

        Validator::make($data, [
            'email' => [
                'required',
                Rule::unique('examens')->ignore($examene->id),
            ]
        ]);

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

    public function caracteristicas_index($id)
    {
        if($examen = Examen::find($id)){
                return view('caracteristicas.edit', compact('examen'));
        }else{
            return redirect()->route('examenes.index')
                            ->with('error','Examen no encontrado.');
        }
    }

    public function caracteristicas_store(Request $request)
    {
        $examen = Examen::find($request->id);

        $caracteristicas = new Caracteristicas();
        $caracteristicas->examen_id         = $request->examen_id;
        $caracteristicas->caracteristica    = $request->caracteristica;
        $caracteristicas->ref_inferior      = $request->ref_inferior;
        $caracteristicas->ref_superior      = $request->ref_superior;
        $caracteristicas->unidad            = $request->unidad;

        if($caracteristicas->save()){
            return redirect()->back()->with('success','Caracteristica agregada exitosamente.');
        }
    }

    public function caracteristicas_destroy($id)
    {
        $caracteristicas = Caracteristicas::find($id);
        if($caracteristicas->delete()){
            return redirect()->back()->with('success','Caracteristica eliminada exitosamente.');
        }else{
            return redirect()->back()->with('error','Caracteristica no eliminada.');
        }
    }

}
