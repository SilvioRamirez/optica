@extends('layouts.admin.app')

@section('title', 'Home')

@section('content')
    <div class="main-content">
        <div class="header pb-5 pt-3 pt-md-8">
            <div class="container-fluid">
                <div class="row align-items-center mb-4">
                    <div class="col-md-6">
                        <h2 class="mb-0 text-gray-800">Estadísticas <strong>{{ $mesActualNombre }}</strong></h2>
                    </div> 
                    <div class="col-md-6">
                        <form method="GET" action="/home" class="text-right">
                            <div class="form-group mb-0">
                                <label for="mes" class="form-label text-muted small">Seleccionar Mes:</label>
                                <select name="mes" id="mes" class="form-control form-control-sm d-inline-block w-auto" onchange="this.form.submit()">
                                    @foreach($mesesDisponibles as $valor => $texto)
                                        <option value="{{ $valor }}" {{ $mesSeleccionado == $valor ? 'selected' : '' }}>
                                            {{ $texto }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="header-body">
                    <div class="row">
                        <div class="col-xl-2-4 col-lg-6"> {{-- Operativos --}}
                            <div class="card card-stats mb-4 mb-xl-0 shadow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">OPERATIVOS</h5>
                                            <br>
                                            <span class="h2 font-weight-bold mb-0">{{ $operativosActual }}</span>
                                            <br>
                                            <small class="text-muted">Mes anterior ({{ $mesAnteriorNombre }}):
                                                <strong>{{ $operativosAnterior }}</strong></small>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                                <i class="fas fa-location-dot"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-1 mb-0 text-muted text-sm">
                                        <span class="{{ $operativosVariacion >= 0 ? 'text-success' : 'text-danger' }} mr-2">
                                            <i class="fa fa-arrow-{{ $operativosVariacion >= 0 ? 'up' : 'down' }}"></i>
                                            {{ abs($operativosVariacion) }}%
                                        </span>
                                        <span class="text-nowrap">Respecto al mes anterior</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2-4 col-lg-6"> {{-- Formularios --}}
                            <div class="card card-stats mb-4 mb-xl-0 shadow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">FORMULARIOS</h5>
                                            <br>
                                            <span class="h2 font-weight-bold mb-0">{{ $formulariosActual }}</span>
                                            <br>
                                            <small class="text-muted">Mes anterior ({{ $mesAnteriorNombre }}):
                                                <strong>{{ $formulariosAnterior }}</strong></small>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                                                <i class="fas fa-glasses"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-1 mb-0 text-muted text-sm">
                                        <span class="{{ $formulariosVariacion >= 0 ? 'text-success' : 'text-danger' }} mr-2">
                                            <i class="fa fa-arrow-{{ $formulariosVariacion >= 0 ? 'up' : 'down' }}"></i>
                                            {{ abs($formulariosVariacion) }}%
                                        </span>
                                        <span class="text-nowrap">Respecto al mes anterior</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2-4 col-lg-6"> {{-- Pagos --}}
                            <div class="card card-stats mb-4 mb-xl-0 shadow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">PAGOS</h5>
                                            <br>
                                            <span class="h2 font-weight-bold mb-0">{{ $pagosActual }}</span>
                                            <br>
                                            <small class="text-muted">Mes anterior ({{ $mesAnteriorNombre }}):
                                                <strong>{{ $pagosAnterior }}</strong></small>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                                <i class="fas fa-hand-holding-dollar"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-1 mb-0 text-muted text-sm">
                                        <span class="{{ $pagosVariacion >= 0 ? 'text-success' : 'text-danger' }} mr-2">
                                            <i class="fa fa-arrow-{{ $pagosVariacion >= 0 ? 'up' : 'down' }}"></i>
                                            {{ abs($pagosVariacion) }}%
                                        </span>
                                        <span class="text-nowrap">Respecto al mes anterior</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2-4 col-lg-6"> {{-- Refractados --}}
                            <div class="card card-stats mb-4 mb-xl-0 shadow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">REFRACTADOS</h5>
                                            <br>
                                            <span class="h2 font-weight-bold mb-0">{{ $refractadosActual }}</span>
                                            <br>
                                            <small class="text-muted">Mes anterior ({{ $mesAnteriorNombre }}):
                                                <strong>{{ $refractadosAnterior }}</strong></small>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-secondary text-white rounded-circle shadow">
                                                <i class="fas fa-people-group"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-1 mb-0 text-muted text-sm">
                                        <span class="{{ $refractadosVariacion >= 0 ? 'text-success' : 'text-danger' }} mr-2">
                                            <i class="fa fa-arrow-{{ $refractadosVariacion >= 0 ? 'up' : 'down' }}"></i>
                                            {{ abs($refractadosVariacion) }}%
                                        </span>
                                        <span class="text-nowrap">Respecto al mes anterior</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="col-xl-2-4 col-lg-6"> {{-- CASHEA --}}
                            <div class="card card-stats mb-4 mb-xl-0 shadow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">CASHEA</h5>
                                            <br>
                                            <span class="h2 font-weight-bold mb-0">{{ $casheaActual }}</span>
                                            <br>
                                            <small class="text-muted">Mes anterior ({{ $mesAnteriorNombre }}):
                                                <strong>{{ $casheaAnterior }}</strong></small>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-purple text-white rounded-circle shadow">
                                                <i class="fas fa-credit-card"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-1 mb-0 text-muted text-sm">
                                        <span class="{{ $casheaVariacion >= 0 ? 'text-success' : 'text-danger' }} mr-2">
                                            <i class="fa fa-arrow-{{ $casheaVariacion >= 0 ? 'up' : 'down' }}"></i>
                                            {{ abs($casheaVariacion) }}%
                                        </span>
                                        <span class="text-nowrap">Respecto al mes anterior</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Estadísticas Adicionales -->
    <div class="main-content">
        <div class="header pb-5 pt-3">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row">
                        <!-- Total de Ventas -->
                        <div class="col-xl-2-4 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0 shadow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">VENTAS TOTALES</h5>
                                            <br>
                                            <span class="h2 font-weight-bold mb-0">${{ number_format($totalVentasActual, 2) }}</span>
                                            <br>
                                            <small class="text-muted">Mes anterior ({{ $mesAnteriorNombre }}):
                                                <strong>${{ number_format($totalVentasAnterior, 2) }}</strong></small>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                                <i class="fas fa-dollar-sign"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-1 mb-0 text-muted text-sm">
                                        <span class="{{ $ventasVariacion >= 0 ? 'text-success' : 'text-danger' }} mr-2">
                                            <i class="fa fa-arrow-{{ $ventasVariacion >= 0 ? 'up' : 'down' }}"></i>
                                            {{ abs($ventasVariacion) }}%
                                        </span>
                                        <span class="text-nowrap">Respecto al mes anterior</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Promedio Total -->
                        <div class="col-xl-2-4 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0 shadow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">PROMEDIO TOTAL</h5>
                                            <br>
                                            <span class="h2 font-weight-bold mb-0">${{ number_format($promedioTotalActual, 2) }}</span>
                                            <br>
                                            <small class="text-muted">Mes anterior ({{ $mesAnteriorNombre }}):
                                                <strong>${{ number_format($promedioTotalAnterior, 2) }}</strong></small>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                                <i class="fas fa-calculator"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-1 mb-0 text-muted text-sm">
                                        <span class="{{ $promedioVariacion >= 0 ? 'text-success' : 'text-danger' }} mr-2">
                                            <i class="fa fa-arrow-{{ $promedioVariacion >= 0 ? 'up' : 'down' }}"></i>
                                            {{ abs($promedioVariacion) }}%
                                        </span>
                                        <span class="text-nowrap">Respecto al mes anterior</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Género Masculino -->
                        <div class="col-xl-2-4 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0 shadow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">MASCULINO</h5>
                                            <br>
                                            <span class="h2 font-weight-bold mb-0">{{ $generoMasculinoActual }}</span>
                                            <br>
                                            <small class="text-muted">Mes anterior ({{ $mesAnteriorNombre }}):
                                                <strong>{{ $generoMasculinoAnterior }}</strong></small>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                                                <i class="fas fa-male"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-1 mb-0 text-muted text-sm">
                                        <span class="{{ $generoMasculinoVariacion >= 0 ? 'text-success' : 'text-danger' }} mr-2">
                                            <i class="fa fa-arrow-{{ $generoMasculinoVariacion >= 0 ? 'up' : 'down' }}"></i>
                                            {{ abs($generoMasculinoVariacion) }}%
                                        </span>
                                        <span class="text-nowrap">Respecto al mes anterior</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Género Femenino -->
                        <div class="col-xl-2-4 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0 shadow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">FEMENINO</h5>
                                            <br>
                                            <span class="h2 font-weight-bold mb-0">{{ $generoFemeninoActual }}</span>
                                            <br>
                                            <small class="text-muted">Mes anterior ({{ $mesAnteriorNombre }}):
                                                <strong>{{ $generoFemeninoAnterior }}</strong></small>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-pink text-white rounded-circle shadow">
                                                <i class="fas fa-female"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-1 mb-0 text-muted text-sm">
                                        <span class="{{ $generoFemeninoVariacion >= 0 ? 'text-success' : 'text-danger' }} mr-2">
                                            <i class="fa fa-arrow-{{ $generoFemeninoVariacion >= 0 ? 'up' : 'down' }}"></i>
                                            {{ abs($generoFemeninoVariacion) }}%
                                        </span>
                                        <span class="text-nowrap">Respecto al mes anterior</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Promedio de Edad -->
                        <div class="col-xl-2-4 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0 shadow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">PROMEDIO EDAD</h5>
                                            <br>
                                            <span class="h2 font-weight-bold mb-0">{{ number_format($promedioEdadActual, 1) }} años</span>
                                            <br>
                                            <small class="text-muted">Mes anterior ({{ $mesAnteriorNombre }}):
                                                <strong>{{ number_format($promedioEdadAnterior, 1) }} años</strong></small>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                                <i class="fas fa-birthday-cake"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-1 mb-0 text-muted text-sm">
                                        <span class="{{ $edadVariacion >= 0 ? 'text-success' : 'text-danger' }} mr-2">
                                            <i class="fa fa-arrow-{{ $edadVariacion >= 0 ? 'up' : 'down' }}"></i>
                                            {{ abs($edadVariacion) }}%
                                        </span>
                                        <span class="text-nowrap">Respecto al mes anterior</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Operativo más activo -->
    <div class="container pb-5 pt-3">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 mb-4">
                <div class="card card-stats shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">OPERATIVO MÁS ACTIVO</h5>
                                <br>
                                @if($operativoConMasFormularios)
                                    <span class="h2 font-weight-bold mb-0">{{ $operativoConMasFormularios->formularios_count }} formularios</span>
                                    <br>
                                    <small class="text-muted">Operativo: <strong>{{ $operativoConMasFormularios->nombre_operativo }}</strong></small><br>
                                    <small class="text-muted">Lugar: <strong>{{ $operativoConMasFormularios->lugar }}</strong></small>
                                @else
                                    <span class="h2 font-weight-bold mb-0">0 formularios</span>
                                    <br>
                                    <small class="text-muted">No hay datos</small>
                                @endif
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                    <i class="fas fa-trophy"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla de Tipos de Lentes -->
    <div class="container pb-5 pt-3">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body">
                        <h1 class="text-center mb-4">Formularios por Tipo de Lente - {{ $mesActualNombre }}</h1>
                        @if($formulariosPorTipoLente->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Tipo de Lente</th>
                                            <th class="text-center">Cantidad</th>
                                            <th class="text-center">Precio Promedio</th>
                                            <th class="text-center">Total Ventas</th>
                                            <th class="text-center">% del Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $totalFormularios = $formulariosPorTipoLente->sum('cantidad'); @endphp
                                        @foreach($formulariosPorTipoLente as $tipoLente)
                                            <tr>
                                                <td><strong>{{ $tipoLente->tipo_lente }}</strong></td>
                                                <td class="text-center">
                                                    <span class="badge badge-primary">{{ $tipoLente->cantidad }}</span>
                                                </td>
                                                <td class="text-center">
                                                    ${{ number_format($tipoLente->precio_promedio, 2) }}
                                                </td>
                                                <td class="text-center">
                                                    <strong>${{ number_format($tipoLente->total_ventas, 2) }}</strong>
                                                </td>
                                                <td class="text-center">
                                                    {{ round(($tipoLente->cantidad / $totalFormularios) * 100, 1) }}%
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center">
                                <p class="text-muted">No hay datos de formularios para este mes.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Condiciones Ópticas -->
    <div class="container pb-5 pt-3">
        <div class="row">
            <!-- Tabla de Evaluación General de Ojos (eval_oj) -->
            <div class="col-lg-6 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="text-center mb-4">Análisis de Errores Refractivos - {{ $mesActualNombre }}</h3>
                        @if($evalOjStats->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Condición</th>
                                            <th class="text-center">Cantidad</th>
                                            <th class="text-center">%</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $totalEvalOj = $evalOjStats->sum(); @endphp
                                        @foreach($evalOjStats as $condicion => $cantidad)
                                            <tr>
                                                <td><strong>{{ $condicion }}</strong></td>
                                                <td class="text-center">
                                                    <span class="badge badge-info">{{ $cantidad }}</span>
                                                </td>
                                                <td class="text-center">
                                                    {{ $totalEvalOj > 0 ? round(($cantidad / $totalEvalOj) * 100, 1) : 0 }}%
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center">
                                <p class="text-muted">No hay datos de evaluación de ojos para este mes.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Gráficos de Presbicia y Miopía Magna -->
            <div class="col-lg-6">
                <!-- Presbicia -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h4 class="text-center mb-3">Presbicia - {{ $mesActualNombre }}</h4>
                        <div class="row text-center">
                            @php $totalPresbicia = $presbiciaCount + $sinPresbiciaCount; @endphp
                            <div class="col-6">
                                <div class="card bg-success text-white">
                                    <div class="card-body">
                                        <h5>PRESBICIA</h5>
                                        <h2>{{ $presbiciaCount }}</h2>
                                        <small>{{ $totalPresbicia > 0 ? round(($presbiciaCount / $totalPresbicia) * 100, 1) : 0 }}%</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="">
                                    <div class=" text-center">
                                        <img src="{{ asset('storage/img/presbicia.webp') }}"  alt="Presbicia" class="img-fluid" width="200">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Miopía Magna -->
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="text-center mb-3">Miopía Magna - {{ $mesActualNombre }}</h4>
                        <div class="row text-center">
                            @php $totalMiopiaMagna = $miopiaMagnaCount + $sinMiopiaMagnaCount; @endphp
                            <div class="col-6">
                                <div class="card bg-danger text-white">
                                    <div class="card-body">
                                        <h5>MIOPÍA MAGNA</h5>
                                        <h2>{{ $miopiaMagnaCount }}</h2>
                                        <small>{{ $totalMiopiaMagna > 0 ? round(($miopiaMagnaCount / $totalMiopiaMagna) * 100, 1) : 0 }}%</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="">
                                    <div class=" text-center">
                                        <img src="{{ asset('storage/img/miopiamagna.webp') }}"  alt="Miopía Magna" class="img-fluid" width="200">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráficos -->
    <div class="container pb-5 pt-3 pt-md-8">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <h1 class="text-center">{{ $chart1->options['chart_title'] }}</h1>
                        {!! $chart1->renderHtml() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pb-5 pt-3 pt-md-8">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <h1 class="text-center">{{ $chart2->options['chart_title'] }}</h1>
                        {!! $chart2->renderHtml() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pb-5 pt-3 pt-md-8">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <h1 class="text-center">{{ $chart3->options['chart_title'] }}</h1>
                        {!! $chart3->renderHtml() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pb-5 pt-3 pt-md-8">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <h1 class="text-center">{{ $chart4->options['chart_title'] }}</h1>
                        {!! $chart4->renderHtml() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pb-5 pt-3 pt-md-8">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <h1 class="text-center">{{ $chartCondicionesOpticas->options['chart_title'] }}</h1>
                        {!! $chartCondicionesOpticas->renderHtml() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection

@push('scripts')
    {!! $chart1->renderChartJsLibrary() !!}
    {!! $chart1->renderJs() !!}

    {!! $chart2->renderChartJsLibrary() !!}
    {!! $chart2->renderJs() !!}

    {!! $chart3->renderChartJsLibrary() !!}
    {!! $chart3->renderJs() !!}

    {!! $chart4->renderChartJsLibrary() !!}
    {!! $chart4->renderJs() !!}

    {!! $chartCondicionesOpticas->renderChartJsLibrary() !!}
    {!! $chartCondicionesOpticas->renderJs() !!}

    <script type="text/javascript">
        // Cambiar el mes automáticamente al seleccionar
        document.getElementById('mes').addEventListener('change', function() {
            this.form.submit();
        });
    </script>

    <style>
        /* Clase personalizada para dividir 5 tarjetas equitativamente */
        @media (min-width: 1200px) {
            .col-xl-2-4 {
                flex: 0 0 20%;
                max-width: 20%;
            }
        }
        
        /* Color púrpura personalizado para la tarjeta de CASHEA */
        .bg-purple {
            background-color: #8e44ad !important;
        }
        
        /* Color rosa personalizado para la tarjeta de género femenino */
        .bg-pink {
            background-color: #e91e63 !important;
        }
    </style>
@endpush 