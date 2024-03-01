@extends('layouts.app')

@section('content')

<a class="btn btn-primary btn-sm mb-2" href="{{ route('roles.index') }}"><i class="fa fa-arrow-left"></i> {{ __('Back')}}</a>

@include('fragment.error')
@include('fragment.success')

<div class="col-lg-12 margin-tb">
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white"><i class="fa fa-user-edit"></i> 
            {{ __('Edit Role')}}
        </div>
        <div class="card-body">
            
            {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                @include('roles.partials.form-edit')
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection