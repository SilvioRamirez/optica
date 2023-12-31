<?php

namespace App\Http\Controllers;

use App\DataTables\EntLentesDataTable;
use App\DataTables\LbLentesDataTable;
use App\DataTables\LentesDataTable;
use App\DataTables\PeLentesDataTable;
use App\DataTables\PrLentesDataTable;
use App\Models\Lente;
use App\Http\Requests\StoreLenteRequest;
use App\Http\Requests\UpdateLenteRequest;
use App\Models\Paciente;
use App\Models\Tratamiento;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class LenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LentesDataTable $dataTable)
    {
        return $dataTable->render('lentes.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $pacientes = Paciente::all();
        $tratamiento = Tratamiento::pluck('tratamiento', 'id')->prepend('--Seleccione--', '');

        return view('lentes.create', compact('pacientes', 'tratamiento'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        /* request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]); */
    
        Lente::create($request->all());
    
        return redirect()->route('lentes.index')
                        ->with('success','Lente created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Lente  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Lente $lente): View
    {
        return view('lentes.show',compact('lente'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lente  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Lente $lente): View
    {
        return view('lentes.edit',compact('lente'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lente  $lente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lente $lente): RedirectResponse
    {
        /* request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]); */
    
        $lente->update($request->all());
    
        return redirect()->route('lentes.index')
                        ->with('success','Lente updated successfully');
    }

    /**
     * Show de form to confirm the remove from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id): View
    {
        $lente = Lente::find($id);
        return view('lentes.delete',compact('lente'));
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lente  $lente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lente $lente): RedirectResponse
    {
        $lente->delete();
    
        return redirect()->route('lentes.index')
                        ->with('success','Lente deleted successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function prLentesIndex(PrLentesDataTable $dataTable)
    {
        return $dataTable->render('lentes.index-pr');
    }

    public function prLente(Lente $lente){
        /* return datatables()->eloquent(Lente::query())->toJson(); */
        //return datatables()->query(DB::table('lentes')->with('tratamientos'))->toJson();

        //return datatables()->eloquent(Lente::with(['tratamientos']))->toJson();

        //$lente = Lente::find($id);
        return $lente = Lente::where('id', $lente->id)
            ->with(['pacientes' => function($query){
                //$query->with('lentes');
            }])
            //->with('first_paciente')
            ->with('formulas')
            ->with('tratamientos')
            ->with('userCreate')
            ->with('userLb')
            ->with('userPe')
            ->with('userEnt')
            ->first()->toJson();
        //return $lente->->toJson();
        
    }

    public function rvLente(Lente $lente, Request $request){

        $lente->update([
                'status' => $request->params['status'], 
                'laboratorio_id' => $request->params['laboratorio_id'],
                'user_lb_id' => $request->user()->id,
                'user_lb_date' => \Carbon\Carbon::now()->toDateTimeString()
            ]);

        return $lente->toJson();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lbLentesIndex(LbLentesDataTable $dataTable)
    {
        return $dataTable->render('lentes.index-lb');
    }

    public function lbLente(Lente $lente){

        return $lente = Lente::where('id', $lente->id)
            ->with(['pacientes' => function($query){
                //$query->with('lentes');
            }])
            //->with('first_paciente')
            ->with('formulas')
            ->with('tratamientos')
            ->with('laboratorio')
            ->with('userCreate')
            ->with('userLb')
            ->with('userPe')
            ->with('userEnt')
            ->first()->toJson();
        //return $lente->->toJson();
        
    }

    public function prepararLente(Lente $lente, Request $request){

        $lente->update([
                'status' => 'POR ENTREGAR',
                'user_pe_id' => $request->user()->id,
                'user_pe_date' => \Carbon\Carbon::now()->toDateTimeString()
            ]);

        return $lente->toJson();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function peLentesIndex(PeLentesDataTable $dataTable)
    {
        return $dataTable->render('lentes.index-pe');
    }

    public function peLente(Lente $lente){

        return $lente = Lente::where('id', $lente->id)
            ->with(['pacientes' => function($query){
                //$query->with('lentes');
            }])
            //->with('first_paciente')
            ->with('formulas')
            ->with('tratamientos')
            ->with('laboratorio')
            ->with('userCreate')
            ->with('userLb')
            ->with('userPe')
            ->with('userEnt')
            ->first()->toJson();
        //return $lente->->toJson();
        
    }

    public function entregarLente(Lente $lente, Request $request){

        $lente->update([
                'status' => 'ENTREGADO',
                'user_ent_id' => $request->user()->id,
                'user_ent_date' => \Carbon\Carbon::now()->toDateTimeString()
            ]);

        return $lente->toJson();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function entLentesIndex(EntLentesDataTable $dataTable)
    {
        return $dataTable->render('lentes.index-ent');
    }
}
