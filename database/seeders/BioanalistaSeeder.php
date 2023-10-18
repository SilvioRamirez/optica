<?php

namespace Database\Seeders;

use App\Models\Bioanalista;
use App\Models\Caracteristicas;
use App\Models\Configuracion;
use App\Models\Examen;
use App\Models\Formula;
use App\Models\Lente;
use App\Models\Muestra;
use Carbon\Carbon;
use App\Models\Paciente;
use App\Models\Resultados;
use App\Models\ResultadosDetalle;
use App\Models\Tratamiento;
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
        $bioanalista->cedula    = 'V5763645';
        $bioanalista->nombres   = 'XIOMARA';
        $bioanalista->apellidos = 'MOLINA MACIAS';
        $bioanalista->direccion = 'Urb. Fray Ignacio Alvarez, Calle Las Flores Casa 33-33, Parroquia Escuque, Municipio Escuque, Estado Trujillo';
        $bioanalista->telefono  = '0426-4277034';
        $bioanalista->fecha_nacimiento = '1964-11-04';
        $bioanalista->documento = '123456';
        $bioanalista->colegio   = 'Colegio de Bioanalistas del Estado Trujillo';
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
        $paciente->correo = 'silvio.ramirez.m@gmail.com';
        $paciente->observacion = 'Asmatico';
        $paciente->status = 1;
        $paciente->save();
        
        Lente::truncate();
        $lente = new Lente();
        $lente->paciente_id = 1;
        $lente->pago_id     = 1;
        $lente->adicion     = 1;
        $lente->distancia_pupilar = 1;
        $lente->alt         = 1;
        $lente->tipo_lente  = 1;
        $lente->tratamiento = 1;
        $lente->terminado   = 1;
        $lente->tallado     = 1;
        $lente->status      = 1;
        $lente->save();

        $paciente->lentes()->attach([$lente->id]);

        $lente = new Lente();
        $lente->paciente_id = 1;
        $lente->pago_id     = 2;
        $lente->adicion     = 2;
        $lente->distancia_pupilar = 2;
        $lente->alt         = 2;
        $lente->tipo_lente  = 2;
        $lente->tratamiento = 2;
        $lente->terminado   = 2;
        $lente->tallado     = 2;
        $lente->status      = 2;
        $lente->save();

        $paciente->lentes()->attach([$lente->id]);

        Formula::truncate();
        $formula = new Formula();
        $formula->ojo = 'OJO IZQUIERDO';
        $formula->esfera = '+2.00';
        $formula->cilindro = '+1.00';
        $formula->eje = '0.5';
        $formula->save();
        $lente->formulas()->attach([$formula->id]);

        $formula = new Formula();
        $formula->ojo = 'OJO DERECHO';
        $formula->esfera = '+1.00';
        $formula->cilindro = '+2.00';
        $formula->eje = '0.2';
        $formula->save();
        $lente->formulas()->attach([$formula->id]);

        Tratamiento::truncate();
        $tratamiento = new Tratamiento();
        $tratamiento->tratamiento = 'CR39';
        $tratamiento->save();

        $tratamiento = new Tratamiento();
        $tratamiento->tratamiento = 'Ar';
        $tratamiento->save();

        $tratamiento = new Tratamiento();
        $tratamiento->tratamiento = 'Blue';
        $tratamiento->save();

        $tratamiento = new Tratamiento();
        $tratamiento->tratamiento = 'Fotocromatico';
        $tratamiento->save();

        $tratamiento = new Tratamiento();
        $tratamiento->tratamiento = 'Policarbonato';
        $tratamiento->save();

        $tratamiento = new Tratamiento();
        $tratamiento->tratamiento = 'Hi index ';
        $tratamiento->save();

        $tratamiento = new Tratamiento();
        $tratamiento->tratamiento = 'Coloración';
        $tratamiento->save();

        $tratamiento = new Tratamiento();
        $tratamiento->tratamiento = 'Otro..';
        $tratamiento->save();

        //$paciente->lentes()->attach([2]);

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
