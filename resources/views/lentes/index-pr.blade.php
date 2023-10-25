@extends('layouts.app')

@section('content')

<div class="row">
    @include('fragment.error')
    @include('fragment.success')
    <div class="col-lg-12 margin-tb">
        <div class="text-center">
            <h1><i class="fa fa-glasses"></i> Administración de Lentes</h1>
        </div>
        @can('user-create')
            {{-- <div class="pull-right mt-2 mb-2">
                <a class="btn btn-success" href="{{ route('lentes.create') }}"><i class="fa fa-plus"></i> {{ __('Create New')}}</a>
            </div> --}}
        @endcan
    </div>
</div>

    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            Administración de Lentes
        </div>
        <div class="card-body">
                <table class="table table-striped table-hover" id="prLentesTable">
                    <thead class="bg-primary text-center text-white">
                        <th>id</th>
                        <th>paciente</th>
                        <th>formula</th>
                        <th>numero_orden</th>
                        <th>status</th>
                        <th>adicion</th>
                        <th>distancia_pupilar</th>
                        <th>alt</th>
                        <th>tipo_lente</th>
                        <th>tratamiento</th>
                        <th>tallado</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script type="module">

// DataTables initialisation
            let prLentesTable = new DataTable('#prLentesTable', {
                processing: true,
                serverSide: true,
                retrieve: true,
                ajax: "/api/prLentesTable",
                columns: [
                    { data: 'id' },
                    { data: 'paciente' },
                    { data: 'formula' },
                    { data: 'numero_orden' },
                    { data: 'status' },
                    { data: 'adicion' },
                    { data: 'distancia_pupilar' },
                    { data: 'alt' },
                    { data: 'tipo_lente' },
                    { data: 'tratamiento' },
                    { data: 'tallado' },
                    { data: 'created_at' },
                    { data: 'updated_at' },
                    ]
            });


</script>

@endpush

