@extends('layouts.app')

@section('content')

<div class="row">
    @include('fragment.error')
    @include('fragment.success')
    <div class="col-lg-12 margin-tb">
        <div class="text-center">
            <h1><i class="fa fa-hand-holding-dollar"></i> Administración de Pagos</h1>
        </div>
        {{-- @can('user-create')
            <div class="pull-right mt-2 mb-2">
                <a class="btn btn-success" href="{{ route('pagos.create') }}"><i class="fa fa-plus"></i> {{ __('Create New')}}</a>
            </div>
        @endcan --}}
    </div>
</div>

    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            Administración de Pagos
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

function openModalDelete(id){
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
            var urlDelete = 'api/pagoDelete/'+`${id}`;
            axios.post(urlDelete).then(response => {
                let status = response.status;
                let message = response.data.message; // Obtenemos el mensaje de la respuesta
                console.log(response.data);

                var tabla = $('#pagos-table').DataTable();
                tabla.ajax.reload();

                Swal.fire({
                    title: "¡Eliminado!",
                    text: message, // Usamos el mensaje de la respuesta
                    icon: "success"
                });
            }).catch(error => {                  
                if(error.response){
                    console.log(error.response.data.errors);
                    Swal.fire({
                        title: "Error",
                        text: error.response.data.message || "Ha ocurrido un error al eliminar el pago",
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

