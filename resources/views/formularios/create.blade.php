@extends('layouts.app')

@section('content')

<a class="btn btn-primary btn-sm mb-2" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i> {{ __('Back')}}</a>


<div class="col-lg-12 margin-tb">

    @include('fragment.error')
    @include('fragment.success')

    <div class="card border-light mb-3 shadow">

        <div class="card-header bg-primary text-white">
            <h5 class="card-title"><i class="fa fa-pen-to-square"></i> Formulario</h5>
        </div>
        
        <div class="card-body tab-content">
            <div class="tab-pane active" id="dhcp">
                @php
                    $formulario="";
                @endphp
                {!! Form::open(array('route' => 'formularios.store','method'=>'POST', 'id' => 'formularios.store', 'enctype' => 'multipart/form-data')) !!}
                    @include('formularios.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>
@push('scripts')
    <script type="module">
        

    </script>

    <script>
    
        var submitedForm = document.getElementById('formularios.store');
        var submitedButton = document.getElementById('formularios.store.submitButton')

        submitedForm.addEventListener("submit", (event) => {
            submitedButton.disabled = true;
            
        });

    </script>
@endpush
@endsection