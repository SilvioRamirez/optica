@extends('layouts.app')

@section('content')

<a class="btn btn-primary btn-sm mb-2" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i> {{ __('Back')}}</a>

<div class="col-lg-12 margin-tb">
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white"><i class="fa fa-eye"></i> 
            {{ __('Show')}} Operativo
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 p-2">
                    <div class="form-group">
                        <strong>Estado:</strong>
                        {{ $operativo->estado->estado }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 p-2">
                    <div class="form-group">
                        <strong>Municipio:</strong>
                        {{ $operativo->municipio->municipio }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 p-2">
                    <div class="form-group">
                        <strong>Parroquia:</strong>
                        {{ $operativo->parroquia->parroquia }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 p-2">
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $operativo->nombre_operativo }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 p-2">
                    <div class="form-group">
                        <strong>Fecha:</strong>
                        {{ $operativo->fecha }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 p-2">
                    <div class="form-group">
                        <strong>Promotor:</strong>
                        {{ $operativo->promotor_nombre }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 p-2">
                    <div class="form-group">
                        <strong>Teléfono:</strong>
                        {{ $operativo->promotor_telefono }}
                    </div>
                </div>
                @if($operativo->latitud && $operativo->longitud)
                <div class="col-xs-12 col-sm-12 col-md-12 p-2">
                    <div class="form-group">
                        <strong>Ubicación:</strong>
                        <a href="https://www.google.com/maps/search/?api=1&query={{ $operativo->latitud }},{{ $operativo->longitud }}" 
                            target="_blank" 
                            class="btn btn-primary btn-sm">
                            <i class="fa fa-location-dot"></i>&nbsp; Ver en Google Maps
                        </a>
                    </div>
                </div>
                @endif
            </div>

            <hr>
            <h4 class="mb-3">Estadísticas del Operativo</h4>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="card bg-primary text-white mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Refractados</h5>
                            <p class="card-text display-6">{{ $totalRefractados }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card bg-success text-white mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Formularios</h5>
                            <p class="card-text display-6">{{ $totalFormularios }}</p>
                        </div>
                    </div>
                </div>
                
                {{-- <div class="col-md-3">
                    <div class="card bg-info text-white mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Pagos</h5>
                            <p class="card-text display-6">{{ $totalPagos }}</p>
                        </div>
                    </div>
                </div> --}}
                
                <div class="col-md-4">
                    <div class="card bg-warning text-white mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Suma Total Pagos</h5>
                            <p class="card-text display-6">${{ number_format($sumaPagos, 2) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card bg-success text-white mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Suma Total Formularios</h5>
                            <p class="card-text display-6">${{ number_format($sumaTotalFormularios, 2) }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card bg-danger text-white mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Suma Total Saldos</h5>
                            <p class="card-text display-6">${{ number_format($sumaSaldoFormularios, 2) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            @if($formulariosPorTipo->count() > 0)
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-light mb-3 shadow mt-4">
                        <div class="card-header bg-info text-white">
                            <h5 class="card-title mb-0">Formularios por Tipo de Tratamiento y Fórmula</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
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
                                                <td>{{ $terminada }}</td>
                                                <td>{{ $tallada }}</td>
                                                <td>{{ $total }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="table-primary">
                                            <td><strong>Total</strong></td>
                                            <td><strong>{{ $formulariosPorTipo->where('tipo_formula', 'TERMINADA')->sum('total') }}</strong></td>
                                            <td><strong>{{ $formulariosPorTipo->where('tipo_formula', 'TALLADA')->sum('total') }}</strong></td>
                                            <td><strong>{{ $formulariosPorTipo->sum('total') }}</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if($formulariosPorFormula->count() > 0)
            {{-- <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Formularios por Tipo de Fórmula</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Tipo de Fórmula</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($formulariosPorFormula as $formulario)
                                            <tr>
                                                <td>{{ $formulario->tipo_formula ?? 'Sin tipo' }}</td>
                                                <td>{{ $formulario->total }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            @endif

            <!-- Tabla de Formularios por Tipo de Tratamiento y Especialista -->
            <div class="card border-light mb-3 shadow mt-4">
                <div class="card-header bg-info text-white">
                    <h5 class="card-title mb-0">Formularios por Especialista y Tipo de Tratamiento</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
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
                                        <td>{{ $formulario->especialista_nombre }}</td>
                                        <td>{{ $formulario->tipo_lente }}</td>
                                        <td>{{ $formulario->tipoTratamiento->tipo_tratamiento ?? 'Sin tratamiento' }}</td>
                                        <td>{{ $formulario->tipo_formula }}</td>
                                        <td class="text-end">{{ $formulario->total }}</td>
                                        <td class="text-end">${{ number_format($formulario->precio_total, 2) }}</td>
                                    </tr>
                                    @php
                                        $totalGeneral += $formulario->total;
                                        $precioTotalGeneral += $formulario->precio_total;
                                    @endphp
                                @endforeach
                                <tr class="table-primary">
                                    <td colspan="4" class="text-end"><strong>Total General:</strong></td>
                                    <td class="text-end"><strong>{{ $totalGeneral }}</strong></td>
                                    <td class="text-end"><strong>${{ number_format($precioTotalGeneral, 2) }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Tabla de Pagos por Tipo -->
            <div class="card border-light mb-3 shadow mt-4">
                <div class="card-header bg-info text-white">
                    <h5 class="card-title mb-0">Pagos por Tipo</h5>
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
</div>

@endsection
