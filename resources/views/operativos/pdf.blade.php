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
            
            <tr>
                <td><strong>Teléfono:</strong></td>
                <td>{{ $operativo->promotor_telefono }}</td>
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
                <td><strong>Total Formularios:</strong></td>
                <td class="text-end">{{ $totalFormularios }}</td>
            </tr>
            <tr>
                <td><strong>Total Pagos:</strong></td>
                <td class="text-end">{{ $totalPagos }}</td>
            </tr>
            <tr>
                <td><strong>Suma Total Pagos:</strong></td>
                <td class="text-end">${{ number_format($sumaPagos, 2) }}</td>
            </tr>
            <tr>
                <td><strong>Total Gastos:</strong></td>
                <td class="text-end">{{ $totalGastos }}</td>
            </tr>
            <tr>
                <td><strong>Monto Total Gastos:</strong></td>
                <td class="text-end">${{ number_format($sumaTotalGastos, 2) }}</td>
            </tr>
            <tr>
                <td><strong>Total Asesores:</strong></td>
                <td class="text-end">{{ $totalAsesores }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Formularios por Tipo de Tratamiento y Fórmula</div>
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
                        $terminada = $formularios->where('tipo_formula', 'TERMINADA')->sum('total');
                        $tallada = $formularios->where('tipo_formula', 'TALLADA')->sum('total');
                        $total = $formularios->sum('total');
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
        <div class="section-title">Formularios por Especialista y Tipo de Tratamiento</div>
        <table>
            <thead>
                <tr>
                    <th>Especialista</th>
                    <th>Tipo de Lente</th>
                    <th>Tipo de Tratamiento</th>
                    <th>Fórmula</th>
                    <th>Total</th>
                    <th>Precio Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalGeneral = 0;
                    $precioTotalGeneral = 0;
                @endphp
                @foreach($formulariosPorTipoYEspecialista as $formulario)
                    <tr>
                        <td>{{ $formulario->especialista_nombre }} {{ $formulario->especialista_apellido }}</td>
                        <td>{{ $formulario->tipo_lente }}</td>
                        <td>{{ $formulario->tipoTratamiento->tipo_tratamiento ?? 'Sin tratamiento' }}</td>
                        <td>{{ $formulario->tipo_formula }}</td>
                        <td>{{ $formulario->total }}</td>
                        <td>${{ number_format($formulario->precio_total, 2) }}</td>
                    </tr>
                    @php
                        $totalGeneral += $formulario->total;
                        $precioTotalGeneral += $formulario->precio_total;
                    @endphp
                @endforeach
                <tr class="table-primary">
                    <td colspan="4" class="text-end"><strong>Total General:</strong></td>
                    <td><strong>{{ $totalGeneral }}</strong></td>
                    <td><strong>${{ number_format($precioTotalGeneral, 2) }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Pagos por Tipo</div>
        <table>
            <thead>
                <tr>
                    <th>Tipo de Pago</th>
                    <th>Total Pagos</th>
                    <th>Monto Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pagosPorTipo as $pago)
                    <tr>
                        <td>{{ $pago->tipo_nombre }}</td>
                        <td class="text-end">{{ $pago->total_pagos }}</td>
                        <td class="text-end">${{ number_format($pago->monto_total, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Gastos por Tipo</div>
        <table>
            <thead>
                <tr>
                    <th>Tipo de Gasto</th>
                    <th>Total Gastos</th>
                    <th>Monto Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($gastosPorTipo as $gasto)
                    <tr>
                        <td>{{ $gasto->tipo_nombre }}</td>
                        <td class="text-end">{{ $gasto->total_gastos }}</td>
                        <td class="text-end">${{ number_format($gasto->monto_total, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Formularios por Estatus</div>
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