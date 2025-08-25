@extends('layouts.admin.app')

@section('title', 'Editar Pago')

@section('content_header')
<h1 class="text-center"><i class="fa fa-pencil"></i> Editar Pago</h1>
@stop

@section('content')

    <div class="col-lg-12 margin-tb">
        @include('fragment.error')
        <div class="card border-light mb-3 shadow">
            <div class="card-header bg-primary text-white">
                <div class="float-start">
                    <i class="fa fa-pencil"></i> Editar Pago
                </div>
                <div class="float-end">
                    <a href="{{ route('payments.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                        {{ __('Volver') }}</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="text-center">Datos del Pago</h5>
                        {!! Form::model($payment, ['method' => 'PATCH', 'route' => ['payments.update', $payment->id]]) !!}
                            {{ Form::readonlyComp('formulario_id', 'Formulario ID', null, null, '') }}
                            {{ Form::readonlyComp('numero_orden', 'Número de Orden', null, null, '') }}
                            {{ Form::readonlyComp('paciente', 'Paciente', null, null, '') }}
                            {{ Form::numberComp('monto', 'Monto', null, null, '') }}
                            {{ Form::numberComp('monto_usd', 'Monto USD', null, null, '') }}
                            {{ Form::readonlyComp('saldo', 'Saldo', null, null, '') }}
                            {{ Form::readonlyComp('saldo_bs', 'Saldo Bs', null, null, '') }}
                            {{ Form::readonlyComp('total', 'Total', null, null, '') }}
                            {{ Form::readonlyComp('tasa_cambio', 'Tasa de Cambio', null, null, '') }}
                            {{ Form::readonlyComp('fecha', 'Fecha', null, null, '') }}
                            {{ Form::readonlyComp('cedula', 'Cédula', null, null, '') }}
                            {{ Form::readonlyComp('edad', 'Edad', null, null, '') }}
                            {{ Form::readonlyComp('telefono', 'Teléfono', null, null, '') }}
                            {{ Form::readonlyComp('banco_emisor', 'Banco Emisor', null, null, '') }}
                            {{ Form::readonlyComp('referencia', 'Referencia', null, null, '') }}
                            {{ Form::readonlyComp('fecha_pago', 'Fecha de Pago', null, null, '') }}
                            {{ Form::readonlyComp('status', 'Estado', null, null, '') }}
                            {{ Form::readonlyComp('created_by', 'Creado por', null, null, '') }}
                            {{ Form::readonlyComp('updated_by', 'Actualizado por', null, null, '') }}
                            <div class="text-center">
                                {{ Form::submitComp() }}
                            </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-center">Imagen del Pago</h5>
                        <div class="text-center">
                            <img src="{{ asset($payment->file) }}" alt="Imagen del Pago" class="tw-w-full tw-h-auto">
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>

@endsection