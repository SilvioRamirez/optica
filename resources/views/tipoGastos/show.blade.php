@extends('layouts.app')

@section('content')

<a class="btn btn-primary btn-sm mb-2" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i> {{ __('Back')}}</a>

<div class="col-lg-12 margin-tb">
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white"><i class="fa fa-hand-holding-dollar"></i> 
            {{ __('Show')}} Tipo de Gasto
        </div>
        <div class="card-body">

            {!! Form::model($tipoGasto, ['method' => 'PATCH','route' => ['tipoGastos.update', $tipoGasto->id]]) !!}
                @include('tipoGastos.partials.form')
            {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection
