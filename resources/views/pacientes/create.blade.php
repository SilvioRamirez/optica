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
        $(document).ready(function () {
            /*------------------------------------------
            --------------------------------------------
            Country Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/

            $('#estado-dropdown').on('change', function () {
                var id_estado = this.value;
                $("#municipio-dropdown").html('');
                $.ajax({
                    url: "{{url('api/fetch-municipios')}}",
                    type: "POST",
                    data: {
                        id_estado: id_estado,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#municipio-dropdown').html('<option value="">-- Selecciona Municipio --</option>');
                        $.each(result.municipios, function (key, value) {
                            $("#municipio-dropdown").append('<option value="' + value
                                .id_municipio + '">' + value.municipio + '</option>');
                        });
                        $('#parroquia-dropdown').html('<option value="">-- Selecciona Parroquia --</option>');
                    }
                });
            });

            /*------------------------------------------
            --------------------------------------------
            State Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/

            $('#municipio-dropdown').on('change', function () {
                var id_municipio = this.value;
                $("#parroquia-dropdown").html('');
                $.ajax({
                    url: "{{url('api/fetch-parroquias')}}",
                    type: "POST",
                    data: {
                        id_municipio: id_municipio,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#parroquia-dropdown').html('<option value="">-- Selecciona Parroquia --</option>');
                        $.each(res.parroquias, function (key, value) {
                            $("#parroquia-dropdown").append('<option value="' + value
                                .id_parroquia + '">' + value.parroquia + '</option>');
                        });
                    }
                });
            });
        });

    </script>
@endpush
@endsection