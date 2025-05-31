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
                        <div class="col-xl-3 col-lg-6"> {{-- Operativos --}}
                            <div class="card card-stats mb-4 mb-xl-0 shadow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">OPERATIVOS</h5>
                                            <br>
                                            <span class="h2 font-weight-bold mb-0">{{ $operativosActual }}</span>
                                            <br>
                                            <small class="text-muted">Mes anterior ({{ $mesAnteriorNombre }}):
                                                <strong>{{ $operativosAnterior }}</strong> </small>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                                <i class="fas fa-location-dot"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-1 mb-0 text-muted text-sm">
                                        <span
                                            class="{{ $operativosVariacion >= 0 ? 'text-success' : 'text-danger' }} mr-2">
                                            <i class="fa fa-arrow-{{ $operativosVariacion >= 0 ? 'up' : 'down' }}"></i>
                                            {{ abs($operativosVariacion) }}%
                                        </span>
                                        <span class="text-nowrap">Respecto al mes anterior</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6"> {{-- Formularios --}}
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
                                        <span
                                            class="{{ $formulariosVariacion >= 0 ? 'text-success' : 'text-danger' }} mr-2">
                                            <i class="fa fa-arrow-{{ $formulariosVariacion >= 0 ? 'up' : 'down' }}"></i>
                                            {{ abs($formulariosVariacion) }}%
                                        </span>
                                        <span class="text-nowrap">Respecto al mes anterior</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6"> {{-- Pagos --}}
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
                        <div class="col-xl-3 col-lg-6"> {{-- Refractantes --}}
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
                                        <span
                                            class="{{ $refractadosVariacion >= 0 ? 'text-success' : 'text-danger' }} mr-2">
                                            <i class="fa fa-arrow-{{ $refractadosVariacion >= 0 ? 'up' : 'down' }}"></i>
                                            {{ abs($refractadosVariacion) }}%
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

    <script type="text/javascript">
        // Cambiar el mes automáticamente al seleccionar
        document.getElementById('mes').addEventListener('change', function() {
            this.form.submit();
        });
    </script>
@endpush
