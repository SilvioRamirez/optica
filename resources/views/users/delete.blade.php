@extends('layouts.app')

@section('content')
	<div class="container-fluid">	
		
        <div class="pull-right mb-2">
            <a class="btn btn-outline-primary btn-sm" href="{{ route('users.index') }}"><i class="fa fa-arrow-left"></i> {{ __('Back')}}</a>
        </div>
		
		<div class="col-lg-12 margin-tb">
            
            <div class="card border-light mb-3 shadow">
                <div class="card-header bg-primary text-white">
                    <i class="fa fa-trash-alt"></i>
                    {{ __('Eliminar Usuario') }}
                </div>
                <div class="card-body">			
                    @include('fragment.error')
                    @include('fragment.success')
                    
                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                        
                        <h2 class="text-center">¿Está segur@ de eliminar al usuario <strong>{{ $user->name }}</strong>?</h2>
                        <hr>

                        <div class="flex-center position-ref full-height">
                            <div class="top-right links text-center">
                                {!! Form::button('<i class="fa fa-trash-alt"></i> '.__('Delete'), ['type' => 'submit', 'class' => 'btn btn-danger btn-block'])  !!}
                            </div>
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
    	</div>
	</div>
@endsection