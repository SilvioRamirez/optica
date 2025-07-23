@extends('layouts.admin.app')

@section('title', 'Administración de Pagos')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-hand-holding-dollar"></i> Administración de Pagos Web</h1>
@stop

@section('content')

    <div class="container-fluid">
        @include('fragment.error')
        @include('fragment.tw-success')

    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-hand-holding-dollar"></i> Administración de Pagos Web
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
<div class="modal fade" id="viewPaymentModal" tabindex="-1" aria-labelledby="viewPaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="paymentModalLabel"><i class="fa fa-hand-holding-dollar"></i> Información de Pago registrado via web</h1>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-6">
                        <p><strong>Numero de Orden: </strong><span id="spannumero_orden"></span></p>
                        <p><strong>Monto: </strong><span id="spanmonto"></span></p>
                        <p><strong>Monto USD: </strong><span id="spanmonto_usd"></span></p>
                        <p><strong>Tasa de Cambio: </strong><span id="spantasa_cambio"></span></p>
                        <p><strong>Fecha: </strong><span id="spanfecha"></span></p>
                        <p><strong>Banco Emisor: </strong><span id="spanbanco_emisor"></span></p>
                        <p><strong>Referencia: </strong><span id="spanreferencia"></span></p>
                        <p><strong>Fecha de Pago: </strong><span id="spanfecha_pago"></span></p>
                        <p><strong>Paciente: </strong><span id="spanpaciente"></span></p>
                        <p><strong>Cedula: </strong><span id="spancedula"></span></p>
                        <p><strong>Telefono: </strong><span id="spantelefono"></span></p>
                        <p><strong>Saldo: </strong><span id="spansaldo"></span></p>
                        <p><strong>Saldo Bs: </strong><span id="spansaldo_bs"></span></p>
                        <p><strong>Total: </strong><span id="spantotal"></span></p>
                        <p><strong>Status: </strong><span id="spanstatus"></span></p>
                        <input type="hidden" id="payment_id">
                        
                    </div>
                    <div class="col-6">
                        <figure>
                            <img id="spanfile" class="img-fluid img-thumbnail img-responsive img-rounded" src="" alt="">
                        </figure>
                    </div>
                </div>
                
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnConfirmPayment" style="display: none;" onclick="confirmPayment()"><i class="fa fa-check mr-2"></i>Confirmado</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-close mr-2"></i>Cerrar</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        function openModalDelete(id) {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "Este pago se eliminara definitivamente y se recalculara el saldo pendiente de la orden.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, eliminar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    var urlDelete = 'api/pagoDelete/' + `${id}`;
                    axios.post(urlDelete).then(response => {
                        let status = response.status;
                        let message = response.data.message; // Obtenemos el mensaje de la respuesta
                        /* console.log(response.data); */

                        var tabla = $('#pagos-table').DataTable();
                        tabla.ajax.reload();

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
                                    "Ha ocurrido un error al eliminar el pago",
                                html: error.response.data.details,
                                icon: "error"
                            });
                        }
                    });
                }
            });
        }

        function confirmPayment() {
            var id = document.getElementById('payment_id').value;
            var url = '/payments/' + id + '/confirm';

            axios.post(url).then(response => {
                let status = response.status;
                let message = response.statusText;

                $('#payments-table').DataTable().ajax.reload(null, false);

                bootstrap.Modal.getOrCreateInstance(document.getElementById('viewPaymentModal')).hide();

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
                            "Ha ocurrido un error al confirmar el pago",
                        html: error.response.data.details,
                        icon: "error"
                    });
                }
            });   
        }

        function openModalViewPayment(id) {
            var url = '/payments/' + id + '/view';

            axios.post(url).then(response => {
                let status = response.status;
                let message = response.statusText;

                bootstrap.Modal.getOrCreateInstance(document.getElementById('viewPaymentModal')).show();
                
                document.getElementById('spannumero_orden').textContent = response.data.numero_orden || '';
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
                document.getElementById('spanpaciente').textContent = response.data.paciente || '';
                document.getElementById('spancedula').textContent = response.data.cedula || '';
                document.getElementById('spantelefono').textContent = response.data.telefono || '';
                document.getElementById('payment_id').value = response.data.id || '';
                
                
                document.getElementById('spanfile').src = response.data.file;

                if (response.data.status === 'CONFIRMADO') {
                    document.getElementById('btnConfirmPayment').style.display = 'none';
                }

                if (response.data.status === 'PENDIENTE') {
                    document.getElementById('btnConfirmPayment').style.display = 'block';
                }

            }).catch(error => {
                if (error.response) {
                    /* console.log(error.response.data.errors) */
                }
            });
        }
    </script>
@endpush
