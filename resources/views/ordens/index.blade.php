@extends('layouts.admin.app')

@section('title', 'Administración de Ordenes')

@section('content_header')
<h1 class="text-center"><i class="fa fa-id-badge"></i> Administración de Ordenes</h1>
@stop

@section('content')
    <div class="container-fluid">

        @include('fragment.error')
        @include('fragment.success')

    </div>
    @canany(['refractante-list'])
        <div class="card border-light mb-3 shadow">
            <div class="card-header bg-primary text-white">
                @can('refracante-create')
                    <div class="float-start">
                        <a href="{{ route('ordens.create') }}" class="btn btn-light btn-sm"><i class="fa fa-plus"></i>
                            {{ __('Create New') }}</a>
                    </div>
                @endcan
                <div class="float-end">
                    <a href="{{ route('home') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                        {{ __('Volver') }}</a>
                </div>
            </div>
            <div class="card-body table-responsive table-sm">
                {{ $dataTable->table() }}
            </div>
        </div>
    @endcanany

    {{-- Modal Pagos de Orden --}}
    <div class="modal fade" id="pagosModal" tabindex="-1" aria-labelledby="pagosModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="pagosModalLabel"><i class="fa fa-file-invoice-dollar"></i> Pagos de
                        Orden</h1>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <h1 class="text-center"><i class="fa fa-file-invoice-dollar mb-2"></i> Información de
                                    Pagos de Orden</h1>
                                <div class="col-md-12 row">
                                    <h3 id="saldoCliente">Cliente: </h3>
                                    <h3 id="saldoPaciente">Paciente: </h3>
                                    <h3 id="saldoNumeroOrden">Numero de Orden: </h3>
                                    <h3 id="saldoEstatus">Estatus: </h3>
                                    <h3 id="saldoTotal">Total: </h3>
                                    <h3 id="saldoSaldo">Saldo: </h3>
                                    <h3 id="saldoPorcentajePago">Porcentaje Pagado: </h3>
                                </div>
                                <hr>

                                <form action="{{ route('orden-payments.store') }}" method="POST" id="pagoForm"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <h2 class="text-center">Registrar Nuevo Pago</h2>
                                        {{ Form::hiddenComp('orden_id') }}
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
                                            <div class="d-grid gap-2 mt-md-5 mt-sm-0 mt-lg-4 mt-sm-0">
                                                <button type="submit" class="btn btn-primary btn-block" title="Guardar"><i
                                                        class="fa fa-floppy-disk"></i></button>
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

    <script>
        function openModalPagos(id) {

            document.getElementById("saldoPaciente").innerHTML = '';
            document.getElementById("saldoNumeroOrden").innerHTML = '';
            document.getElementById("saldoEstatus").innerHTML = '';
            document.getElementById("saldoTotal").innerHTML = '';
            document.getElementById("saldoSaldo").innerHTML = '';
            document.getElementById("saldoPorcentajePago").innerHTML = '';

            limpiarPagoForm();

            document.getElementById('orden_id').value = id;

            bootstrap.Modal.getOrCreateInstance(document.getElementById('pagosModal')).show();

            var url = '/api/orden-payments/' + id;

            axios.post(url).then(response => {
                let status = response.status;
                let message = response.statusText;
                /* console.log(response.data); */

                document.getElementById('saldoCliente').innerHTML = '<strong>Cliente:</strong> ' + '' + response.data.cliente.name ?? '' + '';
                document.getElementById("saldoPaciente").innerHTML = '<strong>Paciente:</strong> ' + '' + response.data.paciente ?? '' + '';
                document.getElementById("saldoNumeroOrden").innerHTML = '<strong>Nro. Orden:</strong> ' + '' +response.data.numero_orden ?? '' + '';
                document.getElementById("saldoEstatus").innerHTML = '<strong>Estatus:</strong> ' + '' + response .data.status ?? '' + '';
                document.getElementById("saldoTotal").innerHTML = '<strong>Total:</strong> ' + '' + response.data.precio_total ?? '' + '';
                document.getElementById("saldoSaldo").innerHTML = '<strong>Saldo:</strong> ' + '' + response.data.precio_saldo ?? '' + '';
                document.getElementById("saldoPorcentajePago").innerHTML = '<strong>Porcentaje Pagado:</strong> ' + '' + response.data.precio_porcentaje_pago ?? '' + '%';

                consultaPagosTable(response.data);

            }).catch(error => {
                if (error.response) {
                    /* console.log(error.response.data.errors) */
                }
            });

            /* consultaPagosTable(id); */

        }

        /* Evento que envia el formulario para registrar un nuevo pago */
        document.getElementById('pagoForm').addEventListener('submit', function (event) {
            event.preventDefault(); //Evita que el formulario se envie (su comportamiento normal)

            const formData = new FormData(this); //Obtiene los datos del formulario

            axios.post('/orden-payments', formData).then(response => {
                let status = response.status;
                let message = response.statusText;
                /* console.log(response.data); */
                /* document.getElementById('mensaje').innerText = 'Formulario enviado correctamente'; */
                limpiarPagoForm();
                openModalPagos(response.data.orden_id);

                // Intentar varios métodos de actualización de DataTables
                try {
                    // Método 1: Usando API moderna
                    /* $('#ordens-table').DataTable().ajax.reload(null, false); */
                    // Método 2: Usando método antiguo
                    /* var oTable = $('#ordens-table').dataTable();
                    oTable.fnDraw(false); */
                    // Método 3: Redraw directo
                    $('#ordens-table').DataTable().draw(false);
                } catch (error) {
                    console.error("Error al actualizar tabla:", error);
                }

            }).catch(error => {
                if (error.response) {
                    /* document.getElementById('mensaje').innerText = 'Error al enviar formulario'; */
                    /* console.log(error.response.data.errors) */
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

        /* function calculoPagos(id) {

            var url = '/api/calculoPagos/' + id;

            axios.post(url).then(response => {
                document.getElementById("saldoSaldo").innerHTML = '<strong>Saldo:</strong> ' + '' + response.data
                    .saldo + '';
                document.getElementById("saldoPorcentajePago").innerHTML = '<strong>Porcentaje Pagado:</strong> ' +
                    '' + response.data.porcentaje + '%';
            });

        } */

        function consultaPagosTable(data) {
            console.log(data);

                const tbody = document.querySelector('#tablaPagos tbody');
                tbody.innerHTML = ''; // Limpiar tabla antes de agregar nuevos datos

                data.orden_payments.forEach(pago => {

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
                    celdaTipoId.textContent = pago.tipo.tipo;
                    fila.appendChild(celdaTipoId);

                    const celdaOrigenId = document.createElement('td');
                    celdaOrigenId.textContent = pago.origen.nombre;
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
                    btnCargar.onclick = function () {
                        inputFile.click();
                    };

                    inputFile.onchange = function (e) {
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

        }
    </script>
@endpush