@extends('layouts.app')

@section('content')

<a class="btn btn-primary btn-sm mb-2" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i> {{ __('Back')}}</a>

<div class="col-lg-12 margin-tb">
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white"><i class="fa fa-eye"></i> 
            {{ __('Show')}} Bioanalista
        </div>
        <div class="card-body">

            {!! Form::model($bioanalista, ['method' => 'PATCH','route' => ['bioanalistas.update', $bioanalista->id]]) !!}
                @include('bioanalistas.partials.form')
            {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection
