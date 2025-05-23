@extends('layouts.admin.app')

@section('title', 'Administración de Formularios')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-square-pen"></i> Administración de Formularios</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">

            @include('fragment.error')
            @include('fragment.success')

        </div>
    </div>
    @canany(['formulario-list'])

        <div class="card border-light mb-3 shadow">
            <div class="card-header bg-primary text-white">
                @can('formulario-create')
                    <div class="float-start">
                        <a href="{{ route('formularios.create') }}" class="btn btn-light btn-sm"><i class="fa fa-plus"></i>
                            {{ __('Create New') }}</a>
                    </div>
                @endcan
                <div class="float-end">
                    <a href="{{ route('home') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                        {{ __('Volver') }}</a>
                </div>
            </div>
            <div class="card-body table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
    @endcanany

    {{-- Modal Cambiar Estatus del Lente --}}
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
                                    <h2 id="numero_orden">Numero de Orden: </h2>
                                    <h2 id="status">Estatus: </h2>
                                    <h2 id="laboratorio">Laboratorio: </h2>
                                    <h2 id="total">Total: </h2>
                                    <h2 id="saldo">Saldo: </h2>

                                </div>
                                <hr>

                                <div class="row">
                                    <h5><strong>Actualizar Estatus</strong></h5>
                                    <div class="form-group mb-2">
                                        {{ Form::selectComp('estatus', 'Estatus', '', $estatuses) }}
                                        {{ Form::selectComp('ruta_entrega_id', 'Ruta de Entrega', '', $rutaEntregas) }}
                                        {{ Form::selectComp('laboratorio-dropdown', 'Laboratorio', '', $laboratorios) }}
                                        {{ Form::dateComp('fecha_entrega', 'Fecha de Entrega', null, null, '') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success btn-revisarLente"><i class="fa fa-pen-to-square"></i>
                        Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Cargar Fotografias de Contrato --}}
    <div class="modal fade" id="uploadImageModal" tabindex="-1" aria-labelledby="uploadImageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="uploadImageModalLabel"><i class="fa fa-images"></i> Fotografías de
                        Contrato</h1>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <h1 class="text-center"><i class="fa fa-upload mb-2"></i> Cargar Imagenes</h1>
                                <div class="col-md-12 row">
                                    <form action="{{ route('imagenContratos.store') }}" method="POST" class="dropzone"
                                        id="myDropzone" enctype="multipart/form-data">
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
                    <button type="button" class="btn btn-success" onclick="actualizarModal()"><i
                            class="fa fa-arrows-rotate"></i> Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Pagos de Contrato --}}
    <div class="modal fade" id="pagosModal" tabindex="-1" aria-labelledby="pagosModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="pagosModalLabel"><i class="fa fa-file-invoice-dollar"></i> Pagos de
                        Contrato</h1>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <h1 class="text-center"><i class="fa fa-file-invoice-dollar mb-2"></i> Información de
                                    Pagos</h1>
                                <div class="col-md-12 row">

                                    <h3 id="saldoPaciente">Paciente: </h3>
                                    <h3 id="saldoNumeroOrden">Numero de Orden: </h3>
                                    <h3 id="saldoEstatus">Estatus: </h3>
                                    <h3 id="saldoTotal">Total: </h3>
                                    <h3 id="saldoSaldo">Saldo: </h3>
                                    <h3 id="saldoPorcentajePago">Porcentaje Pagado: </h3>
                                    <h3 id="saldoCashea">Pago con CASHEA: </h3>

                                </div>
                                <hr>

                                <form action="{{ route('pagos.store') }}" method="POST" id="pagoForm"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <h2 class="text-center">Registrar Nuevo Pago</h2>
                                        {{ Form::hiddenComp('saldo_formulario_id') }}
                                        <div class="col-xs-2 col-sm-2 col-md-2">
                                            {{ Form::textComp('monto', 'Monto', null, null, '') }}
                                        </div>
                                        <div class="col-xs-2 col-sm-2 col-md-2">
                                            {{ Form::dateComp('pago_fecha', 'Fecha', null, null, '') }}
                                        </div>
                                        <div class="col-xs-2 col-sm-2 col-md-2">
                                            {{ Form::selectComp('tipo_id', 'Tipo', '', $tipos) }}
                                        </div>
                                        <div class="col-xs-2 col-sm-2 col-md-2">
                                            {{ Form::selectComp('origen_id', 'Origen del Registro', '', $origens) }}
                                        </div>
                                        <div class="col-xs-2 col-sm-2 col-md-2">
                                            {{ Form::textComp('referencia', 'Ref', null, null, '') }}
                                        </div>
                                        <div class="col-xs-1 col-sm-1 col-md-1">
                                            <div class="d-grid gap-2 mt-md-4 mt-sm-0 mt-lg-4 mt-sm-0">
                                                <button type="submit" class="btn btn-primary btn-block"
                                                    title="Guardar"><i class="fa fa-floppy-disk"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div id="mensaje">
                                </div>
                                <hr>
                                <div class="table-responsive">
                                    <table id="tablaPagos" class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>MONTO</th>
                                                <th>FECHA</th>
                                                <th>TIPO</th>
                                                <th>ORIGEN</th>
                                                <th>REF</th>
                                                <th>COMPROBANTE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script type="module">
        /* Dropzone.autoDiscover = false; */

        let myDropzone = new Dropzone("#myDropzone", {
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            dictDefaultMessage: 'Arrastre una imagen al recuadro para subirla',
            acceptedFiles: 'image/*',
            maxFiles: 5,
            maxFilesize: 20, // Limitamos a 2MB por archivo
            parallelUploads: 1, // Subir de uno en uno
            timeout: 180000, // 3 minutos de timeout
            init: function() {
                this.on("error", function(file, errorMessage, xhr) {
                    console.error("Error de carga:", errorMessage);
                    // Mostrar error al usuario
                    Swal.fire({
                        title: 'Error',
                        text: 'Error al cargar la imagen: ' + errorMessage,
                        icon: 'error',
                        confirmButtonText: 'OK',
                        confirmButtonColor: "#dc3545",
                    });
                });
                this.on("success", function(file, response) {
                    console.log("Éxito:", response);
                    if (response && response.success) {
                        Swal.fire({
                            title: 'Éxito',
                            text: 'Imagen cargada correctamente',
                            icon: 'success',
                            confirmButtonText: 'OK',
                            confirmButtonColor: "#198754",
                        });
                    }
                });
            }
        });

        Dropzone.options.myDropzone = {
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            dictDefaultMessage: 'Arrastre una imagen al recuadro para subirla',
            acceptedFiles: 'image/*',
            maxFiles: 5,
            maxFilesize: 2, // Limitamos a 2MB por archivo
            parallelUploads: 1 // Subir de uno en uno
        };
    </script>


    <script type="module">
        $(document).ready(function() {

            $('.btn-revisarLente').click(function(e) {
                e.preventDefault();

                var formulario_id = document.getElementById("formulario_id").value;
                var estatus = document.getElementById("estatus").value;
                var ruta_entrega_id = document.getElementById("ruta_entrega_id").value;
                var laboratorio = document.getElementById("laboratorio-dropdown").value;
                var fecha_entrega = document.getElementById("fecha_entrega").value;

                console.log(estatus);

                var url = /* SITEURL + */ '/api/cambiarEstatus/' + formulario_id;

                axios.post(url, {
                    params: {
                        formulario_id: formulario_id,
                        estatus: estatus,
                        ruta_entrega_id: ruta_entrega_id,
                        laboratorio: laboratorio,
                        fecha_entrega: fecha_entrega
                    }
                }).then(response => {

                    Swal.fire({
                        title: 'Éxito',
                        text: 'Registro actualizado',
                        icon: 'success',
                        confirmButtonText: 'OK',
                        confirmButtonColor: "#198754",
                    })

                    bootstrap.Modal.getOrCreateInstance(document.getElementById('prLenteModal'))
                        .hide();

                    $('#formularios-table').DataTable().ajax.reload(null, false);

                    document.getElementById('estatus').value = "";
                    document.getElementById('ruta_entrega_id').value = "";
                    document.getElementById('laboratorio-dropdown').value = "";
                    document.getElementById('fecha_entrega').value = "";


                }).catch(error => {
                    if (error.response) {
                        console.log(error.response.data.errors)
                    }
                });
            });

        });
    </script>

    <script>
        const SITEURL = 'https://optirango.com';

        function openModal(id) {

            document.getElementById('estatus').value = "";
            document.getElementById('ruta_entrega_id').value = "";
            document.getElementById('laboratorio-dropdown').value = "";
            document.getElementById('fecha_entrega').value = "";
            bootstrap.Modal.getOrCreateInstance(document.getElementById('prLenteModal')).show();

            var url = /* SITEURL +  */ '/api/estatusFormulario/' + id;

            axios.post(url).then(response => {
                let status = response.status;
                let message = response.statusText;
                console.log(message, status);

                let formulario_id = response.data.id

                document.getElementById("formulario_id").value = formulario_id

                let numero_orden = response.data.numero_orden
                let paciente = response.data.paciente
                let estatus = response.data.estatus
                let ruta_entrega_id = response.data.ruta_entrega_id
                let total = response.data.total
                let saldo = response.data.saldo
                let observaciones_extras = response.data.observaciones_extras
                let edad = response.data.edad
                let fecha = response.data.fecha
                let laboratorio = response.data.laboratorio
                let fecha_entrega = response.data.fecha_entrega
                document.getElementById("paciente").innerHTML = '<strong>Paciente:</strong> ' + paciente;
                document.getElementById("numero_orden").innerHTML = '<strong>Numero de Orden:</strong> ' + '' +
                    numero_orden + '';
                document.getElementById("status").innerHTML = '<strong>Estatus:</strong> ' + '' + estatus + '';
                document.getElementById("laboratorio").innerHTML = '<strong>Laboratorio:</strong> ' + '' +
                    laboratorio + '';
                document.getElementById('estatus').value = estatus;
                document.getElementById('ruta_entrega_id').value = ruta_entrega_id;
                document.getElementById('laboratorio-dropdown').value = laboratorio;
                document.getElementById('fecha_entrega').value = fecha_entrega;
                document.getElementById("total").innerHTML = '<strong>Total:</strong> ' + '' + total + '';
                document.getElementById("saldo").innerHTML = '<strong>Saldo:</strong> ' + '' + saldo + '';

            }).catch(error => {
                if (error.response) {
                    console.log(error.response.data.errors)
                }
            });

        }

        function actualizarModal() {

            var idFormulario = document.getElementById("formulario_imagen_id").value;

            openModalFotografiasContrato(idFormulario);

        }

        function openModalFotografiasContrato(id) {

            /* Se coloca al comienzo para que antes de abrir el modal el imagen container este vacio y no esperar la respuesta del servidor con las imagenes */

            const container = document.getElementById('imagen-container');
            container.innerHTML = '';

            Dropzone.forElement("#myDropzone").removeAllFiles(true);

            bootstrap.Modal.getOrCreateInstance(document.getElementById('uploadImageModal')).show();

            var url = /* SITEURL +  */ '/api/imagenesContrato/' + id;

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

                                var urlDelete = /* SITEURL +  */
                                    '/api/imagenesContratoDelete/' + `${imagen.id}`;

                                axios.post(urlDelete).then(response => {
                                    let status = response.status;
                                    let message = response.statusText;
                                    console.log(response.data);
                                }).catch(error => {
                                    if (error.response) {
                                        console.log(error.response.data.errors)
                                    }
                                });

                                Swal.fire({
                                    title: "¡Eliminado!",
                                    text: "El archivo ha sido eliminado.",
                                    icon: "success"
                                });

                                openModalFotografiasContrato(imagen.formulario_id);

                                // Intentar varios métodos de actualización de DataTables
                                try {
                                    // Método 1: Usando API moderna
                                    $('#formularios-table').DataTable().ajax.reload(null,
                                        false);
                                    // Método 2: Usando método antiguo
                                    var oTable = $('#formularios-table').dataTable();
                                    oTable.fnDraw(false);
                                    // Método 3: Redraw directo
                                    $('#formularios-table').DataTable().draw(false);
                                } catch (error) {
                                    console.error("Error al actualizar tabla:", error);
                                }

                            }
                        });
                    })

                    document.querySelector('body').appendChild(btnEliminar);

                    /* Agrega los dos botones juntos */
                    footer.append(btnVer, btnEliminar);

                })

            }).catch(error => {
                if (error.response) {
                    console.log(error.response.data.errors)
                }
            });

        }

        function openModalPagosContrato(id) {

            document.getElementById("saldoPaciente").innerHTML = '';
            document.getElementById("saldoNumeroOrden").innerHTML = '';
            document.getElementById("saldoEstatus").innerHTML = '';
            document.getElementById("saldoTotal").innerHTML = '';
            document.getElementById("saldoSaldo").innerHTML = '';
            document.getElementById("saldoPorcentajePago").innerHTML = '';
            document.getElementById("saldoCashea").innerHTML = '';
            limpiarPagoForm();

            document.getElementById('saldo_formulario_id').value = id;

            bootstrap.Modal.getOrCreateInstance(document.getElementById('pagosModal')).show();

            var url = '/api/saldoFormulario/' + id;

            axios.post(url).then(response => {
                let status = response.status;
                let message = response.statusText;
                console.log(response.data);

                document.getElementById("saldoPaciente").innerHTML = '<strong>Paciente:</strong> ' + '' + response
                    .data.paciente + '';
                document.getElementById("saldoNumeroOrden").innerHTML = '<strong>Nro. Orden:</strong> ' + '' +
                    response.data.numero_orden + '';
                document.getElementById("saldoEstatus").innerHTML = '<strong>Estatus:</strong> ' + '' + response
                    .data.estatus + '';
                document.getElementById("saldoTotal").innerHTML = '<strong>Total:</strong> ' + '' + response.data
                    .total + '';
                document.getElementById("saldoCashea").innerHTML = '<strong>Pago con CASHEA:</strong> ' + '' + (
                    response.data.cashea == 1 ? 'SI' : 'NO') + '';
            }).catch(error => {
                if (error.response) {
                    console.log(error.response.data.errors)
                }
            });

            consultaPagosTable(id);

        }

        /* Evento que envia el formulario para registrar un nuevo pago */
        document.getElementById('pagoForm').addEventListener('submit', function(event) {
            event.preventDefault(); //Evita que el formulario se envie (su comportamiento normal)

            const formData = new FormData(this); //Obtiene los datos del formulario

            axios.post('/pagos', formData).then(response => {
                let status = response.status;
                let message = response.statusText;
                console.log(response.data);
                /* document.getElementById('mensaje').innerText = 'Formulario enviado correctamente'; */
                limpiarPagoForm();
                consultaPagosTable(response.data.formulario_id);

                // Intentar varios métodos de actualización de DataTables
                try {
                    // Método 1: Usando API moderna
                    $('#formularios-table').DataTable().ajax.reload(null, false);
                    // Método 2: Usando método antiguo
                    var oTable = $('#formularios-table').dataTable();
                    oTable.fnDraw(false);
                    // Método 3: Redraw directo
                    $('#formularios-table').DataTable().draw(false);
                } catch (error) {
                    console.error("Error al actualizar tabla:", error);
                }

            }).catch(error => {
                if (error.response) {
                    /* document.getElementById('mensaje').innerText = 'Error al enviar formulario'; */
                    console.log(error.response.data.errors)
                }
            });

        });

        function limpiarPagoForm() {
            document.getElementById('monto').value = '';
            document.getElementById('pago_fecha').value = '';
            document.getElementById('tipo_id').value = '';
            document.getElementById('origen_id').value = '';
            document.getElementById('referencia').value = '';

            const tbody = document.querySelector('#tablaPagos tbody');
            tbody.innerHTML = '';
        }

        function calculoPagos(id) {

            var url = '/api/calculoPagos/' + id;

            axios.post(url).then(response => {
                console.log(response.data);
                document.getElementById("saldoSaldo").innerHTML = '<strong>Saldo:</strong> ' + '' + response.data
                    .saldo + '';
                document.getElementById("saldoPorcentajePago").innerHTML = '<strong>Porcentaje Pagado:</strong> ' +
                    '' + response.data.porcentaje + '%';
            });

        }

        function consultaPagosTable(id) {

            calculoPagos(id);

            var url = /* SITEURL +  */ '/api/consultaPagos/' + id;

            axios.post(url).then(response => {
                let status = response.status;
                let message = response.statusText;
                console.log(response.data);

                const tbody = document.querySelector('#tablaPagos tbody');
                tbody.innerHTML = ''; // Limpiar tabla antes de agregar nuevos datos

                response.data.forEach(pago => {

                    const fila = document.createElement('tr'); // Crear una nueva fila

                    const celdaId = document.createElement('td');
                    celdaId.textContent = pago.id;
                    fila.appendChild(celdaId);

                    const celdaMonto = document.createElement('td');
                    celdaMonto.textContent = pago.monto;
                    fila.appendChild(celdaMonto);

                    const celdaPagoFecha = document.createElement('td');
                    celdaPagoFecha.textContent = pago.pago_fecha;
                    fila.appendChild(celdaPagoFecha);

                    const celdaTipoId = document.createElement('td');
                    celdaTipoId.textContent = pago.tipo;
                    fila.appendChild(celdaTipoId);

                    const celdaOrigenId = document.createElement('td');
                    celdaOrigenId.textContent = pago.origen;
                    fila.appendChild(celdaOrigenId);

                    const celdaReferencia = document.createElement('td');
                    celdaReferencia.textContent = pago.referencia;
                    fila.appendChild(celdaReferencia);

                    const celdaImagePath = document.createElement('td');
                    if (pago.image_path) {
                        const img = document.createElement('img');
                        img.src = `${pago.image_path}`;
                        img.style.width = '50px';
                        img.style.height = '50px';
                        img.className = 'img-fluid m-1';
                        celdaImagePath.appendChild(img);

                        const btnVer = document.createElement('a');
                        btnVer.className = 'btn btn-primary btn-sm m-1';
                        btnVer.href = `${pago.image_path}`;
                        btnVer.target = '_blank';
                        btnVer.innerHTML = '<i class="fa fa-magnifying-glass-plus"></i>';
                        celdaImagePath.appendChild(btnVer);
                    }

                    // Agregar botón de carga
                    const inputFile = document.createElement('input');
                    inputFile.type = 'file';
                    inputFile.accept = 'image/*';
                    inputFile.style.display = 'none';
                    inputFile.id = `file-input-${pago.id}`;


                    const btnCargar = document.createElement('button');
                    btnCargar.className = 'btn btn-primary btn-sm m-1';
                    btnCargar.innerHTML = '<i class="fa fa-upload"></i> Cargar';
                    btnCargar.onclick = function() {
                        inputFile.click();
                    };

                    inputFile.onchange = function(e) {
                        const file = e.target.files[0];
                        if (file) {
                            const formData = new FormData();
                            formData.append('image', file);
                            formData.append('pago_id', pago.id);

                            axios.post('/api/cargar-imagen-pago', formData, {
                                    headers: {
                                        'Content-Type': 'multipart/form-data'
                                    }
                                })
                                .then(response => {
                                    if (response.data.success) {
                                        // Actualizar la imagen en la tabla
                                        consultaPagosTable(id); // Recargar la tabla

                                        // Intentar varios métodos de actualización de DataTables
                                        try {
                                            // Método 1: Usando API moderna
                                            $('#formularios-table').DataTable().ajax.reload(null,
                                                false);
                                            // Método 2: Usando método antiguo
                                            var oTable = $('#formularios-table').dataTable();
                                            oTable.fnDraw(false);
                                            // Método 3: Redraw directo
                                            $('#formularios-table').DataTable().draw(false);
                                        } catch (error) {
                                            console.error("Error al actualizar tabla:", error);
                                        }

                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Éxito',
                                            text: 'Imagen cargada correctamente'
                                        });
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: 'Error al cargar la imagen'
                                    });
                                });
                        }
                    };

                    celdaImagePath.appendChild(inputFile);

                    celdaImagePath.appendChild(btnCargar);
                    fila.appendChild(celdaImagePath);

                    tbody.appendChild(fila);
                });

            }).catch(error => {
                if (error.response) {
                    console.log(error.response.data.errors)
                }
            });
        }
    </script>
@endpush
