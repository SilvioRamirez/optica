<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Spatie\Activitylog\Models\Activity;
use App\DataTables\ActivityDataTable;

class ActivityController extends Controller
{
    /**
     * Verifica los permisos de los usuarios en el controlador
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','show']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['delete','destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ActivityDataTable $dataTable)
    {
        return $dataTable->render('logs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_all(): RedirectResponse
    {
        if (Activity::truncate()){
            return redirect()->route('logs.index')
                            ->with('success','La tabla ha sido vaciada correctamente.');
        }else{
            return redirect()->route('logs.index')
                            ->with('error','Ha ocurrido un error.');
        }
    }
}
