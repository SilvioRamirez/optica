@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">        
        <div class="pull-right mb-2">
            <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}"><i class="fa fa-arrow-left"></i> {{ __('Back')}}</a>
        </div>
    </div>
</div>

@include('fragment.error')

<div class="col-lg-12 margin-tb">
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white"><i class="fa fa-user-plus"></i> 
            {{ __('Create New User')}}
        </div>
        <div class="card-body">

            {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                @include('users.partials.form')
            {!! Form::close() !!}

        </div>
    </div>
</div>

<p class="text-center text-primary"><small>By silvio.ramirez.m@gmail.com</small></p>

@endsection