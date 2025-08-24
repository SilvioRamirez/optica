@extends('layouts.admin.app')

@section('title', 'Editar Cliente')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-edit"></i> Editar Cliente</h1>
@stop

@section('content')

<div class="col-lg-12 margin-tb">
    @include('fragment.error')
    @include('fragment.success')
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-edit"></i> Editar Cliente
            </div>
            <div class="float-end">
                <a href="{{ route('clientes.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        <div class="card-body">

            {!! Form::model($cliente, ['method' => 'PATCH','route' => ['clientes.update', $cliente->id]]) !!}
                @include('clientes.partials.form')
            {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection