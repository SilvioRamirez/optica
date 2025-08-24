@extends('layouts.admin.app')

@section('title', 'Ver Pago de Orden')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-eye"></i> Ver Pago de Orden</h1>
@stop

@section('content')

{{-- BoostrapCard --}}
<div class="col-lg-12 margin-tb">
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-eye"></i> Ver Pago de Orden
            </div>
            <div class="float-end">
                <a href="{{ route('orden-payments.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <strong>{{ __('Orden ID')}}</strong>
                {{ $ordenPayment->orden_id ?? 'N/A' }}
            </div>
            <div class="form-group">
                <strong>{{ __('Numero de Orden')}}</strong>
                {{ $ordenPayment->orden->numero_orden ?? 'N/A' }}
            </div>
            <div class="form-group">
                <strong>{{ __('Cliente')}}</strong>
                {{ $ordenPayment->orden->cliente->name ?? 'N/A' }}
            </div>
            <div class="form-group">
                <strong>{{ __('Paciente')}}</strong>
                {{ $ordenPayment->orden->cliente->name ?? 'N/A' }}
            </div>
            <div class="form-group">
                <strong>{{ __('Tipo de Pago')}}</strong>
                {{ $ordenPayment->tipo->tipo ?? 'N/A' }}
            </div>
            <div class="form-group">
                <strong>{{ __('Monto')}}</strong>
                {{ $ordenPayment->monto ?? 'N/A' }}
            </div>
            <div class="form-group">
                <strong>{{ __('Fecha')}}</strong>
                {{ $ordenPayment->pago_fecha  ?? 'N/A' }}
            </div>
            <div class="form-group">
                <strong>{{ __('Referencia')}}</strong>
                {{ $ordenPayment->referencia ?? 'N/A' }}
            </div>
            <div class="form-group">
                <img src="{{ asset( $ordenPayment->image_path) }}" style="width: 200; height: 200px;" alt="Imagen del Pago" class="img-fluid img-thumbnail img-responsive img-rounded">
            </div>
        </div>
    </div>
</div>

@endsection