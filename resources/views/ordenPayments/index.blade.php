@extends('layouts.admin.app')

@section('title', 'Administración de Pagos de Ordenes')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-hand-holding-dollar"></i> Administración de Pagos de Ordenes</h1>
@stop

@section('content')

    <div class="container-fluid">
        @include('fragment.error')
        @include('fragment.success')

    </div>

    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-hand-holding-dollar"></i> Administración de Pagos de Ordenes
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
                    var urlDelete = 'api/orden-payment-delete/' + `${id}`;
                    axios.post(urlDelete).then(response => {
                        let status = response.status;
                        let message = response.data.message; // Obtenemos el mensaje de la respuesta
                        /* console.log(response.data); */

                        var tabla = $('#orden-payments-table').DataTable();
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
                                    "Ha ocurrido un error al eliminar el pago de la orden",
                                html: error.response.data.details,
                                icon: "error"
                            });
                        }
                    });
                }
            });
        }
    </script>
@endpush
