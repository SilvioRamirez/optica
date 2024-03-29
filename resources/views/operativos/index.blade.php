@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            @include('fragment.error')
            @include('fragment.success')
            <div class="text-center">
                <h1><i class="fa fa-map-location-dot"></i> Operativos</h1>
            </div>
            @can('operativo-create')
                <div class="pull-right mt-2 mb-2">
                    <a class="btn btn-success btn-sm" href="{{ route('operativos.create') }}"><i class="fa fa-plus"></i> {{ __('Create New')}}</a>
                </div>
            @endcan
        </div>

        @can('operativo-list')
            <div class="card border-light mb-3 shadow">
                <div class="card-header bg-primary text-white">
                    Administración de Operativos
                </div>
                <div class="card-body table-responsive">
                    {{ $dataTable->table() }}
                </div>
            </div>
        @endcan
    </div>

@endsection

@push('scripts')

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

@endpush