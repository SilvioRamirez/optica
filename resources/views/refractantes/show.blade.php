@extends('layouts.admin.app')

@section('title', 'Ver Refractado')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-eye-dropper"></i> Ver Refractado</h1>
@stop

@section('content')

<div class="col-lg-12 margin-tb">
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-eye-dropper"></i> Ver Refractado
            </div>
            <div class="float-end">
                <a href="{{ route('refractantes.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        <div class="card-body">

            {!! Form::model($refractante, ['method' => 'PATCH','route' => ['refractantes.update', $refractante->id]]) !!}
                @include('refractantes.partials.form')
            {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection
