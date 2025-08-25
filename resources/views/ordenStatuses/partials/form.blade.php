<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <h5 class="">Datos del Estatus de Orden</h5>
            <hr>
            {{ Form::textComp('name','Nombre', null, null, '') }}
            {{ Form::textComp('description','Descripción', null, null, '') }}

        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        @if((Route::current()->getName() == 'orden-statuses.create') OR (Route::current()->getName() == 'orden-statuses.edit'))
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