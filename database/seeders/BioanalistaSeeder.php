<?php

namespace Database\Seeders;

use App\Models\Bioanalista;
use App\Models\Caracteristicas;
use App\Models\Examen;
use Carbon\Carbon;
use App\Models\Paciente;
use App\Models\Resultados;
use App\Models\ResultadosDetalle;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BioanalistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bioanalista::truncate();

        $bioanalista = new Bioanalista();
        $bioanalista->cedula = 'V5763645';
        $bioanalista->nombres = 'Xiomara';
        $bioanalista->apellidos = 'Molina Macias';
        $bioanalista->direccion = 'Urb. Fray Ignacio Alvarez, Calle Las Flores Casa 33-33, Parroquia Escuque, Municipio Escuque, Estado Trujillo';
        $bioanalista->telefono = '0426-4277034';
        $bioanalista->fecha_nacimiento = '1964-11-04';
        $bioanalista->documento = '123456';
        $bioanalista->colegio = 'Colegio de Bioanalistas del Estado Trujillo';
        $bioanalista->fecha_ingreso = '1990-01-01';
        $bioanalista->expediente = 'Ninguno';
        $bioanalista->status = 1;
        $bioanalista->save();

        Paciente::truncate();
        $paciente = new Paciente();
        $paciente->cedula = 'V20428781';
        $paciente->nombres = 'Silvio Arturo';
        $paciente->apellidos = 'Ramírez Molina';
        $paciente->fecha_nacimiento = '1992-03-17';
        $paciente->edad = '31';
        $paciente->sexo = 'MASCULINO';
        $paciente->telefono = '0412-6713413';
        $paciente->direccion = 'Escuque';
        $paciente->correo = 'silvio.ramirez.m@gmail.com';
        $paciente->observacion = 'Asmatico';
        $paciente->status = 1;
        $paciente->save();
        
        Examen::truncate();
        $examen = new Examen();
        $examen->nombre = 'HEMATOLOGIA';
        $examen->status = 1;
        $examen->save();

        Caracteristicas::truncate();
        $caracteristicas = new Caracteristicas();
        $caracteristicas->examen_id = 1;
        $caracteristicas->caracteristica = 'HEMATOCRITO';
        $caracteristicas->ref_inferior = '10';
        $caracteristicas->ref_superior = '100';
        $caracteristicas->unidad = 'ML';
        $caracteristicas->save();

        $caracteristicas = new Caracteristicas();
        $caracteristicas->examen_id = 1;
        $caracteristicas->caracteristica = 'GLOBULINA';
        $caracteristicas->ref_inferior = '30';
        $caracteristicas->ref_superior = '10';
        $caracteristicas->unidad = '%';
        $caracteristicas->save();

        Resultados::truncate();
        $resultados = new Resultados();
        $resultados->paciente_id = 1;
        $resultados->bioanalista_id = 1;
        $resultados->examen_id = 1;
        $resultados->save();

        ResultadosDetalle::truncate();
        $resultadosDetalle = new ResultadosDetalle();
        $resultadosDetalle->resultados_id = 1;
        $resultadosDetalle->caracteristicas_id = 1;
        $resultadosDetalle->resultado = '300';
        $resultadosDetalle->save();

        $resultadosDetalle = new ResultadosDetalle();
        $resultadosDetalle->resultados_id = 1;
        $resultadosDetalle->caracteristicas_id = 2;
        $resultadosDetalle->resultado = '10';
        $resultadosDetalle->save();

        $resultados->resultadosDetalle()->attach([1, 2]);


    }
}
