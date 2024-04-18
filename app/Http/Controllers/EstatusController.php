<?php

namespace App\Http\Controllers;

use App\DataTables\EstatusesDataTable;
use App\Models\Estatus;
use App\Http\Requests\StoreEstatusRequest;
use App\Http\Requests\UpdateEstatusRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EstatusController extends Controller
{
    /**
     * Check Spatie Permissions
     *
     */
    function __construct()
    {
        $this->middleware('permission:estatus-list|estatus-create|estatus-edit|estatus-delete', ['only' => ['index','show']]);
        $this->middleware('permission:estatus-create', ['only' => ['create','store']]);
        $this->middleware('permission:estatus-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:estatus-delete', ['only' => ['delete','destroy']]);
    }

        /**
     * Display a listing of the resource.
     */
    public function index(EstatusesDataTable $dataTable)
    {
        return $dataTable->render('estatus.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estatus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEstatusRequest $request): RedirectResponse
    {
        $data = $request->all();

        $estatus = Estatus::create($data);

        return redirect()->route('estatus.index', $estatus->id)
                            ->with('success','Registro creado exitosamente: '.$estatus->estatus.'.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Estatus $estatus): View
    {
        return view('estatus.show', compact('estatus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estatus $estatus): View
    {
        return view('estatus.edit', compact('estatus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEstatusRequest $request, Estatus $estatus): RedirectResponse
    {
        $data = $request->all();

        if(!$estatus->update($data)){
            return redirect()->back()
                            ->with('danger','Registro no actualizado.');
        }

        return redirect()->route('estatus.index')
                            ->with('success','Registro actualizado exitosamente.');
    }

    /**
     * Show de form to confirm the remove from storage.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function delete($id): View
    {
        $estatus = Estatus::find($id);
        return view('estatus.delete',compact('estatus'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estatus $estatus): RedirectResponse
    {
        $estatus->delete();
        return redirect()->route('estatus.index')
                            ->with('success','Registro eliminado exitosamente.');
    }
}
