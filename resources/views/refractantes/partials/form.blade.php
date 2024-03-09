<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <h5 class="">Datos del Refractante</h5>
            <hr>

            {{ Form::selectComp('direccion', 'Dirección / Operativo', '', $operativos) }}

            {{ Form::textComp('nombre_apellido','Nombre y Apellido', null, null, '') }}


            @canany(['refractantes-telefono','refractantes-create','refractantes-edit'])
                {{ Form::textComp('telefono','Telefono', null, null, '') }}
            @endcanany
            
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        @if((Route::current()->getName() == 'refractantes.create') OR (Route::current()->getName() == 'refractantes.edit'))
            {{ Form::submitComp() }}
        @endif
    </div>
</div>

@push('scripts')
    <script type="module">
    
        /* Mayusculas */
        const $inputsAndTextareas = document.querySelectorAll('input, textarea')
        const handleKeyup = (event) => {
            event.target.value = event.target.value.toUpperCase()
        }
        const addHandleKeyup = ($element) => {
            $element.addEventListener('keyup', handleKeyup)
        }
        $inputsAndTextareas.forEach(addHandleKeyup)

        IMask(document.getElementById('telefono'),{
            mask: '000000000000'
        })


    </script>

    <script>


    </script>
@endpush