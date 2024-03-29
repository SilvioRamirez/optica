<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">

            <label for="estado-dropdown mb-1"><strong>Estado</strong></label>
            <div class="form-group mb-2">
                <select  id="estado-dropdown" name="estado_id" class="form-control">
                    <option value="">-- Seleccionar Estado --</option>
                        @foreach ($estados as $data)
                            <option value="{{$data->id_estado}}">
                                {{$data->estado}}
                            </option>
                        @endforeach
                </select>
            </div>

            <label for="municipio-dropdown" class="mb-1"><strong>Municipio</strong></label>
            <div class="form-group mb-2">
                <select id="municipio-dropdown" name="municipio_id" class="form-control">
                </select>
            </div>

            <label for="parroquia-dropdown" class="mb-1"><strong>Parroquia</strong></label>
            <div class="form-group mb-2">
                <select id="parroquia-dropdown" name="parroquia_id" class="form-control">
                </select>
            </div>
            
            {{ Form::textComp('sector','Sector') }}
            {{ Form::areaComp('direccion','Dirección') }}
            {{ Form::textComp('lugar','Lugar') }}
            {{ Form::textComp('nombre_operativo','Nombre del Operativo') }}
            {{ Form::dateComp('fecha', 'Fecha del Operativo') }}

        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            {{ Form::submitComp() }}
    </div>
</div>
@push('scripts')

    <script type="module">

        /* Mayusculas */
        const $inputsAndTextareas = document.querySelectorAll('input, textarea')
        const handleKeyup = (event) => {
            event.target.value = event.target.value.toUpperCase()
        }
        const addHandleKeyup = ($element) => {
            $element.addEventListener('keyup', handleKeyup)
        }
        $inputsAndTextareas.forEach(addHandleKeyup)


        $(document).ready(function () {

            /*
            * Dropdown de Municipios 
            */

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

            /*
            * Dropdown de Parroquias
            */

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