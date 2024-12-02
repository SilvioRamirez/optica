<?php

namespace Database\Seeders;

use App\Models\Bioanalista;
use App\Models\Caracteristicas;
use App\Models\Configuracion;
use App\Models\Cuota;
use App\Models\Examen;
use App\Models\Formula;
use App\Models\Formulario;
use App\Models\GastoOperativo;
use App\Models\Laboratorio;
use App\Models\Lente;
use App\Models\Muestra;
use App\Models\Operativo;
use Carbon\Carbon;
use App\Models\Paciente;
use App\Models\Pago;
use App\Models\Persona;
use App\Models\Resultados;
use App\Models\ResultadosDetalle;
use App\Models\TipoGasto;
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

/*      Paciente::truncate();
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
        
        $formulario = new Formulario();
        $formulario->numero_orden = '001123';
        $formulario->estatus = 'REGISTRADO';
        $formulario->fecha = '24/02/2024';
        $formulario->paciente = 'SILVIO RAMIREZ';
        $formulario->direccion_operativo = 'ESCUQUE';
        $formulario->telefono = '584126713413';
        $formulario->cedula = 'V20428781';
        $formulario->edad = '31';
        $formulario->tipo = 'MONOFOCAL';
        $formulario->observaciones_extras = 'BLUE';
        $formulario->od_esf = '+5.456';
        $formulario->od_cil = '-4.65';
        $formulario->od_eje = '120';
        $formulario->oi_esf = '+5.456';
        $formulario->oi_cil = '-4.65';
        $formulario->oi_eje = '120';
        $formulario->add = '+1233';
        $formulario->dp = '32';
        $formulario->alt = '20';
        $formulario->especialista = 'JOSE PEREZ';
        $formulario->total = '80';
        $formulario->saldo = '-20';
        $formulario->abono_1_decimal = '20';
        $formulario->abono_fecha_1 = '24/02/2024';
        $formulario->abono_2_decimal = '10';
        $formulario->abono_fecha_2 = '24/02/2024';
        $formulario->abono_3_decimal = '10';
        $formulario->abono_fecha_3 = '24/02/2024';
        $formulario->abono_4_decimal = '10';
        $formulario->abono_fecha_4 = '24/02/2024';
        $formulario->abono_5_decimal = '10';
        $formulario->abono_fecha_5 = '24/02/2024';
        $formulario->save();

        Pago::truncate();
        $pago = new Pago();
        $pago->monto = 100;
        $pago->status = 'SIN PAGOS';
        $pago->save();

        $paciente->pagos()->attach([$pago->id]);

        Cuota::truncate();
        $cuota = new Cuota();
        $cuota->pago_cuota = 50;
        $cuota->save();

        $pago->cuotas()->attach([$cuota->id]);

        Lente::truncate();

        $lente = new Lente();
        $lente->paciente_id = 1;
        $lente->pago_id     = 2;
        $lente->adicion     = 2;
        $lente->distancia_pupilar = 2;
        $lente->alt         = 2;
        $lente->tipo_lente  = 2;
        $lente->tratamiento = 2;
        $lente->numero_orden= 00001;
        $lente->tallado     = 2;
        $lente->status      = 'REGISTRADO';
        $lente->save();

        $paciente->lentes()->attach([$lente->id]);

        Formula::truncate();
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

        $formula = new Formula();
        $formula->ojo = 'OJO IZQUIERDO';
        $formula->esfera = '+2.00';
        $formula->cilindro = '+1.00';
        $formula->eje = '0.5';
        $formula->save();
        $lente->formulas()->attach([$formula->id]); */

        Configuracion::truncate();
        $configuracion = new Configuracion();
        $configuracion->nombre_organizacion = 'OPTIRANGO"';
        $configuracion->representante_organizacion = 'Lcdo. Jhonny Torres';
        $configuracion->representante_cargo = 'Gerente';
        $configuracion->direccion = 'Av. Urdaneta Esq Pelota Edif Profesional Urdaneta Piso 7 Of D Urb Catedral Caracas Distrito Capital';
        $configuracion->telefono_uno = '0424-6406797';
        $configuracion->telefono_dos = '0412-6426797';
        $configuracion->correo = '@opti_rango';
        $configuracion->copyright = '2023';
        $configuracion->save();

        /* Laboratorio::truncate();
        $laboratorio = new Laboratorio();
        $laboratorio->documento_fiscal = 'V17348394';
        $laboratorio->razon_social = 'OPTIRANGO';
        $laboratorio->tipo = 'LABORATORIO DE MONTAJE';
        $laboratorio->representante_organizacion = 'Lcdo. Jhonny Torres';
        $laboratorio->representante_cargo = 'Gerente General';
        $laboratorio->direccion_fiscal = 'Av. Urdaneta Esq Pelota Edif Profesional Urdaneta Piso 7 Of D Urb Catedral Caracas Distrito Capital';
        $laboratorio->telefono_uno = '0424-6406797';
        $laboratorio->telefono_dos = '0412-6426797';
        $laboratorio->correo = 'xd@gmail.com';
        $laboratorio->facebook = 'optirango';
        $laboratorio->instagram = '@optirango';
        $laboratorio->tiktok = 'optirango';
        $laboratorio->save(); */

        /* Persona::truncate();
        $paciente = new Persona();
        $paciente->cedula = 'V20428781';
        $paciente->nombres = 'SILVIO ARTURO';
        $paciente->apellidos = 'RAMÍREZ MOLINA';
        $paciente->fecha_nacimiento = '1992-03-17';
        $paciente->edad = '31';
        $paciente->sexo = 'MASCULINO';
        $paciente->telefono = '0412-6713413';
        $paciente->correo = 'silvio.ramirez.m@gmail.com';
        $paciente->type = 'PERSONA';
        $paciente->observacion = 'Asmatico';
        $paciente->status = 1;
        $paciente->save(); */

        Operativo::truncate();
        $operativo = new Operativo();
        $operativo->estado_id = '20';
        $operativo->municipio_id = '375';
        $operativo->parroquia_id = '916';
        $operativo->sector = 'URB. FRAY IGNACIO ALVAREZ';
        $operativo->direccion = 'CALLE PRINCIPAL';
        $operativo->lugar = 'CANCHA DE LAS RURALES';
        $operativo->nombre_operativo = 'CANCHA DE LAS RURALES';
        $operativo->save();

        TipoGasto::truncate();
        $tipoGasto = new TipoGasto();
        $tipoGasto->tipo_gasto = 'TRANSPORTE';
        $tipoGasto->save();

        $tipoGasto2 = new TipoGasto();
        $tipoGasto2->tipo_gasto = 'LOGISTICA';
        $tipoGasto2->save();

        $gastoOperativo = new GastoOperativo();
        $gastoOperativo->operativo_id = 1;
        $gastoOperativo->tipo_gasto_id = 1;
        $gastoOperativo->monto = 100;
        $gastoOperativo->save();

        /* $gastoOperativo->tipoGastos()->attach([$tipoGasto->id]);

        $gastoOperativo->tipoGastos()->attach([$tipoGasto2->id]); */

        /* GastoOperativo
        TipoGasto */

        }
}
