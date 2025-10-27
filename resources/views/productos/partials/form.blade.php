<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <h5 class="">Datos del Producto</h5>
            <hr>
            {{ Form::selectComp('categoria_id','Categoria', '', $categorias) }}
            {{ Form::textComp('nombre','Nombre', null, null, '') }}
            {{ Form::textComp('precio','Precio', null, null, '') }}
            {{ Form::textComp('descripcion','Descripción', null, null, '') }}
            {{ Form::fileComp('imagen','Imagen', null, null, '') }}
            {{ Form::checkboxComp('status','Estatus', null, null, '') }}
            {{ Form::checkboxComp('barcode','Barcode', null, null, '') }}
            {{ Form::textComp('qrcode','QR Code', null, null, '') }}
            {{ Form::textComp('stock','Stock', null, null, '') }}

        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        @if((Route::current()->getName() == 'productos.create') OR (Route::current()->getName() == 'productos.edit'))
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