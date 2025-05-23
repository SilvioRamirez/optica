@extends('layouts.admin.app')

@section('title', 'Crear Laboratorio')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-microscope"></i> Crear Laboratorio</h1>
@stop

@section('content')

<div class="col-lg-12 margin-tb">
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-microscope"></i> Agregar Nuevo Laboratorio
            </div>
            <div class="float-end">
                <a href="{{ route('laboratorios.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        <div class="card-body">
            @include('fragment.error')
            @include('fragment.success')
            
            {!! Form::open(array('route' => 'laboratorios.store','method'=>'POST', 'id' => 'laboratorios.store.form')) !!}
                
                @include('laboratorios.partials.form')

            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection