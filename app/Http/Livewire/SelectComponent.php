<?php

namespace App\Http\Livewire;

use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\Ciudad;
use Livewire\Component;

class SelectComponent extends Component
{

    //Creamos como propiedades publicas lo que queremos mostrar, en este caso estado, municipio, parroquia, ciudad
    public $estado, $municipio, $parroquia;
    
    //Creamos dos arrays vacios que van a contener los listados
    public $estados = [], $municipios = [], $parroquias = [];
    
    //Se inicializan los arrays en el mount del component
    public function mount()
    {
        $this->estados = Estado::all();

        $this->municipios = collect();

        $this->parroquias = collect();

    }

    //Esta funcion updated se utiliza para desencadenar cierta accion al momento de que se actualice el componente
    public function updatedEstado($estado)
    {
        $this->municipios = Municipio::where('id_estado', $estado)->get();
        $this->municipio = $this->municipios->first()->id ?? null;

        $this->parroquias = Parroquia::where('id_municipio', $this->municipios->first()->id ?? null)->get();
        $this->parroquia = $this->parroquias->first()->id ?? null;
    }

    public function updatedMunicipio($municipio)
    {
        $this->parroquias = Parroquia::where('id_municipio', $municipio)->get();
        $this->parroquia = $this->parroquias->first()->id ?? null;
    }

    public function render()
    {
        return view('livewire.select-component');
    }
}
