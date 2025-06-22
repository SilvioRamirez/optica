<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;


use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $configuracion = Configuracion::first();
        return view('welcome', compact('configuracion'));
    }

    public function consulta()
    {
        $configuracion = Configuracion::first();
        return view('consultaWeb.index', compact('configuracion'));
    }

    public function politicaPrivacidad()
    {
        $configuracion = Configuracion::first();
        return view('landing.app.politicadeprivacidad', compact('configuracion'));
    }

    public function condicionesServicio()
    {
        $configuracion = Configuracion::first();
        return view('landing.app.condicionesdeservicio', compact('configuracion'));
    }

    public function acercaDe()
    {
        $configuracion = Configuracion::first();
        return view('landing.app.acercade', compact('configuracion'));
    }

    public function politicaEliminacion()
    {
        $configuracion = Configuracion::first();
        return view('landing.app.politicadeeliminacion', compact('configuracion'));
    }

    public function politicaWhatsapp()
    {
        $configuracion = Configuracion::first();
        return view('landing.app.whatsappbusiness', compact('configuracion'));
    }

    public function facebook()
    {
        $configuracion = Configuracion::first();
        return view('landing.app.facebook', compact('configuracion'));
    }
}
