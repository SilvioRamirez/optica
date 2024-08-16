<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::textComp('tipo_tratamiento','Nombre del Tipo de Tratamiento', null, null, '') }}
            {{ Form::textComp('cantidad_stock','Cantidad en Stock', null, null, '') }}
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        @if((Route::current()->getName() == 'tipoTratamientos.create') OR (Route::current()->getName() == 'tipoTratamientos.edit'))
            {{ Form::submitComp() }}
        @endif
    </div>
</div>
@push('scripts')

    <script type="module">

        IMask(document.getElementById('cantidad_stock'),{
            mask: Number,
        })

    </script>
@endpush