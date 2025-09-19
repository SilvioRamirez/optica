<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laboratorio {{ $laboratorio->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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

        <h1>Reporte de Laboratorio</h1>

    </div>

    <div class="section">
        <div class="section-title">Información General</div>
        <table>
            <tr>
                <td><strong>Nombre del Laboratorio:</strong></td>
                <td>{{ $laboratorio->razon_social }}</td>
            </tr>
            <tr>
                <td><strong>RIF:</strong></td>
                <td>{{ $laboratorio->rif ?? 'No especificado' }}</td>
            </tr>
            <tr>
                <td><strong>Teléfono:</strong></td>
                <td>{{ $laboratorio->telefono ?? 'No especificado' }}</td>
            </tr>
            <tr>
                <td><strong>Email:</strong></td>
                <td>{{ $laboratorio->email ?? 'No especificado' }}</td>
            </tr>
            <tr>
                <td><strong>Dirección:</strong></td>
                <td>{{ $laboratorio->direccion ?? 'No especificada' }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Estadísticas Generales</div>
        <table>
            <tr>
                <td><strong>Total Formularios Externos:</strong></td>
                <td class="text-end">{{ $totalFormulariosExternos }}</td>
            </tr>
            <tr>
                <td><strong>Formularios Enviados:</strong></td>
                <td class="text-end">{{ $formulariosEnviados }}</td>
            </tr>
            <tr>
                <td><strong>Formularios Retornados:</strong></td>
                <td class="text-end">{{ $formulariosRetornados }}</td>
            </tr>
            <tr>
                <td><strong>Formularios Pendientes:</strong></td>
                <td class="text-end">{{ $formulariosPendientes }}</td>
            </tr>
            <tr>
                <td><strong>Tiempo Promedio de Procesamiento:</strong></td>
                <td class="text-end">{{ $tiempoPromedio && $tiempoPromedio->promedio_dias ? number_format($tiempoPromedio->promedio_dias, 1) : '0' }} días</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Formularios por Origen</div>
        <table>
            <thead>
                <tr>
                    <th>Origen</th>
                    <th>Total</th>
                    <th>Porcentaje</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Órdenes Externas</td>
                    <td class="text-end">{{ $formulariosDeOrdenes }}</td>
                    <td class="text-end">{{ $totalFormulariosExternos > 0 ? round(($formulariosDeOrdenes / $totalFormulariosExternos) * 100, 1) : 0 }}%</td>
                </tr>
                <tr>
                    <td>Formularios Internos</td>
                    <td class="text-end">{{ $formulariosDeFormularios }}</td>
                    <td class="text-end">{{ $totalFormulariosExternos > 0 ? round(($formulariosDeFormularios / $totalFormulariosExternos) * 100, 1) : 0 }}%</td>
                </tr>
            </tbody>
        </table>
    </div>

    @if($ordenesExternasPorTipo->count() > 0)
    <div class="section">
        <div class="section-title">Órdenes Externas por Tipo de Tratamiento y Lente</div>
        <table>
            <thead>
                <tr>
                    <th>Tipo de Tratamiento</th>
                    <th>Tipo de Lente</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php $totalOrdenes = 0; @endphp
                @foreach($ordenesExternasPorTipo as $orden)
                    <tr>
                        <td>{{ $orden->tipo_tratamiento }}</td>
                        <td>{{ $orden->tipo_lente }}</td>
                        <td class="text-end">{{ $orden->total }}</td>
                    </tr>
                    @php $totalOrdenes += $orden->total; @endphp
                @endforeach
                <tr style="background-color: #f5f5f5; font-weight: bold;">
                    <td colspan="2" class="text-end"><strong>Total Órdenes Externas:</strong></td>
                    <td class="text-end"><strong>{{ $totalOrdenes }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if($formulariosInternosPorTipo->count() > 0)
    <div class="section">
        <div class="section-title">Formularios Internos por Tipo, Lente y Estado</div>
        <table>
            <thead>
                <tr>
                    <th>Tipo de Tratamiento</th>
                    <th>Tipo de Lente</th>
                    <th>Estado</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php $totalFormulariosInternos = 0; @endphp
                @foreach($formulariosInternosPorTipo as $formulario)
                    <tr>
                        <td>{{ $formulario->tipo_tratamiento }}</td>
                        <td>{{ $formulario->tipo_lente }}</td>
                        <td>{{ $formulario->estatus }}</td>
                        <td class="text-end">{{ $formulario->total }}</td>
                    </tr>
                    @php $totalFormulariosInternos += $formulario->total; @endphp
                @endforeach
                <tr style="background-color: #f5f5f5; font-weight: bold;">
                    <td colspan="3" class="text-end"><strong>Total Formularios Internos:</strong></td>
                    <td class="text-end"><strong>{{ $totalFormulariosInternos }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if($formulariosPorMes->count() > 0)
    <div class="section">
        <div class="section-title">Actividad por Mes (Últimos 6 meses)</div>
        <table>
            <thead>
                <tr>
                    <th>Año</th>
                    <th>Mes</th>
                    <th>Total Formularios</th>
                </tr>
            </thead>
            <tbody>
                @foreach($formulariosPorMes as $mes)
                    <tr>
                        <td>{{ $mes->año }}</td>
                        <td>
                            @php
                                $nombreMes = [
                                    1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
                                    5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
                                    9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
                                ];
                            @endphp
                            {{ $nombreMes[$mes->mes] ?? $mes->mes }}
                        </td>
                        <td class="text-end">{{ $mes->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    <div class="section">
        <div class="section-title">Resumen de Rendimiento</div>
        <table>
            <tr>
                <td><strong>Eficiencia de Retorno:</strong></td>
                <td class="text-end">{{ $formulariosEnviados > 0 ? round(($formulariosRetornados / $formulariosEnviados) * 100, 1) : 0 }}%</td>
            </tr>
            <tr>
                <td><strong>Formularios en Proceso:</strong></td>
                <td class="text-end">{{ $formulariosPendientes }} ({{ $formulariosEnviados > 0 ? round(($formulariosPendientes / $formulariosEnviados) * 100, 1) : 0 }}%)</td>
            </tr>
            <tr>
                <td><strong>Promedio de Formularios por Mes:</strong></td>
                <td class="text-end">{{ $formulariosPorMes->count() > 0 ? round($formulariosPorMes->avg('total'), 1) : 0 }}</td>
            </tr>
        </table>
    </div>

    <div style="margin-top: 30px; text-align: center; font-size: 10px; color: #666;">
        <p>Reporte generado el {{ now()->format('d/m/Y H:i:s') }}</p>
        <p>{{ $configuracion->nombre_organizacion ?? 'Sistema de Gestión Óptica' }}</p>
    </div>

</body>
</html>
