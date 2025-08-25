@extends('layouts.admin.app')

@section('title', 'Administración de Pagos Web de Clientes')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-hand-holding-dollar"></i> Administración de Pagos Web de Clientes</h1>
@stop

@section('content')

    <div class="container-fluid">
        @include('fragment.error')
        @include('fragment.tw-success')

    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-hand-holding-dollar"></i> Administración de Pagos Web de Clientes
            </div>
            <div class="float-end">
                <a href="{{ route('home') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        <div class="card-body table-responsive">
            {{ $dataTable->table() }}
        </div>
    </div>

    </div>
{{-- Modal Pagos de Contrato --}}
<div class="modal fade" id="viewClientePaymentModal" tabindex="-1" aria-labelledby="viewClientePaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="clientePaymentModalLabel"><i class="fa fa-hand-holding-dollar"></i> Información de Pago registrado via web</h1>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-6">
                        <p><strong>Cliente ID: </strong><span id="spancliente_id"></span></p>
                        <p><strong>Monto: </strong><span id="spanmonto"></span></p>
                        <p><strong>Monto USD: </strong><span id="spanmonto_usd"></span></p>
                        <p><strong>Tasa de Cambio: </strong><span id="spantasa_cambio"></span></p>
                        <p><strong>Fecha: </strong><span id="spanfecha"></span></p>
                        <p><strong>Banco Emisor: </strong><span id="spanbanco_emisor"></span></p>
                        <p><strong>Referencia: </strong><span id="spanreferencia"></span></p>
                        <p><strong>Fecha de Pago: </strong><span id="spanfecha_pago"></span></p>
                        <p><strong>Saldo: </strong><span id="spansaldo"></span></p>
                        <p><strong>Saldo Bs: </strong><span id="spansaldo_bs"></span></p>
                        <p><strong>Total: </strong><span id="spantotal"></span></p>
                        <p><strong>Status: </strong><span id="spanstatus"></span></p>
                        <input type="hidden" id="cliente_payment_id">
                        
                    </div>
                    <div class="col-6">
                        <figure>
                            <img id="spanfile" class="img-fluid img-thumbnail img-responsive img-rounded" src="" alt="">
                        </figure>
                    </div>
                </div>
                
                
            </div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-primary" id="btnConfirmClientePayment" style="display: none;" onclick="confirmClientePayment()"><i class="fa fa-check mr-2"></i>Confirmado</button>
                @role('Super Admin')
                    <button type="button" class="btn btn-danger" id="btnDeleteClientePayment" style="display: none;" onclick="openModalDelete()"><i class="fa fa-trash mr-2"></i>Eliminar Pago de Cliente</button>
                @endrole
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-close mr-2"></i>Cerrar</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        function openModalDelete() {
            var id = document.getElementById('cliente_payment_id').value;
            var urlDelete = '/cliente-payments/' + id + '/delete';
            Swal.fire({
                title: "¿Estás seguro?",
                text: "Este pago de cliente se eliminara definitivamente y se recalculara el saldo pendiente de la orden.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, eliminar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post(urlDelete).then(response => {
                        let status = response.status;
                        let message = response.data.message; // Obtenemos el mensaje de la respuesta
                        /* console.log(response.data); */

                        var tabla = $('#cliente-payments-table').DataTable();
                        tabla.ajax.reload();
                        bootstrap.Modal.getOrCreateInstance(document.getElementById('viewClientePaymentModal')).hide();

                        Swal.fire({
                            title: "¡Eliminado!",
                            text: message, // Usamos el mensaje de la respuesta
                            icon: "success"
                        });
                    }).catch(error => {
                        if (error.response) {
                            /* console.log(error.response.data.errors); */
                            Swal.fire({
                                title: "Error",
                                text: error.response.data.message ||
                                    "Ha ocurrido un error al eliminar el pago de cliente",
                                html: error.response.data.details,
                                icon: "error"
                            });
                        }
                    });
                }
            });
        }

        function confirmClientePayment() {
            var id = document.getElementById('cliente_payment_id').value;
            var url = '/cliente-payments/' + id + '/confirm';

            axios.post(url).then(response => {
                let status = response.status;
                let message = response.statusText;

                $('#cliente-payments-table').DataTable().ajax.reload(null, false);

                bootstrap.Modal.getOrCreateInstance(document.getElementById('viewClientePaymentModal')).hide();

                Swal.fire({
                    title: "¡Confirmado!",
                    text: message, // Usamos el mensaje de la respuesta
                    icon: "success"
                });
            }).catch(error => {
                if (error.response) {
                    /* console.log(error.response.data.errors); */
                    Swal.fire({
                        title: "Error",
                        text: error.response.data.message ||
                            "Ha ocurrido un error al confirmar el pago de cliente",
                        html: error.response.data.details,
                        icon: "error"
                    });
                }
            });   
        }

        function openModalViewPayment(id) {
            var url = '/cliente-payments/' + id + '/view';

            axios.post(url).then(response => {
                let status = response.status;
                let message = response.statusText;

                bootstrap.Modal.getOrCreateInstance(document.getElementById('viewClientePaymentModal')).show();
                
                document.getElementById('spancliente_id').textContent = response.data.cliente_id || '';
                document.getElementById('spanmonto').textContent = response.data.monto || '';
                document.getElementById('spanmonto_usd').textContent = response.data.monto_usd || '';
                document.getElementById('spantasa_cambio').textContent = response.data.tasa_cambio || '';
                document.getElementById('spanbanco_emisor').textContent = response.data.banco_emisor || '';
                document.getElementById('spanreferencia').textContent = response.data.referencia || '';
                document.getElementById('spanfecha_pago').textContent = response.data.fecha_pago || '';
                document.getElementById('spanstatus').textContent = response.data.status || '';
                document.getElementById('spansaldo').textContent = response.data.saldo || '';
                document.getElementById('spansaldo_bs').textContent = response.data.saldo_bs || '';
                document.getElementById('spantotal').textContent = response.data.total || '';
                document.getElementById('spanfecha').textContent = response.data.fecha || '';
                document.getElementById('cliente_payment_id').value = response.data.id || '';
                
                
                document.getElementById('spanfile').src = response.data.file;

                if (response.data.status === 'CONFIRMADO') {
                    document.getElementById('btnConfirmClientePayment').style.display = 'none';
                    document.getElementById('btnDeleteClientePayment').style.display = 'none';
                }
                
                if (response.data.status === 'PENDIENTE') {
                    document.getElementById('btnConfirmClientePayment').style.display = 'block';
                    document.getElementById('btnDeleteClientePayment').style.display = 'block';
                }

            }).catch(error => {
                if (error.response) {
                    /* console.log(error.response.data.errors) */
                }
            });
        }
    </script>
@endpush
