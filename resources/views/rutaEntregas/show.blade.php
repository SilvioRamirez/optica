@extends('layouts.app')

@section('content')

<a class="btn btn-primary btn-sm mb-2" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i> {{ __('Back')}}</a>

<div class="col-lg-12 margin-tb">
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white"><i class="fa fa-truck"></i> 
            {{ __('Show')}} Tipo de Ruta de Entrega
        </div>
        <div class="card-body">

            {!! Form::model($rutaEntrega, ['method' => 'PATCH','route' => ['rutaEntregas.update', $rutaEntrega->id]]) !!}
                @include('rutaEntregas.partials.form')
            {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection
