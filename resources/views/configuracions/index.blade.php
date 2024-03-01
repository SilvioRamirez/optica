@extends('layouts.app')

@section('content')
    <div class="row">
    
        @include('fragment.error')
        @include('fragment.success')
        
            <div class="col-lg-12 margin-tb">
                <div class="text-center">
                    <h1><i class="fa fa-cog"></i> Configuración</h1>
                </div>
            </div>
    
        <div class="card border-light mb-3 shadow">
            <div class="card-header bg-primary text-white">
                Administración de Configuración
            </div>
                <div class="card-body table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>


<p class="text-center text-primary"><small></small></p>
@endsection

@push('scripts')

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

@endpush