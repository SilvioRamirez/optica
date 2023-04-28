@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">

        <div class="text-center">
            <h1><i class="fa fa-users"></i> Administración de Usuarios</h1>
        </div>
        @can('user-create')
            <div class="pull-right mt-2 mb-2">
                <a class="btn btn-success btn-lg" href="{{ route('users.create') }}"><i class="fa fa-user-plus"></i> {{ __('Create New User')}}</a>
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
            <th>{{ __('Email')}}</th>
            <th>{{ __('Roles')}}</th>
            <th width="280px">{{ __('Action')}}</th>
        </tr>
    </thead>
    @foreach ($data as $key => $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                        <span class="badge bg-success">{{ $v }}</span>
                    @endforeach
                @endif
            </td>
            <td>
                <div class="btn-group" role="group" aria-label="Opciones">
                    <a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}"><i class="fa fa-eye"></i> {{ __('')}}</a>
                    <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-pen-to-square"></i> {{ __('')}}</a>
                    <a class="btn btn-danger btn-sm" href="{{ route('users.delete',$user->id) }}"><i class="fa fa-trash"></i> {{ __('')}}</a>
                </div>
            </td>
        </tr>
    @endforeach
</table>

{!! $data->render() !!}
<p class="text-center text-primary"><small>By silvio.ramirez.m@gmail.com</small></p>

@endsection