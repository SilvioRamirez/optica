<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;


use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $configuracion = Configuracion::first();
        return view('facebook.index', compact('configuracion'));
    }

    public function consulta()
    {
        $configuracion = Configuracion::first();
        return view('consultaWeb.index', compact('configuracion'));
    }

    public function politicaPrivacidad()
    {
        $configuracion = Configuracion::first();
        return view('politicaPrivacidad.index', compact('configuracion'));
    }
}
