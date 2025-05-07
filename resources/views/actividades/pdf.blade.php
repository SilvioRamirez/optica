<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte de Actividades</title>
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
        .table-light {
            background-color: #f8f9fa;
        }
        .table-primary {
            background-color: #0da5b4;
            color: white;
        }
        .table-primary strong {
            color: white;
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

        <h1>Reporte de Actividades</h1>
        <h3>Fecha: {{ \Carbon\Carbon::parse($fecha)->format('d/m/Y') }}</h3>
    </div>

    <div class="section">
        <div class="section-title">Resumen de Pagos</div>
        <table>
            <thead>
                <tr>
                    <th>Tipo de Pago</th>
                    <th>Monto Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalGeneral = 0;
                    $pagosPorTipo = [];
                    foreach($pagos as $pago) {
                        $tipoNombre = $pago->tipo ? $pago->tipo->tipo : 'Sin tipo';
                        if(!isset($pagosPorTipo[$tipoNombre])) {
                            $pagosPorTipo[$tipoNombre] = 0;
                        }
                        $pagosPorTipo[$tipoNombre] += $pago->monto;
                        $totalGeneral += $pago->monto;
                    }
                @endphp

                @foreach($pagosPorTipo as $tipo => $total)
                <tr>
                    <td>{{ $tipo }}</td>
                    <td class="text-end">${{ number_format($total, 2) }}</td>
                </tr>
                @endforeach
                <tr class="table-primary">
                    <td class="text-end"><strong>Total General:</strong></td>
                    <td class="text-end"><strong>${{ number_format($totalGeneral, 2) }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Resumen de Formularios</div>
        <table>
            <thead>
                <tr>
                    <th>Estado</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalFormularios = 0;
                    $formulariosPorEstado = [];
                    foreach($formularios as $formulario) {
                        $estado = $formulario->estatus ?? 'Sin estado';
                        if(!isset($formulariosPorEstado[$estado])) {
                            $formulariosPorEstado[$estado] = 0;
                        }
                        $formulariosPorEstado[$estado]++;
                        $totalFormularios++;
                    }
                @endphp

                @foreach($formulariosPorEstado as $estado => $cantidad)
                <tr>
                    <td>{{ $estado }}</td>
                    <td class="text-end">{{ $cantidad }}</td>
                </tr>
                @endforeach
                <tr class="table-primary">
                    <td class="text-end"><strong>Total Formularios:</strong></td>
                    <td class="text-end"><strong>{{ $totalFormularios }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Detalle de Pagos</div>
        <table>
            <thead>
                <tr>
                    <th>Nro. Orden</th>
                    <th>Monto</th>
                    <th>Referencia</th>
                    <th>Tipo</th>
                    <th>Saldo</th>
                    <th>Estatus</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $pagosOrdenados = $pagos->sortBy(function($pago) {
                        return $pago->tipo ? $pago->tipo->tipo : 'Sin tipo';
                    });
                    
                    $tipoActual = null;
                    $subtotalTipo = 0;
                    $totalGeneral = 0;
                @endphp

                @foreach($pagosOrdenados as $pago)
                    @php
                        $tipoNombre = $pago->tipo ? $pago->tipo->tipo : 'Sin tipo';
                        
                        if ($tipoActual !== null && $tipoActual !== $tipoNombre) {
                            // Mostrar subtotal del tipo anterior
                            echo '<tr class="table-light">
                                    <td colspan="1" class="text-end"><strong>Subtotal ' . $tipoActual . ':</strong></td>
                                    <td colspan="6" class=""><strong>$' . number_format($subtotalTipo, 2) . '</strong></td>
                                  </tr>';
                            $subtotalTipo = 0;
                        }
                        
                        $tipoActual = $tipoNombre;
                        $subtotalTipo += $pago->monto;
                        $totalGeneral += $pago->monto;
                    @endphp
                    <tr>
                        <td>{{ $pago->formulario ? $pago->formulario->numero_orden : '-' }}</td>
                        <td class="text-end">${{ number_format($pago->monto, 2) }}</td>
                        <td>{{ $pago->referencia ?? '-' }}</td>
                        <td>{{ $tipoNombre }}</td>
                        <td>{{ $pago->formulario ? $pago->formulario->saldo : '-' }}</td>
                        <td>{{ $pago->formulario ? $pago->formulario->estatus : '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($pago->created_at)->format('H:i:s') }}</td>
                    </tr>
                @endforeach

                @if($tipoActual !== null)
                    <tr class="table-light">
                        <td colspan="1" class="text-end"><strong>Subtotal {{ $tipoActual }}:</strong></td>
                        <td colspan="6" class=""><strong>${{ number_format($subtotalTipo, 2) }}</strong></td>
                    </tr>
                @endif

                <tr class="table-primary">
                    <td colspan="1" class="text-end"><strong>Total General:</strong></td>
                    <td colspan="6" class=""><strong>${{ number_format($totalGeneral, 2) }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Detalle de Formularios</div>
        <table>
            <thead>
                <tr>
                    <th>Nro. Orden</th>
                    <th>Nombre</th>
                    <th>Tipo Lente</th>
                    <th>Especialista</th>
                    <th>Estatus</th>
                    <th>Saldo</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $formulariosOrdenados = $formularios->sortBy(function($formulario) {
                        return $formulario->estatus ?? 'Sin estado';
                    });
                    
                    $estadoActual = null;
                    $subtotalEstado = 0;
                    $totalGeneral = 0;
                @endphp

                @foreach($formulariosOrdenados as $formulario)
                    @php
                        $estado = $formulario->estatus ?? 'Sin estado';
                        
                        if ($estadoActual !== null && $estadoActual !== $estado) {
                            // Mostrar subtotal del estado anterior
                            echo '<tr class="table-light">
                                    <td colspan="4" class="text-end"><strong>Subtotal ' . $estadoActual . ':</strong></td>
                                    <td colspan="3" class=""><strong>' . $subtotalEstado . '</strong></td>
                                  </tr>';
                            $subtotalEstado = 0;
                        }
                        
                        $estadoActual = $estado;
                        $subtotalEstado++;
                        $totalGeneral++;
                    @endphp
                    <tr>
                        <td>{{ $formulario->numero_orden ?? '-' }}</td>
                        <td>{{ $formulario->paciente ?? '-' }}</td>
                        <td>{{ $formulario->tipoLente ? $formulario->tipoLente->tipo_lente : '-' }}</td>
                        <td>{{ $formulario->especialistaLente ? $formulario->especialistaLente->nombre : '-' }}</td>
                        <td>{{ $estado }}</td>
                        <td>{{ $formulario->saldo ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($formulario->created_at)->format('H:i:s') }}</td>
                    </tr>
                @endforeach

                @if($estadoActual !== null)
                    <tr class="table-light">
                        <td colspan="4" class="text-end"><strong>Subtotal {{ $estadoActual }}:</strong></td>
                        <td colspan="3" class=""><strong>{{ $subtotalEstado }}</strong></td>
                    </tr>
                @endif

                <tr class="table-primary">
                    <td colspan="4" class="text-end"><strong>Total General:</strong></td>
                    <td colspan="3" class=""><strong>{{ $totalGeneral }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html> 