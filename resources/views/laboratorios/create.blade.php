@extends('layouts.app')

@section('content')

<a class="btn btn-primary btn-sm mb-2" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i> {{ __('Back')}}</a>

<div class="col-lg-12 margin-tb">
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <i class="fa fa-plus"></i>{{ __('Create New') }} Laboratorio
        </div>
        <div class="card-body">
            @include('fragment.error')
            @include('fragment.success')
            
            {!! Form::open(array('route' => 'laboratorios.store','method'=>'POST', 'id' => 'laboratorios.store.form')) !!}
                
                @include('laboratorios.partials.form')

            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection