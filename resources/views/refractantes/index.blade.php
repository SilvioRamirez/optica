@extends('layouts.app')

@section('content')
    <div class="row">
            <div class="col-lg-12 margin-tb">

                @include('fragment.error')
                @include('fragment.success')

                <div class="text-center">
                    <h1><i class="fa fa-people-group"></i> Refractados</h1>
                </div>
                @can('refracante-create')
                    <div class="mt-2 mb-2">
                        <a class="btn btn-success btn-sm" href="{{ route('refractantes.create') }}"><i class="fa fa-plus"></i> {{ __('Create New')}}</a>
                    </div>
                @endcan
            </div>
        @canany(['refractante-list'])
            <div class="card border-light mb-3 shadow">
                <div class="card-header bg-primary text-white">
                    Administración de Refractados
                </div>
                <div class="card-body table-responsive table-sm">
                    {{ $dataTable->table() }}
                </div>
            </div>
        @endcanany
    </div>

@endsection

@push('scripts')

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

@endpush