@extends('layouts.admin.app')

@section('title', 'Editar Tipo de Pago de Orden')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-id-badge"></i> Editar Tipo de Pago de Orden</h1>
@stop

@section('content')

<div class="col-lg-12 margin-tb">
    @include('fragment.error')
    @include('fragment.success')
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-id-badge"></i> Editar Tipo de Pago de Orden
            </div>
            <div class="float-end">
                <a href="{{ route('orden-payment-types.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        <div class="card-body">

            {!! Form::model($ordenPaymentType, ['method' => 'PATCH','route' => ['orden-payment-types.update', $ordenPaymentType->id]]) !!}
                @include('ordenPaymentTypes.partials.form')
            {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection