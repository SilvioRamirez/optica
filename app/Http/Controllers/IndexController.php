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

    public function condicionesServicio()
    {
        $configuracion = Configuracion::first();
        return view('condicionesServicio.index', compact('configuracion'));
    }

    public function acercaDe()
    {
        $configuracion = Configuracion::first();
        return view('acercaDe.index', compact('configuracion'));
    }

    public function politicaEliminacion()
    {
        $configuracion = Configuracion::first();
        return view('politicaEliminacion.index', compact('configuracion'));
    }

    public function politicaWhatsapp()
    {
        $configuracion = Configuracion::first();
        return view('whatsappBusiness.index', compact('configuracion'));
    }
}
