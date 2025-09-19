@extends('layouts.admin.app')

@section('title', 'Ver Laboratorio')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-eye-dropper"></i> Estadisticas de Laboratorio</h1>
@stop

@section('content_header_right')
    
@stop

@section('content')

<div class="row">
    <!-- Información del Laboratorio -->
    {{-- <div class="col-lg-6 margin-tb">
        <div class="card border-light mb-3 shadow">
            <div class="card-header bg-primary text-white">
                <div class="float-start">
                    <i class="fa fa-eye-dropper"></i> Información del Laboratorio
                </div>
                <div class="float-end">
                    <a href="{{ route('laboratorios.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                        {{ __('Volver') }}</a>
                </div>
            </div>
            <div class="card-body">
                {!! Form::model($laboratorio, ['method' => 'PATCH','route' => ['laboratorios.update', $laboratorio->id]]) !!}
                    @include('laboratorios.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div> --}}

    <!-- Estadísticas Generales -->
    <div class="col-lg-6 offset-lg-3">
        <div class="card border-light mb-3 shadow">
            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                <div class="float-start">
                    <i class="fa fa-chart-bar"></i> Estadísticas Generales
                </div>
                <div class="btn-group float-end">
                    <a href="{{ route('laboratorios.generatePdf', $laboratorio->id) }}" class="btn btn-danger btn-sm">
                        <i class="fa fa-file-pdf"></i> Generar PDF
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-6 mb-3">
                        <div class="bg-primary text-white p-3 rounded">
                            <h4>{{ $totalFormulariosExternos }}</h4>
                            <p class="mb-0">Total Formularios Externos</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="bg-warning text-white p-3 rounded">
                            <h4>{{ $formulariosPendientes }}</h4>
                            <p class="mb-0">Formularios Pendientes</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="bg-success text-white p-3 rounded">
                            <h4>{{ $formulariosEnviados }}</h4>
                            <p class="mb-0">Formularios Enviados</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="bg-info text-white p-3 rounded">
                            <h4>{{ $formulariosRetornados }}</h4>
                            <p class="mb-0">Formularios Retornados</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Formularios por Origen -->
    <div class="col-lg-6">
        <div class="card border-light mb-3 shadow">
            <div class="card-header bg-secondary text-white">
                <i class="fa fa-source"></i> Formularios por Origen
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-6 mb-3">
                        <div class="bg-purple text-white p-3 rounded">
                            <h4>{{ $formulariosDeOrdenes }}</h4>
                            <p class="mb-0">Desde Órdenes Externas</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="bg-teal text-white p-3 rounded">
                            <h4>{{ $formulariosDeFormularios }}</h4>
                            <p class="mb-0">Desde Formularios Internos</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tiempo Promedio -->
    <div class="col-lg-6">
        <div class="card border-light mb-3 shadow">
            <div class="card-header bg-success text-white">
                <i class="fa fa-clock"></i> Tiempo de Procesamiento
            </div>
            <div class="card-body text-center">
                <div class="bg-light p-4 rounded">
                    <h3 class="text-primary">
                        {{ $tiempoPromedio && $tiempoPromedio->promedio_dias ? number_format($tiempoPromedio->promedio_dias, 1) : '0' }} días
                    </h3>
                    <p class="mb-0 text-muted">Tiempo promedio de procesamiento</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Estadísticas Detalladas -->
@if($ordenesExternas->count() > 0)
<div class="row">
    <div class="col-lg-12">
        <div class="card border-light mb-3 shadow">
            <div class="card-header bg-dark text-white">
                <i class="fa fa-list"></i> Órdenes Externas por Tipo
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Tipo de Tratamiento</th>
                                <th>Tipo de Lente</th>
                                <th class="text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ordenesExternas as $orden)
                            <tr>
                                <td>{{ $orden->tipo_tratamiento }}</td>
                                <td>{{ $orden->tipo_lente }}</td>
                                <td class="text-center">
                                    <span class="badge bg-primary">{{ $orden->total }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if($formulariosInternos->count() > 0)
<div class="row">
    <div class="col-lg-12">
        <div class="card border-light mb-3 shadow">
            <div class="card-header bg-dark text-white">
                <i class="fa fa-list"></i> Formularios Internos por Tipo y Estado
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Tipo de Tratamiento</th>
                                <th>Tipo de Lente</th>
                                <th>Estado</th>
                                <th class="text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($formulariosInternos as $formulario)
                            <tr>
                                <td>{{ $formulario->tipo_tratamiento }}</td>
                                <td>{{ $formulario->tipo_lente }}</td>
                                <td>
                                    <span class="badge 
                                        @switch($formulario->estatus)
                                            @case('REGISTRADO')
                                                bg-info
                                                @break
                                            @case('EN PROCESO')
                                                bg-warning
                                                @break
                                            @case('TERMINADO')
                                                bg-success
                                                @break
                                            @case('ENTREGADO')
                                                bg-primary
                                                @break
                                            @default
                                                bg-secondary
                                        @endswitch
                                    ">{{ $formulario->estatus }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-primary">{{ $formulario->total }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if($formulariosPorMes->count() > 0)
<div class="row">
    <div class="col-lg-12">
        <div class="card border-light mb-3 shadow">
            <div class="card-header bg-gradient-primary text-white">
                <i class="fa fa-calendar"></i> Formularios por Mes (Últimos 6 meses)
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Año</th>
                                <th>Mes</th>
                                <th class="text-center">Total Formularios</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($formulariosPorMes as $mes)
                            <tr>
                                <td>{{ $mes->año }}</td>
                                <td>
                                    {{ DateTime::createFromFormat('!m', $mes->mes)->format('F') }}
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-success">{{ $mes->total }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection