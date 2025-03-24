@extends('layouts.app')

@section('content')

<a class="btn btn-primary btn-sm mb-2" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i> {{ __('Back')}}</a>

<div class="col-lg-12 margin-tb">
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white"><i class="fa fa-layer-group"></i> 
            {{ __('Show')}} Descuento
        </div>
        <div class="card-body">

            {!! Form::model($descuento, ['method' => 'PATCH','route' => ['descuentos.update', $descuento->id]]) !!}
                @include('descuentos.partials.form')
            {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection
