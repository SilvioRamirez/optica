<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte Cliente {{ $cliente->name }}</title>
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

        <h1>Reporte Cliente {{ $cliente->name }}</h1>

    </div>

    <div class="section">
        <div class="section-title">Información del Cliente</div>
        <table>
            <tr>
                <td><strong>Nombre:</strong></td>
                <td>{{ $cliente->name }}</td>
            </tr>
            <tr>
                <td><strong>Documento:</strong></td>
                <td>{{ $cliente->identity->name ?? 'N/A' }}-{{ $cliente->document_number }}</td>
            </tr>
            <tr>
                <td><strong>Email:</strong></td>
                <td>{{ $cliente->email }}</td>
            </tr>
            <tr>
                <td><strong>Teléfono:</strong></td>
                <td>{{ $cliente->phone }}</td>
            </tr>
            <tr>
                <td><strong>Dirección:</strong></td>
                <td>{{ $cliente->address }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Estadísticas Generales</div>
        <p style="margin-bottom: 10px; font-style: italic;"><strong>Nota:</strong> Las estadísticas de órdenes muestran solo las órdenes pendientes: aquellas con saldo > $0 o que no han sido entregadas.</p>
        <table>
            <tr>
                <td><strong>Total de Órdenes Pendientes:</strong></td>
                <td class="text-end">{{ $totalOrdenes }}</td>
            </tr>
            <tr>
                <td><strong>Monto Total de Órdenes Pendientes (Saldo):</strong></td>
                <td class="text-end">${{ number_format($sumaMontoOrdenes, 2) }}</td>
            </tr>
            <tr>
                <td><strong>Pagos Realizados (Órdenes Pendientes):</strong></td>
                <td class="text-end">${{ number_format($sumaPagosOrdenes, 2) }}</td>
            </tr>
            <tr>
                <td><strong>Saldo del Cliente:</strong></td>
                <td class="text-end">${{ number_format($saldoCliente, 2) }}</td>
            </tr>
        </table>
    </div>

    @if($ordenesPorEstatus->count() > 0)
    <div class="section">
        <div class="section-title">Órdenes por Estatus</div>
        <table>
            <thead>
                <tr>
                    <th>Estatus</th>
                    <th>Total Órdenes</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalOrdenesGeneral = 0;
                    $montoTotalGeneral = 0;
                @endphp
                @foreach($ordenesPorEstatus as $orden)
                    <tr>
                        <td>{{ $orden->estatus_nombre }}</td>
                        <td class="text-end">{{ $orden->total }}</td>
                    </tr>
                    @php
                        $totalOrdenesGeneral += $orden->total;
                        $montoTotalGeneral += $orden->monto_total;
                    @endphp
                @endforeach
                <tr style="background-color: #f0f0f0;">
                    <td class="text-end"><strong>Total General:</strong></td>
                    <td class="text-end"><strong>{{ $totalOrdenesGeneral }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    <div class="section">
        <div class="section-title">Detalle de Órdenes Pendientes</div>
        <table>
            <thead>
                <tr>
                    <th>N° Orden</th>
                    <th>Paciente</th>
                    <th>Fecha Recibida</th>
                    <th>Días Pasados</th>
                    <th>Estatus</th>
                    <th>Tipo Lente</th>
                    <th>Tratamiento</th>
                    <th>Monto Total</th>
                    <th>Saldo Pendiente</th>
                </tr>
            </thead>
            <tbody>
                @if($ordenesPendientesDetalle->count() > 0)
                    @php
                        $totalMontoPendiente = 0;
                        $totalSaldoPendiente = 0;
                    @endphp
                    @foreach($ordenesPendientesDetalle as $orden)
                        <tr>
                            <td>{{ $orden->numero_orden }}</td>
                            <td>{{ $orden->paciente }}</td>
                            <td>{{ $orden->fecha_recibida }}</td>
                            <td class="text-center">{{ $orden->diasPasados() }}</td>
                            <td>{{ $orden->ordenStatus->name ?? 'Sin estatus' }}</td>
                            <td>{{ $orden->tipoLente->tipo_lente ?? 'Sin tipo' }}</td>
                            <td>{{ $orden->tipoTratamiento->tipo_tratamiento ?? 'Sin tratamiento' }}</td>
                            <td class="text-end">${{ number_format($orden->precio_total, 2) }}</td>
                            <td class="text-end">${{ number_format($orden->precio_saldo, 2) }}</td>
                        </tr>
                        @php
                            $totalMontoPendiente += $orden->precio_total;
                            $totalSaldoPendiente += $orden->precio_saldo;
                        @endphp
                    @endforeach
                    <tr style="background-color: #f0f0f0;">
                        <td colspan="7" class="text-end"><strong>Total:</strong></td>
                        <td class="text-end"><strong>${{ number_format($totalMontoPendiente, 2) }}</strong></td>
                        <td class="text-end"><strong>${{ number_format($totalSaldoPendiente, 2) }}</strong></td>
                    </tr>
                @else
                    <tr>
                        <td colspan="9" class="text-center">No hay órdenes pendientes</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

</body>
</html>
