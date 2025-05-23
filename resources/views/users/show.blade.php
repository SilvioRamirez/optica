@extends('layouts.admin.app')

@section('title', 'Ver Usuario')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-user-check"></i> Ver Usuario</h1>
@stop

@section('content')

<div class="col-lg-12 margin-tb">
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-user-check"></i> Ver Usuario
            </div>
            <div class="float-end">
                <a href="{{ route('users.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <strong>{{ __('Name')}}</strong>
                {{ $user->name }}
            </div>
            <div class="form-group">
                <strong>{{ __('Email')}}</strong>
                {{ $user->email }}
            </div>
            <div class="form-group">
                <strong>{{ __('Roles')}}</strong>
                @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                        <span class="badge bg-success">{{ $v }}</span>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

@endsection