<?php

namespace App\Http\Controllers;

use App\Models\Identity;
use App\Http\Requests\StoreIdentityRequest;
use App\Http\Requests\UpdateIdentityRequest;
use App\DataTables\IdentitiesDataTable;

class IdentityController extends Controller
{

    /**
     * Realiza las validaciones en los permisos de spatie
     *
     */
    function __construct()
    {
        $this->middleware('permission:identity-list|identity-create|identity-edit|identity-delete', ['only' => ['index','show']]);
        $this->middleware('permission:identity-create', ['only' => ['create','store']]);
        $this->middleware('permission:identity-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:identity-delete', ['only' => ['delete','destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(IdentitiesDataTable $dataTable)
    {
        return $dataTable->render('identities.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('identities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIdentityRequest $request)
    {
        $data = $request->all();

        $identity = Identity::create($data);

        return redirect()->route('identities.index', $identity->id)
                            ->with('success','Registro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Identity $identity)
    {
        return view('identities.show', compact('identity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Identity $identity)
    {
        return view('identities.edit', compact('identity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIdentityRequest $request, Identity $identity)
    {
        $data = $request->all();

        if(!$identity->update($data)){
            return redirect()->back()
                            ->with('danger','Registro no actualizado.');
        }
        
        return redirect()->route('identities.index', $identity->id)
                            ->with('success','Registro actualizado exitosamente.');
    }

    /**
     * Show de form to confirm the remove from storage.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function delete(Identity $identity): View
    {
        return view('identities.delete',compact('identity'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Identity $identity)
    {
        if(!$identity->delete()){
            return redirect()->back()
                            ->with('danger','Registro no eliminado.');
        }

        return redirect()->route('identities.index')
                            ->with('success','Registro eliminado exitosamente.');
    }
}
