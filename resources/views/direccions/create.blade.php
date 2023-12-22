@extends('layouts.app')

@section('content')

<a class="btn btn-primary btn-sm mb-2" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i> {{ __('Back')}}</a>


<div class="col-lg-12 margin-tb">

    @include('fragment.error')

    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white"><i class="fa fa-user-plus"></i> 
            {{ __('Create New')}} Paciente
        </div>
        <div class="card-body">

            {!! Form::open(array('route' => 'pacientes.store','method'=>'POST')) !!}
                @include('pacientes.partials.form')


            {!! Form::close() !!}

        </div>
    </div>
</div>
@push('scripts')
    <script type="module">
        

    </script>
@endpush
@endsection