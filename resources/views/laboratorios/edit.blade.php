@extends('layouts.admin.app')

@section('title', 'Editar Laboratorio')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-user-edit"></i> Editar Laboratorio</h1>
@stop

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        @include('fragment.error')
    </div>

    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-user-edit"></i> Editar Laboratorio
            </div>
            <div class="float-end">
                <a href="{{ route('laboratorios.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        <div class="card-body">
            {!! Form::model($laboratorio, ['method' => 'PATCH','route' => ['laboratorios.update', $laboratorio->id]]) !!}
                
                @include('laboratorios.partials.form')
            
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection