@extends('layouts.app')

@section('content')

<a class="btn btn-primary btn-sm mb-2" href="{{ route('refractantes.index') }}""><i class="fa fa-arrow-left"></i> {{ __('Back')}}</a>

<div class="col-lg-12 margin-tb">
    @include('fragment.error')
    @include('fragment.success')
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white"><i class="fa fa-edit"></i> 
            {{ __('Edit')}} Refractado
        </div>
        <div class="card-body">

            {!! Form::model($refractante, ['method' => 'PATCH','route' => ['refractantes.update', $refractante->id]]) !!}
                @include('refractantes.partials.form')
            {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection