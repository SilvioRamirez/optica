@extends('layouts.admin.app')

@section('title', 'Editar Tipo de Tratamiento')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-edit"></i> Editar Tipo de Tratamiento</h1>
@stop

@section('content')

<div class="col-lg-12 margin-tb">
    @include('fragment.error')
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-edit"></i> Editar Tipo de Tratamiento
            </div>
            <div class="float-end">
                <a href="{{ route('tipoTratamientos.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
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