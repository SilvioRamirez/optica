<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::textComp('tratamiento','Nombre del Tratamiento', null, null, '') }}
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        @if((Route::current()->getName() == 'tratamientos.create') OR (Route::current()->getName() == 'tratamientos.edit'))
            {{ Form::submitComp() }}
        @endif
    </div>
</div>
@push('scripts')

    <script type="module">

    </script>
@endpush