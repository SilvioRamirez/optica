@extends('layouts.admin.app')

@section('title', 'Administración de Tratamientos')

@section('content')
    <div class="container-fluid">

        @include('fragment.error')
        @include('fragment.success')
    </div>

            <div class="col-lg-12 margin-tb">
                <div class="text-center">
                    <h1><i class="fa fa-eye-dropper"></i> Tratamientos</h1>
                </div>
                @can('product-create')
                    <div class="pull-right mt-2 mb-2">
                        <a class="btn btn-success" href="{{ route('tratamientos.create') }}"><i class="fa fa-plus"></i> {{ __('Create New')}}</a>
                    </div>
                @endcan
            </div>
    
        <div class="card border-light mb-3 shadow">
            <div class="card-header bg-primary text-white">
                Administración de Tratamientos
            </div>
            <div class="card-body table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

@endsection

@push('scripts')

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

@endpush