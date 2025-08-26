@extends('layouts.admin.app')

@section('title', 'Ver Cliente')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-user"></i> Ver Cliente</h1>
@stop

@section('content')

<div class="col-lg-12 margin-tb">
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-user"></i> Ver Cliente
            </div>
            <div class="float-end">
                <a href="{{ route('clientes.pdf', $cliente->id) }}" class="btn btn-light btn-sm me-2">
                    <i class="fa fa-file-pdf"></i> Descargar PDF
                </a>
                <a href="{{ route('clientes.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        <div class="card-body">

            {!! Form::model($cliente, ['method' => 'PATCH','route' => ['clientes.update', $cliente->id]]) !!}
                @include('clientes.partials.form')
            {!! Form::close() !!}

            <hr>
            <h4 class="mb-3">Estadísticas del Cliente</h4>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="card bg-primary text-white shadow mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Órdenes</h5>
                            <p class="card-text display-6"><strong>{{ $totalOrdenes }}</strong></p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="card bg-success text-white shadow mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Pagos del Cliente</h5>
                            <p class="card-text display-6"><strong>{{ $totalClientePayments }}</strong></p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="card bg-warning text-white shadow mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Monto Total Órdenes</h5>
                            <p class="card-text display-6"><strong>${{ number_format($sumaMontoOrdenes, 2) }}</strong></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card bg-danger text-white shadow mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Saldo Pendiente</h5>
                            <p class="card-text display-6"><strong>${{ number_format($sumaSaldoOrdenes, 2) }}</strong></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="card bg-info text-white shadow mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Pagos Realizados (Órdenes)</h5>
                            <p class="card-text display-6"><strong>${{ number_format($sumaPagosOrdenes, 2) }}</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-secondary text-white shadow mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Abonos Cliente</h5>
                            <p class="card-text display-6"><strong>${{ number_format($sumaClientePayments, 2) }}</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-dark text-white shadow mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Saldo Cliente</h5>
                            <p class="card-text display-6"><strong>${{ number_format($saldoCliente, 2) }}</strong></p>
                        </div>
                    </div>
                </div>
            </div>

            @if($ordenesPorEstatus->count() > 0)
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-light mb-3 shadow mt-4">
                        <div class="card-header bg-info text-white">
                            <h5 class="card-title mb-0">Órdenes por Estatus</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="table-light">
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
                                        <tr class="table-primary">
                                            <td class="text-end"><strong>Total General:</strong></td>
                                            <td class="text-end"><strong>{{ $totalOrdenesGeneral }}</strong></td>
                                            <td class="text-end"><strong>${{ number_format($montoTotalGeneral, 2) }}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if($ordenesPorTipoLente->count() > 0)
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-light mb-3 shadow mt-4">
                        <div class="card-header bg-info text-white">
                            <h5 class="card-title mb-0">Órdenes por Tipo de Lente</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="table-light">
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
                                        <tr class="table-primary">
                                            <td class="text-end"><strong>Total General:</strong></td>
                                            <td class="text-end"><strong>{{ $totalOrdenesGeneral }}</strong></td>
                                            <td class="text-end"><strong>${{ number_format($montoTotalGeneral, 2) }}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if($ordenesPorTipoTratamiento->count() > 0)
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-light mb-3 shadow mt-4">
                        <div class="card-header bg-info text-white">
                            <h5 class="card-title mb-0">Órdenes por Tipo de Tratamiento</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="table-light">
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
                                        <tr class="table-primary">
                                            <td class="text-end"><strong>Total General:</strong></td>
                                            <td class="text-end"><strong>{{ $totalOrdenesGeneral }}</strong></td>
                                            <td class="text-end"><strong>${{ number_format($montoTotalGeneral, 2) }}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if($pagosPorTipo->count() > 0)
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-light mb-3 shadow mt-4">
                        <div class="card-header bg-success text-white">
                            <h5 class="card-title mb-0">Pagos de Órdenes por Tipo</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="table-light">
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
                                        <tr class="table-primary">
                                            <td class="text-end"><strong>Total General:</strong></td>
                                            <td class="text-end"><strong>{{ $totalPagosGeneral }}</strong></td>
                                            <td class="text-end"><strong>${{ number_format($montoTotalGeneral, 2) }}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if($clientePaymentsPorStatus->count() > 0)
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-light mb-3 shadow mt-4">
                        <div class="card-header bg-warning text-white">
                            <h5 class="card-title mb-0">Abonos del Cliente por Estado</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="table-light">
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
                                        <tr class="table-primary">
                                            <td class="text-end"><strong>Total General:</strong></td>
                                            <td class="text-end"><strong>{{ $totalAbonosGeneral }}</strong></td>
                                            <td class="text-end"><strong>${{ number_format($montoTotalGeneral, 2) }}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>

@endsection
