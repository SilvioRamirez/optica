@extends('layouts.admin.app')

@section('title', 'Administración de Tipos de Gastos')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-file-invoice-dollar"></i> Administración de Tipos de Gastos</h1>
@stop

@section('content')
    <div class="container-fluid">

        @include('fragment.error')
        @include('fragment.success')

    </div>
    @canany(['refractante-list'])
        <div class="card border-light mb-3 shadow">
            <div class="card-header bg-primary text-white">
                @can('tipo-lente-create')
                    <div class="float-start">
                        <a href="{{ route('tipoGastos.create') }}" class="btn btn-light btn-sm"><i class="fa fa-plus"></i>
                            {{ __('Create New') }}</a>
                    </div>
                @endcan
                <div class="float-end">
                    <a href="{{ route('home') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                        {{ __('Volver') }}</a>
                </div>
            </div>
            <div class="card-body table-responsive table-sm">
                {{ $dataTable->table() }}
            </div>
        </div>
    @endcanany

@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
