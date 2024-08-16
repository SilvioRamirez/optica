@extends('layouts.app')

@section('content')
    {{-- <div class="row">
    
        <div class="col-lg-12 margin-tb">
            @include('fragment.error')
            @include('fragment.success')
            <div class="text-center">
                <h1><i class="fa fa-dollar"></i> Gastos de Operativo</h1>
            </div>
            @can('tipo-lente-create')
                <div class="pull-right mt-2 mb-2">
                    <a class="btn btn-success" href="{{ route('tipoTratamientos.create') }}"><i class="fa fa-plus"></i> {{ __('Create New')}}</a>
                </div>
            @endcan
        </div>
    
        <div class="card border-light mb-3 shadow">
            <div class="card-header bg-primary text-white">
                Administración de Gastos de Operativo
            </div>
            <div class="card-body table-responsive">
                
            </div>
        </div>
    </div> --}}

    <div class="container">
        <h1 class="text-center pt-4"><strong class="text-danger">Search</strong> con relaciones</h1>
        <hr>
        <div class="row py-2">
        
            <div class="col-md-6">
                <h2><a href="" class="btn btn-secondary">Agregar Nuevo</a></h2>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <form method="get" action="/search">
                        <div class="input-group">
                            <div class="form-control">
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" name="title" value="title" {{ request()->input('title') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inlineCheckbox1"></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" name="description" value="description"{{ request()->input('description') ? 'checked' : '' }}>
                                    <label for="inlineCheckbox2" class="form-check-label"></label>
                                </div>
                            </div>

                        <input type="text" class="form-control" name="search" placeholder="search" value="{{ request()->input('search') ? request()->input('search') : '' }}">
                        <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Operativo</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($operativo->gastos as $gasto)
                    <tr>
                        <td scope="row">{{ $gasto->id }}</td>
                        <td>{{ $gasto->operativo->nombre_operativo }}</td>
                        <td>{{ $gasto->monto }}</td>
                        <td>
                            <a href="" class="btn btn-danger">Delete</a>
                            <a href="" class="btn btn-danger">Edit</a>
                        </td>
                    </tr>
                @empty
                    <td class="text-center" colspan="6">
                        No data found!
                    </td>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection

@push('scripts')

    

@endpush