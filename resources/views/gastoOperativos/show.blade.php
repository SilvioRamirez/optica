@extends('layouts.admin.app')

@section('title', 'Ver Gasto de Operativo')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-eye-dropper"></i> Ver Gasto de Operativo</h1>
@stop

@section('content')

<div class="col-lg-12 margin-tb">
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-flask-vial"></i> Ver Gasto de Operativo
            </div>
            <div class="float-end">
                <a href="{{ route('home') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        <div class="card-body">

            {!! Form::model($tipoTratamiento, ['method' => 'PATCH','route' => ['tipoTratamientos.update', $tipoTratamiento->id]]) !!}
                @include('tipoTratamientos.partials.form')
            {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection
