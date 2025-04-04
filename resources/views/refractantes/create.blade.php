@extends('layouts.app')

@section('content')

<a class="btn btn-primary btn-sm mb-2" href="{{ route('refractantes.index') }}"><i class="fa fa-arrow-left"></i> {{ __('Back')}}</a>


<div class="col-lg-12 margin-tb">

    @include('fragment.error')
    @include('fragment.success')

    <div class="card border-light mb-3 shadow">

        <div class="card-header bg-primary text-white">
            <h5 class="card-title"><i class="fa fa-pen-to-square"></i> Refractado</h5>
        </div>
        
        <div class="card-body tab-content">
            @php
                $refractante="";
            @endphp
            <div class="tab-pane active" id="dhcp">
                {!! Form::open(array('route' => 'refractantes.store','method'=>'POST')) !!}
                    @include('refractantes.partials.form')
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