@extends('layouts.admin.app')

@section('title', 'Administración de Lentes')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-glasses"></i> Administración de Lentes</h1>
@stop

@section('content')

    <div class="container-fluid">
        @include('fragment.error')
        @include('fragment.success')
    </div>

    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-glasses"></i> Administración de Lentes
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

<script type="module">


</script>

@endpush

