<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte del Cliente {{ $cliente->name }}</title>
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

        <h1>Reporte del Cliente</h1>

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
                <td>{{ $cliente->identity->name ?? 'N/A' }}: {{ $cliente->document_number }}</td>
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
            <tr>
                <td><strong>Fecha de Registro:</strong></td>
                <td>{{ $cliente->created_at }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Estadísticas Generales</div>
        <table>
            <tr>
                <td><strong>Total de Órdenes:</strong></td>
                <td class="text-end">{{ $totalOrdenes }}</td>
            </tr>
            <tr>
                <td><strong>Total de Abonos del Cliente:</strong></td>
                <td class="text-end">{{ $totalClientePayments }}</td>
            </tr>
            <tr>
                <td><strong>Monto Total de Órdenes:</strong></td>
                <td class="text-end">${{ number_format($sumaMontoOrdenes, 2) }}</td>
            </tr>
            <tr>
                <td><strong>Pagos Realizados (Órdenes):</strong></td>
                <td class="text-end">${{ number_format($sumaPagosOrdenes, 2) }}</td>
            </tr>
            <tr>
                <td><strong>Saldo Pendiente (Órdenes):</strong></td>
                <td class="text-end">${{ number_format($sumaSaldoOrdenes, 2) }}</td>
            </tr>
            <tr>
                <td><strong>Abonos del Cliente (USD):</strong></td>
                <td class="text-end">${{ number_format($sumaClientePayments, 2) }}</td>
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
                    <th>Monto Total</th>
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
                        <td class="text-end">${{ number_format($orden->monto_total, 2) }}</td>
                    </tr>
                    @php
                        $totalOrdenesGeneral += $orden->total;
                        $montoTotalGeneral += $orden->monto_total;
                    @endphp
                @endforeach
                <tr style="background-color: #f0f0f0;">
                    <td class="text-end"><strong>Total General:</strong></td>
                    <td class="text-end"><strong>{{ $totalOrdenesGeneral }}</strong></td>
                    <td class="text-end"><strong>${{ number_format($montoTotalGeneral, 2) }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if($ordenesPorTipoLente->count() > 0)
    <div class="section">
        <div class="section-title">Órdenes por Tipo de Lente</div>
        <table>
            <thead>
                <tr>
                    <th>Tipo de Lente</th>
                    <th>Total Órdenes</th>
                    <th>Monto Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalOrdenesGeneral = 0;
                    $montoTotalGeneral = 0;
                @endphp
                @foreach($ordenesPorTipoLente as $orden)
                    <tr>
                        <td>{{ $orden->tipo_lente }}</td>
                        <td class="text-end">{{ $orden->total }}</td>
                        <td class="text-end">${{ number_format($orden->monto_total, 2) }}</td>
                    </tr>
                    @php
                        $totalOrdenesGeneral += $orden->total;
                        $montoTotalGeneral += $orden->monto_total;
                    @endphp
                @endforeach
                <tr style="background-color: #f0f0f0;">
                    <td class="text-end"><strong>Total General:</strong></td>
                    <td class="text-end"><strong>{{ $totalOrdenesGeneral }}</strong></td>
                    <td class="text-end"><strong>${{ number_format($montoTotalGeneral, 2) }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if($ordenesPorTipoTratamiento->count() > 0)
    <div class="section">
        <div class="section-title">Órdenes por Tipo de Tratamiento</div>
        <table>
            <thead>
                <tr>
                    <th>Tipo de Tratamiento</th>
                    <th>Total Órdenes</th>
                    <th>Monto Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalOrdenesGeneral = 0;
                    $montoTotalGeneral = 0;
                @endphp
                @foreach($ordenesPorTipoTratamiento as $orden)
                    <tr>
                        <td>{{ $orden->tipo_tratamiento }}</td>
                        <td class="text-end">{{ $orden->total }}</td>
                        <td class="text-end">${{ number_format($orden->monto_total, 2) }}</td>
                    </tr>
                    @php
                        $totalOrdenesGeneral += $orden->total;
                        $montoTotalGeneral += $orden->monto_total;
                    @endphp
                @endforeach
                <tr style="background-color: #f0f0f0;">
                    <td class="text-end"><strong>Total General:</strong></td>
                    <td class="text-end"><strong>{{ $totalOrdenesGeneral }}</strong></td>
                    <td class="text-end"><strong>${{ number_format($montoTotalGeneral, 2) }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if($pagosPorTipo->count() > 0)
    <div class="section">
        <div class="section-title">Pagos de Órdenes por Tipo</div>
        <table>
            <thead>
                <tr>
                    <th>Tipo de Pago</th>
                    <th>Total Pagos</th>
                    <th>Monto Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalPagosGeneral = 0;
                    $montoTotalGeneral = 0;
                @endphp
                @foreach($pagosPorTipo as $pago)
                    <tr>
                        <td>{{ $pago->tipo_nombre }}</td>
                        <td class="text-end">{{ $pago->total_pagos }}</td>
                        <td class="text-end">${{ number_format($pago->monto_total, 2) }}</td>
                    </tr>
                    @php
                        $totalPagosGeneral += $pago->total_pagos;
                        $montoTotalGeneral += $pago->monto_total;
                    @endphp
                @endforeach
                <tr style="background-color: #f0f0f0;">
                    <td class="text-end"><strong>Total General:</strong></td>
                    <td class="text-end"><strong>{{ $totalPagosGeneral }}</strong></td>
                    <td class="text-end"><strong>${{ number_format($montoTotalGeneral, 2) }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if($clientePaymentsPorStatus->count() > 0)
    <div class="section">
        <div class="section-title">Abonos del Cliente por Estado</div>
        <table>
            <thead>
                <tr>
                    <th>Estado</th>
                    <th>Total Abonos</th>
                    <th>Monto Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalAbonosGeneral = 0;
                    $montoTotalGeneral = 0;
                @endphp
                @foreach($clientePaymentsPorStatus as $payment)
                    <tr>
                        <td>{{ $payment->status ?? 'Sin estado' }}</td>
                        <td class="text-end">{{ $payment->total }}</td>
                        <td class="text-end">${{ number_format($payment->monto_total, 2) }}</td>
                    </tr>
                    @php
                        $totalAbonosGeneral += $payment->total;
                        $montoTotalGeneral += $payment->monto_total;
                    @endphp
                @endforeach
                <tr style="background-color: #f0f0f0;">
                    <td class="text-end"><strong>Total General:</strong></td>
                    <td class="text-end"><strong>{{ $totalAbonosGeneral }}</strong></td>
                    <td class="text-end"><strong>${{ number_format($montoTotalGeneral, 2) }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

</body>
</html>
