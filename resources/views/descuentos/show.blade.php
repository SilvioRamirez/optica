@extends('layouts.admin.app')

@section('title', 'Ver Descuento')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-coins"></i> Ver Descuento</h1>
@stop

@section('content')

<div class="col-lg-12 margin-tb">
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-coins"></i> Ver Descuento
            </div>
            <div class="float-end">
                <a href="{{ route('descuentos.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        <div class="card-body">

            {!! Form::model($descuento, ['method' => 'PATCH','route' => ['descuentos.update', $descuento->id]]) !!}
                @include('descuentos.partials.form')
            {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection
