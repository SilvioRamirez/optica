@extends('layouts.admin.app')

@section('title', 'Administración de Origenes de Registro')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-street-view"></i> Administración de Origenes de Registro</h1>
@stop

@section('content')
    <div class="container-fluid">

        @include('fragment.error')
        @include('fragment.success')

    </div>

    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            @can('origen-create')
                <div class="float-start">
                    <a href="{{ route('origens.create') }}" class="btn btn-light btn-sm"><i class="fa fa-plus"></i>
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

@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        function openModalDeleteOrigen(id) {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "Este origen se eliminara definitivamente.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, eliminar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    var urlDelete = 'api/origenDelete/' + `${id}`;
                    axios.post(urlDelete).then(response => {
                        let status = response.status;
                        let message = response.data.message; // Obtenemos el mensaje de la respuesta
                        /* console.log(response.data); */

                        var tabla = $('#origens-table').DataTable();
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
                                    "Ha ocurrido un error al eliminar el origen",
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
