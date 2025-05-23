@extends('layouts.admin.app')

@section('title', 'Administración de Estatus')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-layer-group"></i> Administración de Estatus</h1>
@stop

@section('content')
    <div class="container-fluid">

        @include('fragment.error')
        @include('fragment.success')

    </div>

    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            @can('estatus-create')
                <div class="float-start">
                    <a href="{{ route('estatus.create') }}" class="btn btn-light btn-sm"><i class="fa fa-plus"></i>
                        {{ __('Create New') }}</a>
                </div>
            @endcan
            <div class="float-end">
                <a href="{{ route('home') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        <div class="card-body table-responsive">
            {{ $dataTable->table() }}
        </div>
    </div>

@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
