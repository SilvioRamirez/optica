@extends('layouts.admin.app')

@section('title', 'Crear Rol')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-user-plus"></i> Crear Rol</h1>
@stop

@section('content')

    @include('fragment.error')

    <div class="col-lg-12 margin-tb">
        <div class="card border-light mb-3 shadow">
            <div class="card-header bg-primary text-white">
                <div class="float-start">
                    <i class="fa fa-user-plus"></i> Agregar Nuevo Rol
                </div>
                <div class="float-end">
                    <a href="{{ route('roles.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                        {{ __('Volver') }}</a>
                </div>
            </div>
            <div class="card-body">

                {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                    @include('roles.partials.form')
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection