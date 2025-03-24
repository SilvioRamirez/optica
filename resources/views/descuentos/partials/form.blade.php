<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::textComp('nombre','Nombre del Descuento', null, null, '') }}
            {{ Form::textComp('descripcion','Descripción', null, null, '') }}
            {{ Form::numberComp('porcentaje','Porcentaje (%) de Descuento', null, null, '') }}
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        @if((Route::current()->getName() == 'descuentos.create') OR (Route::current()->getName() == 'descuentos.edit'))
            {{ Form::submitComp() }}
        @endif
    </div>
</div>
@push('scripts')

    <script type="module">

    </script>
@endpush