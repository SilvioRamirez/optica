@extends('layouts.admin.app')

@section('title', 'Ver Rol')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-user-check"></i> Ver Rol</h1>
@stop

@section('content')

<div class="col-lg-12 margin-tb">
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-user-check"></i> Ver Rol
            </div>
            <div class="float-end">
                <a href="{{ route('roles.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        <div class="card-body">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{__('Name')}}</strong>
                    {{ $role->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{__('Permissions')}}:</strong>
                    @if(!empty($rolePermissions))
                        @foreach($rolePermissions as $v)
                        <br>
                        <span class="badge bg-success">{{ $v->name }}</span>
                            
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection