@extends('layouts.admin.app')

@section('title', 'Administración de Especialistas')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-hand-holding-dollar"></i> Administración de Especialistas</h1>
@stop

@section('content')
    <div class="container-fluid">

        @include('fragment.error')
        @include('fragment.success')


    </div>
    @canany(['refractante-list'])
        <div class="card border-light mb-3 shadow">
            <div class="card-header bg-primary text-white">
                <div class="float-start">
                    @can('especialista-create')
                        <a href="{{ route('especialistas.create') }}" class="btn btn-light btn-sm"><i class="fa fa-plus"></i>
                            {{ __('Create New') }}</a>
                    @endcan
                </div>
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
