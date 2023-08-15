<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\Redirect;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StorePacienteRequest;
use App\Http\Requests\UpdatePacienteRequest;
use App\DataTables\PacientesDataTable;

class PacienteController extends Controller
{
    /**
     * Realiza las validaciones en los permisos de spatie
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:paciente-list|paciente-create|paciente-edit|paciente-delete', ['only' => ['index','show']]);
        $this->middleware('permission:paciente-create', ['only' => ['create','store']]);
        $this->middleware('permission:paciente-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:paciente-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(PacientesDataTable $dataTable)
    {
        return $dataTable->render('pacientes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        request()->validate(Paciente::$rules);

        $data = $request->all();
        $data['status'] = $request->status ? 1 : 0;

        Paciente::create($data);

        return redirect()->route('pacientes.index')
                            ->with('success','Paciente creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paciente $paciente): View
    {
        return view('pacientes.show',compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paciente $paciente): View
    {
        return view('pacientes.edit',compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paciente $paciente): RedirectResponse
    {

        request()->validate(Paciente::$rules);

        $data = $request->all();
        $data['status'] = $request->status ? 1 : 0;

        $paciente->update($data);

        return redirect()->route('pacientes.index')
                            ->with('success','Paciente actualizado exitosamente.');
    }

    /**
     * Show de form to confirm the remove from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id): View
    {
        $paciente = Paciente::find($id);
        return view('pacientes.delete',compact('paciente'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente): RedirectResponse
    {
        $paciente->delete();
        return redirect()->route('pacientes.index')
                            ->with('success','Paciente eliminado exitosamente.');
    }
}
