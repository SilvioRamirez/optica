@extends('layouts.admin.app')

@section('title', 'Configuración')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-cog"></i> Configuración</h1>
@stop

@section('content')
    <div class="container-fluid">

        @include('fragment.error')
        @include('fragment.success')

    </div>

    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-cog"></i> Configuración
            </div>
            <div class="float-end">
                <a href="{{ route('home') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        <div class="card-body table-responsive">
            {{ $dataTable->table() }}
        </div>
    </div>
    </div>


    <p class="text-center text-primary"><small></small></p>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
