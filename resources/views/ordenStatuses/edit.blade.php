@extends('layouts.admin.app')

@section('title', 'Editar Estatus de Orden')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-id-badge"></i> Editar Estatus de Orden</h1>
@stop

@section('content')

<div class="col-lg-12 margin-tb">
    @include('fragment.error')
    @include('fragment.success')
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-id-badge"></i> Editar Estatus de Orden
            </div>
            <div class="float-end">
                <a href="{{ route('orden-statuses.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        <div class="card-body">

            {!! Form::model($ordenStatus, ['method' => 'PATCH','route' => ['orden-statuses.update', $ordenStatus->id]]) !!}
                @include('ordenStatuses.partials.form')
            {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection