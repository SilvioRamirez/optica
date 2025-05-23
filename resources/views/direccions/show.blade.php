@extends('layouts.admin.app')

@section('title', 'Ver Paciente')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-eye"></i> Ver Paciente</h1>
@stop

@section('content')

<div class="col-lg-12 margin-tb">
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-eye"></i> Ver Paciente
            </div>
            <div class="float-end">
                <a href="{{ route('pacientes.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        <div class="card-body">

            {!! Form::model($paciente, ['method' => 'PATCH','route' => ['pacientes.update', $paciente->id]]) !!}
                @include('pacientes.partials.form')
            {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection
