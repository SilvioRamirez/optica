<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::textComp('cedula','Cedula o Documento', null, null, 'V12345678-0') }}
            {{ Form::textComp('nombres','Nombres', null, null, 'Nombres') }}
            {{ Form::textComp('apellidos','Apellidos', null, null, 'Apellidos') }}
            {{ Form::dateComp('fecha_nacimiento','Fecha de Nacimiento') }}
            {{ Form::textComp('edad','Edad', null, null, '12') }}
            {{ Form::selectComp('sexo','Sexo', '', ['MASCULINO' => 'MASCULINO', 'FEMENINO' => 'FEMENINO']) }}
            {{ Form::textComp('telefono','Teléfono', null, null,'+58 0412-1231234') }}
            {{ Form::emailComp('correo','Correo') }}
            {{ Form::areaComp('observacion','Observación') }}
            {{ Form::checkboxComp('status','Estatus') }}
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        @if((Route::current()->getName() == 'pacientes.create') OR (Route::current()->getName() == 'pacientes.edit'))
            {{ Form::submitComp() }}
        @endif
    </div>
</div>
@push('scripts')

    <script type="module">
        IMask(document.getElementById('telefono'),{
            mask: '000000000000'
        })

        IMask(document.getElementById('cedula'),{
            mask: '{v}00000000-00000',
            prepareChar: str => str.toUpperCase(),
            definitions: {
                // <any single char>: <same type as mask (RegExp, Function, etc.)>
                // defaults are '0', 'a', '*'
                'v': /[V,J,G,E,P]/
            }
        })

        IMask(document.getElementById('edad'), {
            mask: '00'
        })

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