@extends('layouts.app')

@section('content')

<a class="btn btn-primary btn-sm mb-2" href="{{ route('tipos.index') }}"><i class="fa fa-arrow-left"></i> {{ __('Back')}}</a>


<div class="col-lg-12 margin-tb">

    @include('fragment.error')
    @include('fragment.success')

    <div class="card border-light mb-3 shadow">

        <div class="card-header bg-primary text-white">
            <h5 class="card-title"><i class="fa fa-pen-to-square"></i> Tipo de Pago</h5>
        </div>
        
        <div class="card-body tab-content">
            <div class="tab-pane active" id="dhcp">
                {!! Form::open(array('route' => 'tipos.store','method'=>'POST')) !!}
                    @include('tipos.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>
@push('scripts')
    <script type="module">
        

    </script>
@endpush
@endsection