<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <h5 class="">Datos del Tipo de Pago</h5>
            <hr>
            {{ Form::textComp('tipo','Tipo de Pago', null, null, '') }}

        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        @if((Route::current()->getName() == 'tipos.create') OR (Route::current()->getName() == 'tipos.edit'))
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