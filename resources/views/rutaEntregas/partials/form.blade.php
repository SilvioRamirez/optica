<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::textComp('ruta_entrega','Nombre del Tipo de Ruta de Entrega', null, null, '') }}
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        @if((Route::current()->getName() == 'rutaEntregas.create') OR (Route::current()->getName() == 'rutaEntregas.edit'))
            {{ Form::submitComp() }}
        @endif
    </div>
</div>
@push('scripts')

    <script type="module">

    </script>
@endpush