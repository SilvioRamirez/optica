<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">

            <label for="estado-dropdown mb-1"><strong>Estado</strong></label>
            <div class="form-group mb-2">
                <select  id="estado-dropdown" name="estado_id" class="form-control">
                    <option value="">-- Seleccionar Estado --</option>
                        @foreach ($estados as $data)
                            <option value="{{$data->id_estado}}" {{ isset($operativo) && $operativo->estado_id == $data->id_estado ? 'selected' : '' }}>
                                {{$data->estado}}
                            </option>
                        @endforeach
                </select>
            </div>

            <label for="municipio-dropdown" class="mb-1"><strong>Municipio</strong></label>
            <div class="form-group mb-2">
                <select id="municipio-dropdown" name="municipio_id" class="form-control">
                    @if(isset($operativo) && $operativo->municipio_id)
                        @foreach($municipios as $municipio)
                            <option value="{{$municipio->id_municipio}}" {{ $operativo->municipio_id == $municipio->id_municipio ? 'selected' : '' }}>
                                {{$municipio->municipio}}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="parroquia-dropdown" class="mb-1"><strong>Parroquia</strong></label>
            <div class="form-group mb-2">
                <select id="parroquia-dropdown" name="parroquia_id" class="form-control">
                    @if(isset($operativo) && $operativo->parroquia_id)
                        @foreach($parroquias as $parroquia)
                            <option value="{{$parroquia->id_parroquia}}" {{ $operativo->parroquia_id == $parroquia->id_parroquia ? 'selected' : '' }}>
                                {{$parroquia->parroquia}}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
            
            {{ Form::textComp('sector','Sector') }}
            {{ Form::areaComp('direccion','Dirección') }}
            {{ Form::textComp('lugar','Lugar') }}
            {{ Form::textComp('nombre_operativo','Nombre del Operativo') }}
            {{ Form::dateComp('fecha', 'Fecha del Operativo') }}
            {{ Form::textComp('promotor_nombre','Promotor') }}
            {{ Form::textComp('promotor_telefono','Teléfono') }}

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

        IMask(document.getElementById('promotor_telefono'),{
            mask: '+{00}0000000000'
        })

        $(document).ready(function () {
            // Cargar municipios si hay estado seleccionado al cargar la página
            if($('#estado-dropdown').val()) {
                var id_estado = $('#estado-dropdown').val();
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
                            var selected = value.id_municipio == '{{ isset($operativo) ? $operativo->municipio_id : "" }}' ? 'selected' : '';
                            $("#municipio-dropdown").append('<option value="' + value.id_municipio + '" ' + selected + '>' + value.municipio + '</option>');
                        });
                        
                        // Cargar parroquias si hay municipio seleccionado
                        if($('#municipio-dropdown').val()) {
                            var id_municipio = $('#municipio-dropdown').val();
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
                                        var selected = value.id_parroquia == '{{ isset($operativo) ? $operativo->parroquia_id : "" }}' ? 'selected' : '';
                                        $("#parroquia-dropdown").append('<option value="' + value.id_parroquia + '" ' + selected + '>' + value.parroquia + '</option>');
                                    });
                                }
                            });
                        }
                    }
                });
            }

            // Resto del código existente para los eventos change...
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
                            $("#municipio-dropdown").append('<option value="' + value.id_municipio + '">' + value.municipio + '</option>');
                        });
                        $('#parroquia-dropdown').html('<option value="">-- Selecciona Parroquia --</option>');
                    }
                });
            });

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
                            $("#parroquia-dropdown").append('<option value="' + value.id_parroquia + '">' + value.parroquia + '</option>');
                        });
                    }
                });
            });
        });
    </script>

@endpush