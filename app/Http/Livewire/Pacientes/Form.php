<?php

namespace App\Http\Livewire\Pacientes;

use App\Models\Paciente;
use Livewire\Component;

class Form extends Component
{

    public $cedula;
    public $nombres;
    public $apellidos;
    public $fecha_nacimiento;
    public $edad;
    public $sexo;
    public $telefono;
    public $direccion;
    public $estado;
    public $municipio;
    public $parroquia;
    public $sector;
    public $correo;
    public $observacion;
    public $status;
    public $paciente;

    protected $rules= [
        'cedula' => 'required|unique:pacientes',
        'nombres' => 'required',
        'apellidos' => 'required',
        'fecha_nacimiento' => 'required',
        'edad' => 'required',
        'sexo' => 'required',
        'telefono' => '',
        'direccion' => '',
        'estado' => '',
        'municipio' => '',
        'parroquia' => '',
        'sector' => '',
        'correo' => '',
        'observacion' => '',
        'status' => '',
    ];

    public function mount($id = null)
    {
        if ($id != null) {
            $this->paciente = Paciente::findOrFail($id);
            $this->cedula = $this->paciente->cedula;
            $this->nombres = $this->paciente->nombres;
            $this->apellidos = $this->paciente->apellidos;
            $this->fecha_nacimiento = $this->paciente->fecha_nacimiento;
            $this->edad = $this->paciente->edad;
            $this->sexo = $this->paciente->sexo;
            $this->telefono = $this->paciente->telefono;
            $this->direccion = $this->paciente->direccion;
            $this->estado = $this->paciente->estado;
            $this->municipio = $this->paciente->municipio;
            $this->parroquia = $this->paciente->parroquia;
            $this->sector = $this->paciente->sector;
            $this->correo = $this->paciente->correo;
            $this->observacion = $this->paciente->observacion;
            $this->status = $this->paciente->status;
            
        }
    }
    
    public function render()
    {
        return view('livewire.pacientes.form');
    }

    public function submit()
    {
        // validate
        $this->validate();
        // save
        if ($this->paciente){
            $this->paciente->update([
                'cedula' => $this->cedula,
                'nombres' => $this->nombres,
                'apellidos' => $this->apellidos,
                'fecha_nacimiento' => $this->fecha_nacimiento,
                'edad' => $this->edad,
                'sexo' => $this->sexo,
                'telefono' => $this->telefono,
                'direccion' => $this->direccion,
                'estado' => $this->estado,
                'municipio' => $this->municipio,
                'parroquia' => $this->parroquia,
                'sector' => $this->sector,
                'correo' => $this->correo,
                'observacion' => $this->observacion,
                'status' => $this->status,
            ]);
            $this->emit("updated");
        }else{
            $this->paciente = Paciente::create(
            [
                'cedula' => $this->cedula,
                'nombres' => $this->nombres,
                'apellidos' => $this->apellidos,
                'fecha_nacimiento' => $this->fecha_nacimiento,
                'edad' => $this->edad,
                'sexo' => $this->sexo,
                'telefono' => $this->telefono,
                'direccion' => $this->direccion,
                'estado' => $this->estado,
                'municipio' => $this->municipio,
                'parroquia' => $this->parroquia,
                'sector' => $this->sector,
                'correo' => $this->correo,
                'observacion' => $this->observacion,
                'status' => $this->status,
                ]
            );
            $this->emit("created");
        }
        
    }
}
