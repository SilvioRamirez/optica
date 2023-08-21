@extends('layouts.app')

@section('content')
    <div class="container">
    
        @include('fragment.error')
        @include('fragment.success')
        
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="text-center">
                    <h1><i class="fa fa-microscope"></i> Muestras</h1>
                </div>
                @can('product-create')
                    <div class="pull-right mt-2 mb-2">
                        <a class="btn btn-success btn-lg" href="{{ route('muestras.create') }}"><i class="fa fa-plus"></i> {{ __('Create New')}}</a>
                    </div>
                @endcan
            </div>
        </div>
    
        <div class="card border-light mb-3 shadow">
            <div class="card-header bg-primary text-white">
                Administración de Muestras
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>


<p class="text-center text-primary"><small></small></p>
@endsection

@push('scripts')

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

@endpush