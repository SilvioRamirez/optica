<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <h5 class="">Datos del Producto</h5>
            <hr>
            {{ Form::selectComp('categoria_id','Categoria', '', $categorias) }}
            {{ Form::textComp('nombre','Nombre', null, null, '') }}
            {{ Form::textComp('precio','Precio', null, null, '') }}
            {{ Form::textComp('descripcion','Descripción', null, null, '') }}
            
            <div class="form-group">
                <label for="imagen">Imagen</label>
                @if(isset($producto) && $producto->imagen)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" 
                             class="img-thumbnail" style="max-height: 150px;"
                             onerror="this.style.display='none'">
                        <p class="text-muted small">Imagen actual. Seleccione una nueva para reemplazarla.</p>
                    </div>
                @endif
                <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
            </div>

            {{ Form::checkboxComp('status','Estatus', is_object($producto) ? $producto->status : null, null, '') }}
            {{ Form::checkboxComp('barcode','Barcode', is_object($producto) ? $producto->barcode : null, null, '') }}
            {{ Form::textComp('qrcode','QR Code', null, null, '') }}
            {{ Form::textComp('stock','Stock', null, null, '') }}
            {{ Form::checkboxComp('exento_iva','Exento de IVA', is_object($producto) ? $producto->exento_iva : null, null, '') }}
            <small class="form-text text-muted">Marcar si el producto está exento de IVA según la legislación vigente.</small>

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