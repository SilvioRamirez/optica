<?php

namespace Database\Seeders;

use App\Models\Bioanalista;
use App\Models\Caracteristicas;
use App\Models\Configuracion;
use App\Models\Examen;
use App\Models\Muestra;
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
        $bioanalista->nombres = 'XIOMARA';
        $bioanalista->apellidos = 'MOLINA MACIAS';
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
        $paciente->nombres = 'SILVIO ARTURO';
        $paciente->apellidos = 'RAMÍREZ MOLINA';
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
        $caracteristicas->caracteristica = 'HEMOGLOBINA';
        $caracteristicas->unidad = 'gr/dl';
        $caracteristicas->ref_inferior = '';
        $caracteristicas->ref_superior = '';
        $caracteristicas->save();

        $caracteristicas = new Caracteristicas();
        $caracteristicas->examen_id = 1;
        $caracteristicas->caracteristica = 'HEMATOCRITO';
        $caracteristicas->unidad = '&';
        $caracteristicas->ref_inferior = '';
        $caracteristicas->ref_superior = '';
        $caracteristicas->save();

        $caracteristicas = new Caracteristicas();
        $caracteristicas->examen_id = 1;
        $caracteristicas->caracteristica = 'PLAQUETAS';
        $caracteristicas->unidad = 'xmm3';
        $caracteristicas->ref_inferior = '';
        $caracteristicas->ref_superior = '';
        $caracteristicas->save();

        $caracteristicas = new Caracteristicas();
        $caracteristicas->examen_id = 1;
        $caracteristicas->caracteristica = 'PLAQUETAS';
        $caracteristicas->unidad = 'xmm3';
        $caracteristicas->ref_inferior = '';
        $caracteristicas->ref_superior = '';
        $caracteristicas->save();

        $caracteristicas = new Caracteristicas();
        $caracteristicas->examen_id = 1;
        $caracteristicas->caracteristica = 'TIEMPO DE PROTOMBINA';
        $caracteristicas->unidad = 'seg';
        $caracteristicas->ref_inferior = '';
        $caracteristicas->ref_superior = '';
        $caracteristicas->save();

        $caracteristicas = new Caracteristicas();
        $caracteristicas->examen_id = 1;
        $caracteristicas->caracteristica = 'TIEMPO DE CONTROL';
        $caracteristicas->unidad = 'seg';
        $caracteristicas->ref_inferior = '';
        $caracteristicas->ref_superior = '';
        $caracteristicas->save();

        $caracteristicas = new Caracteristicas();
        $caracteristicas->examen_id = 1;
        $caracteristicas->caracteristica = 'TIEMPO PARCIAL DE TROMBOPLASTINA';
        $caracteristicas->unidad = 'seg';
        $caracteristicas->ref_inferior = '';
        $caracteristicas->ref_superior = '';
        $caracteristicas->save();

        $caracteristicas = new Caracteristicas();
        $caracteristicas->examen_id = 1;
        $caracteristicas->caracteristica = 'TIEMPO DE CONTROL';
        $caracteristicas->unidad = 'seg';
        $caracteristicas->ref_inferior = '';
        $caracteristicas->ref_superior = '';
        $caracteristicas->save();

        $caracteristicas = new Caracteristicas();
        $caracteristicas->examen_id = 1;
        $caracteristicas->caracteristica = 'ERITROSEDIMENTACION (VSG)';
        $caracteristicas->unidad = 'mm (Wintrobe) por hora';
        $caracteristicas->ref_inferior = '';
        $caracteristicas->ref_superior = '';
        $caracteristicas->save();

        $caracteristicas = new Caracteristicas();
        $caracteristicas->examen_id = 1;
        $caracteristicas->caracteristica = 'LEUCOCITOS';
        $caracteristicas->unidad = 'xmm3';
        $caracteristicas->ref_inferior = '';
        $caracteristicas->ref_superior = '';
        $caracteristicas->save();

        $caracteristicas = new Caracteristicas();
        $caracteristicas->examen_id = 1;
        $caracteristicas->caracteristica = 'S. NEUTROFILO';
        $caracteristicas->unidad = '%';
        $caracteristicas->ref_inferior = '';
        $caracteristicas->ref_superior = '';
        $caracteristicas->save();

        $caracteristicas = new Caracteristicas();
        $caracteristicas->examen_id = 1;
        $caracteristicas->caracteristica = 'S. EOSINOFILO';
        $caracteristicas->unidad = '%';
        $caracteristicas->ref_inferior = '';
        $caracteristicas->ref_superior = '';
        $caracteristicas->save();

        $caracteristicas = new Caracteristicas();
        $caracteristicas->examen_id = 1;
        $caracteristicas->caracteristica = 'LINFOCITOS';
        $caracteristicas->unidad = '%';
        $caracteristicas->ref_inferior = '';
        $caracteristicas->ref_superior = '';
        $caracteristicas->save();

        $caracteristicas = new Caracteristicas();
        $caracteristicas->examen_id = 1;
        $caracteristicas->caracteristica = 'MONOCITOS';
        $caracteristicas->unidad = '&';
        $caracteristicas->ref_inferior = '';
        $caracteristicas->ref_superior = '';
        $caracteristicas->save();

        Muestra::truncate();
        $muestra = new Muestra();
        $muestra->nombre = 'SANGRE';
        $muestra->status = 1;
        $muestra->save();

        $muestra = new Muestra();
        $muestra->nombre = 'ORINA';
        $muestra->status = 1;
        $muestra->save();

        $muestra = new Muestra();
        $muestra->nombre = 'HECES';
        $muestra->status = 1;
        $muestra->save();

        Resultados::truncate();
        $resultados = new Resultados();
        $resultados->paciente_id = 1;
        $resultados->bioanalista_id = 1;
        $resultados->examen_id = 1;
        $resultados->muestra_id = 1;
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

        Configuracion::truncate();
        $configuracion = new Configuracion();
        $configuracion->nombre_organizacion = 'Laboratorio Clinico "San Benito de Palermo"';
        $configuracion->representante_organizacion = 'Lcda. Xiomara Molina';
        $configuracion->representante_cargo = 'BIOANALISTA';
        $configuracion->direccion = 'Av. 10 Entre Calles 11 y 12 Edif. Ana Maria Piso 1 Valera, Edo. Trujillo';
        $configuracion->telefono_uno = '0271-2218905';
        $configuracion->telefono_dos = '0426-4277034';
        $configuracion->correo = 'laboratoriosanbenitodepalermo@gmail.com';
        $configuracion->copyright = '2023';
        $configuracion->save();

    }
}
