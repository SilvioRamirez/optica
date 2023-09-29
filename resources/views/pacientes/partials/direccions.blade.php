<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">

            <label for="estado-dropdown mb-1"><strong>Estado</strong></label>
            <div class="form-group mb-2">
                <select  id="estado-dropdown" name="id_estado" class="form-control">
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
                <select id="municipio-dropdown" name="id_municipio" class="form-control">
                </select>
            </div>

            <label for="parroquia-dropdown" class="mb-1"><strong>Parroquia</strong></label>
            <div class="form-group mb-2">
                <select id="parroquia-dropdown" name="id_parroquia" class="form-control">
                </select>
            </div>
            
            {{ Form::textComp('sector','Sector') }}
            {{ Form::areaComp('direccion','Dirección') }}
            {{ Form::textComp('lugar_registro','Lugar de Registro (Operativo)') }}

        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            {{ Form::submitComp() }}
    </div>
</div>
@push('scripts')

    <script type="module">

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