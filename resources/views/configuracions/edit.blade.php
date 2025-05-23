@extends('layouts.admin.app')

@section('title', 'Editar Configuración')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-cog"></i> Editar Configuración</h1>
@stop

@section('content')

    <div class="row">
        @include('fragment.error')
        @include('fragment.success')
    </div>
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-edit"></i> Editar Configuración
            </div>
            <div class="float-end">
                <a href="{{ route('configuracions.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        <div class="card-body">

            {!! Form::model($configuracion, ['method' => 'PATCH', 'route' => ['configuracions.update', $configuracion->id]]) !!}
            @include('configuracions.partials.form')
            {!! Form::close() !!}

        </div>
    </div>
@endsection
