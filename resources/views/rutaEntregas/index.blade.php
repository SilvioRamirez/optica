@extends('layouts.app')

@section('content')
    <div class="row">
    
        <div class="col-lg-12 margin-tb">
            @include('fragment.error')
            @include('fragment.success')
            <div class="text-center">
                <h1><i class="fa fa-truck"></i> Tipos de Rutas de Entrega</h1>
            </div>
            @can('tipo-lente-create')
                <div class="pull-right mt-2 mb-2">
                    <a class="btn btn-success" href="{{ route('rutaEntregas.create') }}"><i class="fa fa-plus"></i> {{ __('Create New')}}</a>
                </div>
            @endcan
        </div>
    
        <div class="card border-light mb-3 shadow">
            <div class="card-header bg-primary text-white">
                Administración de Tipos de Ruta de Entrega
            </div>
            <div class="card-body table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

@endsection

@push('scripts')

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

@endpush