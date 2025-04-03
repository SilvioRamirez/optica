@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="header bg-gradient-primary pb-5 pt-3 pt-md-8">
        <div class="container-fluid">
            <h2 class="mb-5 text-gray-800">Estadísticas <strong>{{ $mesActualNombre }}</strong></h2>
            <div class="header-body">
                <div class="row">
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0 shadow">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">FORMULARIOS</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $formulariosActual }}</span>
                                        <small class="text-muted">Mes anterior ({{ $mesAnteriorNombre }}): <strong>{{ $formulariosAnterior }}</strong></small>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                                            <i class="fas fa-glasses"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="{{ $formulariosVariacion >= 0 ? 'text-success' : 'text-danger' }} mr-2">
                                        <i class="fa fa-arrow-{{ $formulariosVariacion >= 0 ? 'up' : 'down' }}"></i> 
                                        {{ abs($formulariosVariacion) }}%
                                    </span>
                                    <span class="text-nowrap">Respecto al mes anterior</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0 shadow">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">REFRACTADOS</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $refractadosActual }}</span>
                                        <small class="text-muted">Mes anterior ({{ $mesAnteriorNombre }}): <strong>{{ $refractadosAnterior }}</strong></small>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-secondary text-white rounded-circle shadow">
                                            <i class="fas fa-people-group"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="{{ $refractadosVariacion >= 0 ? 'text-success' : 'text-danger' }} mr-2">
                                        <i class="fa fa-arrow-{{ $refractadosVariacion >= 0 ? 'up' : 'down' }}"></i> 
                                        {{ abs($refractadosVariacion) }}%
                                    </span>
                                    <span class="text-nowrap">Respecto al mes anterior</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0 shadow">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">PAGOS</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $pagosActual }}</span>
                                        <small class="text-muted">Mes anterior ({{ $mesAnteriorNombre }}): <strong>{{ $pagosAnterior }}</strong></small>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                            <i class="fas fa-hand-holding-dollar"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="{{ $pagosVariacion >= 0 ? 'text-success' : 'text-danger' }} mr-2">
                                        <i class="fa fa-arrow-{{ $pagosVariacion >= 0 ? 'up' : 'down' }}"></i> 
                                        {{ abs($pagosVariacion) }}%
                                    </span>
                                    <span class="text-nowrap">Respecto al mes anterior</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0 shadow">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">OPERATIVOS</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $operativosActual }}</span>
                                        <small class="text-muted">Mes anterior ({{ $mesAnteriorNombre }}): <strong>{{ $operativosAnterior }}</strong> </small>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                            <i class="fas fa-location-dot"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="{{ $operativosVariacion >= 0 ? 'text-success' : 'text-danger' }} mr-2">
                                        <i class="fa fa-arrow-{{ $operativosVariacion >= 0 ? 'up' : 'down' }}"></i> 
                                        {{ abs($operativosVariacion) }}%
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


</script>

@endpush