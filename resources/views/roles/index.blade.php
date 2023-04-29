@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="text-center">
            <h1><i class="fa fa-users-gear"></i> Administración de Roles</h1>
        </div>
        @can('role-create')
            <div class="pull-right mt-2 mb-2">
                <a class="btn btn-success btn-lg" href="{{ route('roles.create') }}"><i class="fa fa-user-plus"></i> {{ __('Create New Role')}}</a>
            </div>
        @endcan
    </div>
</div>

@include('fragment.error')
@include('fragment.success')

<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>N</th>
            <th>{{ __('Name')}}</th>
            <th width="280px">{{ __('Action')}}</th>
        </tr>
    </thead>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <div class="btn-group" role="group" aria-label="Opciones">
                @can('role-list')
                    <a class="btn btn-info btn-sm" href="{{ route('roles.show',$role->id) }}"><i class="fa fa-eye"></i> {{ __('')}}</a>
                @endcan
                @can('role-edit')
                    <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-pen-to-square"></i> {{ __('')}}</a>
                @endcan
                @can('role-delete')
                    <a class="btn btn-danger btn-sm" href="{{ route('roles.delete',$role->id) }}"><i class="fa fa-trash"></i> {{ __('')}}</a>
                @endcan
            </div>
        </td>
    </tr>
    @endforeach
</table>

{!! $roles->render() !!}
<p class="text-center text-primary"><small>By silvio.ramirez.m@gmail.com</small></p>

@endsection