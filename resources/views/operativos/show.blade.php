@extends('layouts.admin.app')

@section('title', 'Ver Operativo')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-eye"></i> Ver Operativo</h1>
@stop

@section('content')

<div class="col-lg-12 margin-tb">
    <div class="card border-light mb-3 shadow ">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-eye"></i> Ver Operativo
            </div>
            <div class="float-end">
                <a href="{{ route('operativos.pdf', $operativo->id) }}" class="btn btn-light btn-sm me-2">
                    <i class="fa fa-file-pdf"></i> Descargar PDF
                </a>
                <a href="{{ route('operativos.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
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
                <div class="col-md-3">
                    <div class="card bg-primary text-white shadow mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Refractados</h5>
                            <p class="card-text display-6"><strong>{{ $totalRefractados }}</strong></p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="card bg-success text-white shadow mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Lentes a Procesar</h5>
                            <p class="card-text display-6"><strong>{{ $totalFormularios }}</strong></p>
                        </div>
                    </div>
                </div>
                
                {{-- <div class="col-md-3">
                    <div class="card bg-info text-white mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Pagos</h5>
                            <p class="card-text display-6"><strong>{{ $totalPagos }}</strong></p>
                        </div>
                    </div>
                </div> --}}
                

                <div class="col-md-3">
                    <div class="card bg-danger text-white shadow mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total de Gastos</h5>
                            <p class="card-text display-6"><strong>{{ $totalGastos }}</strong></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card bg-info text-white shadow mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total de Asesores</h5>
                            <p class="card-text display-6"><strong>{{ $totalAsesores }}</strong></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="card bg-warning text-white shadow mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Monto Total de Abonos</h5>
                            <p class="card-text display-6"><strong>${{ number_format($sumaPagos, 2) }}</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-success text-white mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Monto Total de Ventas</h5>
                            <p class="card-text display-6"><strong>${{ number_format($sumaTotalFormularios, 2) }}</strong></p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="card bg-danger text-white mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Monto Total de Saldos</h5>
                            <p class="card-text display-6"><strong>${{ number_format($sumaSaldoFormularios, 2) }}</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-danger text-white shadow mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Monto Total de Gastos</h5>
                            <p class="card-text display-6"><strong>${{ number_format($sumaTotalGastos, 2) }}</strong></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Resumen de Gastos -->
            <div class="row mb-4">
                
            </div>

            @if($formulariosPorTipo->count() > 0)
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-light mb-3 shadow mt-4">
                        <div class="card-header bg-info text-white">
                            <h5 class="card-title mb-0">Lentes por Tipo de Tratamiento y Fórmula</h5>
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
                    <h5 class="card-title mb-0">Lentes por Especialista y Tipo de Tratamiento</h5>
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
                                    $especialistaActual = null;
                                    $subtotalEspecialista = 0;
                                    $precioSubtotalEspecialista = 0;
                                @endphp
                                @foreach($formulariosPorTipoYEspecialista as $formulario)
                                    @if($especialistaActual !== $formulario->especialista_nombre)
                                        @if($especialistaActual !== null)
                                            <tr class="table-secondary">
                                                <td colspan="4" class="text-end"><strong>Subtotal {{ $especialistaActual }}:</strong></td>
                                                <td class="text-end"><strong>{{ $subtotalEspecialista }}</strong></td>
                                                <td class="text-end"><strong>${{ number_format($precioSubtotalEspecialista, 2) }}</strong></td>
                                            </tr>
                                        @endif
                                        @php
                                            $especialistaActual = $formulario->especialista_nombre;
                                            $subtotalEspecialista = 0;
                                            $precioSubtotalEspecialista = 0;
                                        @endphp
                                    @endif
                                    <tr>
                                        <td>{{ $formulario->especialista_nombre }}</td>
                                        <td>{{ $formulario->tipo_lente }}</td>
                                        <td>{{ $formulario->tipoTratamiento->tipo_tratamiento ?? 'Sin tratamiento' }}</td>
                                        <td>{{ $formulario->tipo_formula }}</td>
                                        <td class="text-end">{{ $formulario->total }}</td>
                                        <td class="text-end">${{ number_format($formulario->precio_total, 2) }}</td>
                                    </tr>
                                    @php
                                        $subtotalEspecialista += $formulario->total;
                                        $precioSubtotalEspecialista += $formulario->precio_total;
                                        $totalGeneral += $formulario->total;
                                        $precioTotalGeneral += $formulario->precio_total;
                                    @endphp
                                @endforeach
                                @if($especialistaActual !== null)
                                    <tr class="table-secondary">
                                        <td colspan="4" class="text-end"><strong>Subtotal {{ $especialistaActual }}:</strong></td>
                                        <td class="text-end"><strong>{{ $subtotalEspecialista }}</strong></td>
                                        <td class="text-end"><strong>${{ number_format($precioSubtotalEspecialista, 2) }}</strong></td>
                                    </tr>
                                @endif
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

            

            <!-- Tabla de Gastos por Tipo -->
            <div class="card border-light mb-3 shadow mt-4">
                <div class="card-header bg-danger text-white">
                    <h5 class="card-title mb-0">Gastos por Tipo</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Tipo de Gasto</th>
                                    <th>Total Gastos</th>
                                    <th>Monto Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalGastosGeneral = 0;
                                    $montoTotalGeneral = 0;
                                @endphp
                                @foreach($gastosPorTipo as $gasto)
                                    <tr>
                                        <td>{{ $gasto->tipo_nombre }}</td>
                                        <td class="text-end">{{ $gasto->total_gastos }}</td>
                                        <td class="text-end">${{ number_format($gasto->monto_total, 2) }}</td>
                                    </tr>
                                    @php
                                        $totalGastosGeneral += $gasto->total_gastos;
                                        $montoTotalGeneral += $gasto->monto_total;
                                    @endphp
                                @endforeach
                                <tr class="table-danger">
                                    <td class="text-end"><strong>Total General:</strong></td>
                                    <td class="text-end"><strong>{{ $totalGastosGeneral }}</strong></td>
                                    <td class="text-end"><strong>${{ number_format($montoTotalGeneral, 2) }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Tabla de Formularios por Estatus -->
            <div class="card border-light mb-3 shadow mt-4">
                <div class="card-header bg-info text-white">
                    <h5 class="card-title mb-0">Lentes por Estatus</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Estatus</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalGeneral = 0;
                                @endphp
                                @foreach($formulariosConEstatus as $formulario)
                                    <tr>
                                        <td>{{ $formulario->estatus ?? 'Sin estatus' }}</td>
                                        <td class="text-end">{{ $formulario->total }}</td>
                                    </tr>
                                    @php
                                        $totalGeneral += $formulario->total;
                                    @endphp
                                @endforeach
                                <tr class="table-primary">
                                    <td class="text-end"><strong>Total General:</strong></td>
                                    <td class="text-end"><strong>{{ $totalGeneral }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Tabla de Asesores -->
            <div class="card border-light mb-3 shadow mt-4">
                <div class="card-header bg-info text-white">
                    <h5 class="card-title mb-0">Asesores del Operativo</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
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
                                @if($operativo->asesores->isEmpty())
                                    <tr>
                                        <td colspan="4" class="text-center">No hay asesores asignados</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
