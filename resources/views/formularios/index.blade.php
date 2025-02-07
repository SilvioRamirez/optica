@extends('layouts.app')

@section('content')




    <div class="row">
            <div class="col-lg-12 margin-tb">

                @include('fragment.error')
                @include('fragment.success')

                <div class="text-center">
                    <h1><i class="fa fa-square-pen"></i> Formulario</h1>
                </div>
                @can('formulario-create')
                    <div class="mt-2 mb-2">
                        <a class="btn btn-success btn-sm" href="{{ route('formularios.create') }}"><i class="fa fa-plus"></i> {{ __('Create New')}}</a>
                    </div>
                @endcan
            </div>
        @canany(['formulario-list'])
            <div class="card border-light mb-3 shadow">
                <div class="card-header bg-primary text-white">
                    Administración de Formularios
                </div>
                <div class="card-body table-responsive">
                    {{ $dataTable->table() }}
                </div>
            </div>
        @endcanany
    </div>

<div class="modal fade" id="prLenteModal" tabindex="-1" aria-labelledby="prLenteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="prLenteModalLabel"><i class="fa fa-check"></i> Cambiar Estatus</h1>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <h1 class="text-center"><i class="fa fa-check mb-2"></i> Cambiar Estatus</h1>
                                <div class="col-md-12 row">
                                    {{ Form::hiddenComp('formulario_id') }}
                                    <h2 id="paciente">Paciente: </h2>
                                    <h2 id="numero_orden" >Numero de Orden: </h2>
                                    <h2 id="status">Estatus: </h2>
                                    <h2 id="laboratorio">Laboratorio: </h2>
                                    <h2 id="total">Total: </h2>
                                    <h2 id="saldo">Saldo: </h2>

                                </div>
                            <hr>

                            <div class="row">
                                <h5><strong>Actualizar Estatus</strong></h5>
                                <label for="estatus"><strong>Estatus:</strong></label>
                                <div class="form-group mb-2">
                                    {{ Form::selectComp('estatus', 'Estatus', '', $estatuses) }}
                                    {{ Form::selectComp('ruta_entrega_id', 'Ruta de Entrega', '', $rutaEntregas) }}
                                    {{ Form::selectComp('laboratorio-dropdown', 'Laboratorio', '', $laboratorios) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success btn-revisarLente"><i class="fa fa-check-double"></i> Actualizar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="uploadImageModal" tabindex="-1" aria-labelledby="uploadImageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="uploadImageModalLabel"><i class="fa fa-images"></i> Fotografías de Contrato</h1>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <h1 class="text-center"><i class="fa fa-upload mb-2"></i> Cargar Imagenes</h1>
                                <div class="col-md-12 row">
                                    <form action="{{route('imagenContratos.store')}}" method="POST" class="dropzone" id="myDropzone" enctype="multipart/form-data">
                                        @csrf
                                        {{ Form::hiddenComp('formulario_imagen_id') }}
                                        <div class="fallback">
                                            <input type="file" multiple />
                                        </div>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <h2 class="text-center"><i class="fa fa-images"></i> Imagenes cargadas de este contrato</h2>
                    </div>
                </div>

                    <div class="row" id="imagen-container">
                        {{-- Contiene la información cargada de las imagenes en javascript --}}
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" onclick="actualizarModal()"><i class="fa fa-arrows-rotate"></i> Actualizar</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

<script type="module">
/* Dropzone.autoDiscover = false; */

let myDropzone = new Dropzone("#myDropzone");

Dropzone.options.myDropzone = {
    headers:{
        'X-CSRF-TOKEN' : '{{csrf_token()}}'
    },
    dictDefaultMessage: 'Arrastre una imagen al recuadro para subirla',
    acceptedFiles: 'image/*',
    maxFiles: 5,
}; 

</script>

<script type="module">

    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
    })

</script>

<script type="module">

/* import Dropzone from "dropzone";

let myDropzone = new Dropzone("#my-form");

myDropzone.on("addedfile", file => {
    console.log(`File added: ${file.name}`);
}); */

    $(document).ready(function () {

        //alert('hola');

        

        $('.btn-revisarLente').click(function(e) {
            e.preventDefault();

            var formulario_id   = document.getElementById("formulario_id").value;
            var estatus         = document.getElementById("estatus").value;
            var ruta_entrega_id = document.getElementById("ruta_entrega_id").value;
            var laboratorio     = document.getElementById("laboratorio-dropdown").value;
            
            console.log(estatus);

            var url = /* SITEURL + */ '/api/cambiarEstatus/'+formulario_id;
            
            axios.post(url,
                { params:
                        {
                            formulario_id: formulario_id,
                            estatus: estatus,
                            ruta_entrega_id: ruta_entrega_id,
                            laboratorio: laboratorio
                        }
                }).then(response => {

                    bootstrap.Modal.getOrCreateInstance(document.getElementById('prLenteModal')).hide();

                    document.getElementById('estatus').value="";
                    document.getElementById('ruta_entrega_id').value="";
                    document.getElementById('laboratorio-dropdown').value="";
                    
                    var oTable = $('#formularios-table').dataTable();
                    oTable.fnDraw(false);

                    Swal.fire({
                        title: 'Éxito',
                        text: 'Registro actualizado',
                        icon: 'success',
                        confirmButtonText: 'OK',
                        confirmButtonColor: "#198754",
                    })

            }).catch(error => {                  
                if(error.response){
                    console.log(error.response.data.errors)
                }
            });
        });

    });

</script>

<script>

    const SITEURL = 'https://optirango.com';

    function openModal(id){
        
        document.getElementById('estatus').value="";
        document.getElementById('ruta_entrega_id').value="";
        document.getElementById('laboratorio-dropdown').value="";

        bootstrap.Modal.getOrCreateInstance(document.getElementById('prLenteModal')).show();

        var url = /* SITEURL +  */'/api/estatusFormulario/'+id;

        axios.post(url).then(response => {
            let status = response.status;
            let message = response.statusText;
            console.log(message, status);

            let formulario_id = response.data.id

            document.getElementById("formulario_id").value = formulario_id

            let numero_orden            = response.data.numero_orden
            let paciente                = response.data.paciente
            let estatus                 = response.data.estatus
            let ruta_entrega_id         = response.data.ruta_entrega_id
            let total                   = response.data.total
            let saldo                   = response.data.saldo
            let direccion_operativo     = response.data.direccion_operativo
            let observaciones_extras    = response.data.observaciones_extras
            let edad                    = response.data.edad
            let fecha                   = response.data.fecha
            let laboratorio             = response.data.laboratorio

            document.getElementById("paciente").innerHTML = '<strong>Paciente:</strong> '+ paciente;
            document.getElementById("numero_orden").innerHTML = '<strong>Numero de Orden:</strong> '+''+ numero_orden+'';
            document.getElementById("status").innerHTML = '<strong>Estatus:</strong> '+''+ estatus+'';
            document.getElementById("laboratorio").innerHTML = '<strong>Laboratorio:</strong> '+''+ laboratorio+'';
            document.getElementById('estatus').value=estatus;
            document.getElementById('ruta_entrega_id').value=ruta_entrega_id;
            document.getElementById('laboratorio-dropdown').value=laboratorio;
            document.getElementById("total").innerHTML = '<strong>Total:</strong> '+''+ total+'';
            document.getElementById("saldo").innerHTML = '<strong>Saldo:</strong> '+''+ saldo+'';

        }).catch(error => {                  
            if(error.response){
                console.log(error.response.data.errors)
            }
        });

    }

    function actualizarModal(){

        var idFormulario = document.getElementById("formulario_imagen_id").value;

        openModalFotografiasContrato(idFormulario);

    }

    function openModalFotografiasContrato(id){

        /* Se coloca al comienzo para que antes de abrir el modal el imagen container este vacio y no esperar la respuesta del servidor con las imagenes */

        const container = document.getElementById('imagen-container');
        container.innerHTML = '';

        Dropzone.forElement("#myDropzone").removeAllFiles(true);

        bootstrap.Modal.getOrCreateInstance(document.getElementById('uploadImageModal')).show();

        var url = /* SITEURL +  */'/api/imagenesContrato/'+id;

        axios.post(url).then(response => {
            let status = response.status;
            let message = response.statusText;
            console.log(response.data);

            /* Se rellena el ID del formulario que esta hidden en el formulario de la carga de imagen */
            let formulario_id = response.data.id
            document.getElementById("formulario_imagen_id").value = id

            const container = document.getElementById('imagen-container');

            container.innerHTML = '';

            response.data.forEach(imagen => {

                /* Creamos el elemento col-4 */
                const col = document.createElement('div');
                col.className = 'col-4';
                container.appendChild(col);

                /* Creamos el elemento Card */
                const card = document.createElement('div');
                card.className = 'card';
                col.appendChild(card);

                /* Creamos el Elemento Imagen */
                const img = document.createElement('img');
                img.src = `${imagen.path}`;
                img.alt = imagen.path;
                img.className = 'img-fluid';
                /* img.style.width = '200px'; */
                /* Se indica que se coloque el elemento recien creado imagen dentro del Container */
                card.appendChild(img);

                /* Creamos el elemento Footer */
                const footer = document.createElement('div');
                footer.className = 'card-footer';
                col.appendChild(footer);

                /* Creamos el Boton Ver */

                const btnVer = document.createElement('a');
                btnVer.className = 'btn btn-primary m-1';
                btnVer.href = `${imagen.path}`;
                btnVer.target = '_blank';
                btnVer.innerHTML = '<i class="fa fa-magnifying-glass-plus"></i> Ver';

                const btnEliminar = document.createElement('button');
                btnEliminar.className = 'btn btn-danger m-1';
                btnEliminar.innerHTML = '<i class="fa fa-trash"></i> Eliminar';
                /* btnEliminar.onlick = eliminarImagen(imagen.id); */
                btnEliminar.addEventListener('click', () => {
                    Swal.fire({
                        title: "¿Estás seguro?",
                        text: "Esta imagen se eliminara definitivamente ",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Si, eliminar",
                        cancelButtonText: "Cancelar"
                        }).then((result) => {
                        if (result.isConfirmed) {

                            var urlDelete = /* SITEURL +  */'/api/imagenesContratoDelete/'+`${imagen.id}`;

                            alert(urlDelete);

                            axios.post(urlDelete).then(response => {
                                let status = response.status;
                                let message = response.statusText;
                                console.log(response.data);
                            }).catch(error => {                  
                                if(error.response){
                                    console.log(error.response.data.errors)
                                }
                            });

                            Swal.fire({
                                title: "¡Eliminado!",
                                text: "El archivo ha sido eliminado.",
                                icon: "success"
                            });

                            openModalFotografiasContrato(imagen.formulario_id);

                        }
                    });
                })

                document.querySelector('body').appendChild(btnEliminar);

                /* Agrega los dos botones juntos */
                footer.append(btnVer, btnEliminar);

            })

        }).catch(error => {                  
            if(error.response){
                console.log(error.response.data.errors)
            }
        });

    }


</script>

@endpush