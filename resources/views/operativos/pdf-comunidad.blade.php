<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Operativo {{ $operativo->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            /* font-weight: bold; */
            font-size: 12px;
            line-height: 1.4;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 10px;
        }
        .section {
            margin-bottom: 20px;
        }
        .section-title {
            background-color: #0da5b4;
            padding: 8px;
            font-weight: bold;
            color: white;
            /* border-radius: 4px; */
            /* margin-bottom: 10px; */
            border: 0.5px solid #0da5b4;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 6px;
            text-align: left;
        }
        th {
            background-color: #f5f5f5;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }

        /* .imgHeader{
            float: fixed;
            width: 4cm;
            margin-left: 6.6cm;
            margin-top: -1.0cm;
            border: 0.5px solid red;
            
        }

        #img-logo{
            float: absolute;
            margin-left: 6.6cm;
            margin-top: -1.0cm;
            border: 0.5px solid red;
        }

        #info-header{
            float: absolute;
            margin-left: 4.5cm;
            margin-top: 3.0cm;
            border: 0.5px solid red;
        } */
    </style>
</head>
<body>

    <div class="header">
        
        <img style="margin-top: -1.0cm; margin-bottom: 0.35cm;" src="{{ public_path('storage/img/logo.png') }}" width="180px">

        <div id="info-header">
            <div class=""><strong>{{ $configuracion->nombre_organizacion ?? '' }}</strong></div>
            <div class=""><strong>{{ $configuracion->descripcion_1 ?? '' }}</strong></div>
            <div class=""><strong>{{ $configuracion->direccion ?? '' }}</strong></div>
            <div class=""><strong>{{ $configuracion->direccion_2 ?? '' }}</strong></div>
            <div class=""><strong>{{ 'Teléfono: '.$configuracion->telefono_uno ?? '' }} {{'IG: '.$configuracion->instagram ?? '' }}</strong></div>
            <div class=""><strong>{{ 'WEB: '.$configuracion->pagina_web ?? '' }}</strong></div>
        </div>

        <h1>Reporte de Operativo</h1>

    </div>

    <div class="section">
        <div class="section-title">Información General</div>
        <table>
            <tr>
                <td><strong>Nombre del Operativo:</strong></td>
                <td>{{ $operativo->nombre_operativo }}</td>
            </tr>
            <tr>
                <td><strong>Fecha:</strong></td>
                <td>{{ $operativo->fecha }}</td>
            </tr>
            <tr>
                <td><strong>Estado:</strong></td>
                <td>{{ $operativo->estado->estado }}</td>
            </tr>
            <tr>
                <td><strong>Municipio:</strong></td>
                <td>{{ $operativo->municipio->municipio }}</td>
            </tr>
            <tr>
                <td><strong>Parroquia:</strong></td>
                <td>{{ $operativo->parroquia->parroquia }}</td>
            </tr>
            <tr>
                <td><strong>Sector:</strong></td>
                <td>{{ $operativo->sector }}</td>
            </tr>
            <tr>
                <td><strong>Promotor:</strong></td>
                <td>{{ $operativo->promotor_nombre }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Estadísticas Generales</div>
        <table>
            <tr>
                <td><strong>Total Refractados:</strong></td>
                <td class="text-end">{{ $totalRefractados }}</td>
            </tr>
            <tr>
                <td><strong>Total Lentes a Procesar:</strong></td>
                <td class="text-end">{{ $totalFormularios }}</td>
            </tr>
            <tr>
                <td><strong>Total Asesores:</strong></td>
                <td class="text-end">{{ $totalAsesores }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Lentes por Tipo de Tratamiento y Fórmula</div>
        <table>
            <thead>
                <tr>
                    <th>Tipo de Tratamiento</th>
                    <th>Terminada</th>
                    <th>Tallada</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $tratamientos = $formulariosPorTipo->groupBy('tipo_tratamiento_id');
                @endphp
                @foreach($tratamientos as $tratamientoId => $formularios)
                    @php
                        $terminada = $formularios->where('tipo_formula', 'TERMINADA')->count();
                        $tallada = $formularios->where('tipo_formula', 'TALLADA')->count();
                        $total = $formularios->count();
                    @endphp
                    <tr>
                        <td>{{ $formularios->first()->tipoTratamiento->tipo_tratamiento ?? 'Sin tratamiento' }}</td>
                        <td class="text-end">{{ $terminada }}</td>
                        <td class="text-end">{{ $tallada }}</td>
                        <td class="text-end">{{ $total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Lentes por Especialista y Tipo de Tratamiento</div>
        <table>
            <thead>
                <tr>
                    <th>Especialista</th>
                    <th>Tipo de Lente</th>
                    <th>Tipo de Tratamiento</th>
                    <th>Fórmula</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalGeneral = 0;
                    $especialistaActual = null;
                    $subtotalEspecialista = 0;
                @endphp
                @foreach($formulariosPorTipoYEspecialista as $formulario)
                    @if($especialistaActual !== $formulario->especialista_nombre)
                        @if($especialistaActual !== null)
                            <tr class="table-secondary">
                                <td colspan="4" class="text-end"><strong>Subtotal {{ $especialistaActual }}:</strong></td>
                                <td class="text-end"><strong>{{ $subtotalEspecialista }}</strong></td>
                            </tr>
                        @endif
                        @php
                            $especialistaActual = $formulario->especialista_nombre;
                            $subtotalEspecialista = 0;
                        @endphp
                    @endif
                    <tr>
                        <td>{{ $formulario->especialista_nombre }}</td>
                        <td>{{ $formulario->tipo_lente }}</td>
                        <td>{{ $formulario->tipoTratamiento->tipo_tratamiento ?? 'Sin tratamiento' }}</td>
                        <td>{{ $formulario->tipo_formula }}</td>
                        <td class="text-end">{{ $formulario->total }}</td>
                    </tr>
                    @php
                        $subtotalEspecialista += $formulario->total;
                        $totalGeneral += $formulario->total;
                    @endphp
                @endforeach
                @if($especialistaActual !== null)
                    <tr class="table-secondary">
                        <td colspan="4" class="text-end"><strong>Subtotal {{ $especialistaActual }}:</strong></td>
                        <td class="text-end"><strong>{{ $subtotalEspecialista }}</strong></td>
                    </tr>
                @endif
                <tr class="table-primary">
                    <td colspan="4" class="text-end"><strong>Total General:</strong></td>
                    <td class="text-end"><strong>{{ $totalGeneral }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Condiciones Ópticas Detectadas</div>
        <table>
            <thead>
                <tr>
                    <th>Condición Óptica</th>
                    <th>Cantidad</th>
                    <th>Porcentaje</th>
                </tr>
            </thead>
            <tbody>
                @php $totalCondiciones = $condicionesOpticas->whereNotNull('eval_oj')->where('eval_oj', '!=', '')->count(); @endphp
                @foreach($condicionesOpticas->whereNotNull('eval_oj')->where('eval_oj', '!=', '')->groupBy('eval_oj') as $condicion => $casos)
                    <tr>
                        <td>{{ $condicion }}</td>
                        <td class="text-end">{{ $casos->count() }}</td>
                        <td class="text-end">{{ $totalCondiciones > 0 ? round(($casos->count() / $totalCondiciones) * 100, 1) : 0 }}%</td>
                    </tr>
                @endforeach
                @if($totalCondiciones == 0)
                    <tr>
                        <td colspan="3" class="text-center">No hay datos de condiciones ópticas disponibles</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Estadísticas de Presbicia y Miopía Magna</div>
        <table>
            <thead>
                <tr>
                    <th>Condición</th>
                    <th>Con Condición</th>
                    <th>Sin Condición</th>
                    <th>Total Evaluados</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalEvaluados = $condicionesOpticas->count();
                    $conPresbicia = $condicionesOpticas->where('presbicia', 'PRESBICIA')->count();
                    $sinPresbicia = $totalEvaluados - $conPresbicia;
                    $conMiopiaMagna = $condicionesOpticas->where('miopia_magna', 'MIOPÍA MAGNA')->count();
                    $sinMiopiaMagna = $totalEvaluados - $conMiopiaMagna;
                @endphp
                <tr>
                    <td><strong>Presbicia</strong></td>
                    <td class="text-end">{{ $conPresbicia }} ({{ $totalEvaluados > 0 ? round(($conPresbicia / $totalEvaluados) * 100, 1) : 0 }}%)</td>
                    <td class="text-end">{{ $sinPresbicia }} ({{ $totalEvaluados > 0 ? round(($sinPresbicia / $totalEvaluados) * 100, 1) : 0 }}%)</td>
                    <td class="text-end">{{ $totalEvaluados }}</td>
                </tr>
                <tr>
                    <td><strong>Miopía Magna</strong></td>
                    <td class="text-end">{{ $conMiopiaMagna }} ({{ $totalEvaluados > 0 ? round(($conMiopiaMagna / $totalEvaluados) * 100, 1) : 0 }}%)</td>
                    <td class="text-end">{{ $sinMiopiaMagna }} ({{ $totalEvaluados > 0 ? round(($sinMiopiaMagna / $totalEvaluados) * 100, 1) : 0 }}%)</td>
                    <td class="text-end">{{ $totalEvaluados }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Lentes por Estatus</div>
        <table>
            <thead>
                <tr>
                    <th>Estatus</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($formulariosConEstatus as $formulario)
                    <tr>
                        <td>{{ $formulario->estatus ?? 'Sin estatus' }}</td>
                        <td class="text-end">{{ $formulario->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Asesores del Operativo</div>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($operativo->asesores as $asesor)
                    <tr>
                        <td>{{ $asesor->nombres }} {{ $asesor->apellidos }}</td>
                        <td>{{ $asesor->pivot->rol ?? 'Asesor' }}</td>
                        <td>{{ $asesor->telefono }}</td>
                        <td>{{ $asesor->correo }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html> 