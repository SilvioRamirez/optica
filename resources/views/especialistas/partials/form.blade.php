<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <h5 class="">Información del Especialista</h5>
            <hr>
            {{ Form::textComp('nombre','Nombres y Apellidos', null, null, '') }}
            {{ Form::textComp('cedula','Cedula', null, null, '') }}
            {{ Form::textComp('telefono','Telefono', null, null, '') }}
            {{ Form::textComp('titulo','Titulo o Carrera', null, null, '') }}
            {{ Form::textComp('correo','Correo electronico', null, null, '') }}

        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        @if((Route::current()->getName() == 'especialistas.create') OR (Route::current()->getName() == 'especialistas.edit'))
            {{ Form::submitComp() }}
        @endif
    </div>
</div>

@push('scripts')
    <script type="module">


    </script>

    <script>


    </script>
@endpush