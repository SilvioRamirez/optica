<?php

namespace App\Http\Controllers;

use App\Models\CondicionOptica;
use App\DataTables\CondicionOpticasDataTable;
use Illuminate\Http\Request;

class CondicionOpticaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CondicionOpticasDataTable $dataTable)
    {
        return $dataTable->render('condicionOpticas.index');
    }

}
