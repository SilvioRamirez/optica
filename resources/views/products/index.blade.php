@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Productos</h1>
            </div>
            @can('product-create')
                <div class="pull-right mb-2">
                    <a class="btn btn-success btn-lg" href="{{ route('products.create') }}"><i class="fa fa-plus"></i> Crear Nuevo Producto</a>
                </div>
            @endcan
        </div>
    </div>

    @include('fragment.error')
    @include('fragment.success')

    <table class="table table-bordered">
        <thead>    
            <tr>
                <th>N</th>
                <th>{{__('Name')}}</th>
                <th>{{__('Details')}}</th>
                <th width="280px">{{__('Action')}}</th>
            </tr>
        </thead>
     @foreach ($products as $product)
     <tr>
         <td>{{ ++$i }}</td>
         <td>{{ $product->name }}</td>
         <td>{{ $product->detail }}</td>
         <td>
            <div class="btn-group" role="group" aria-label="Opciones">
                @can('product-list')
                    <a class="btn btn-info btn-sm" href="{{ route('products.show',$product->id) }}"><i class="fa fa-eye"></i> {{ __('')}}</a>
                @endcan
                @can('product-edit')
                    <a class="btn btn-primary btn-sm" href="{{ route('products.edit',$product->id) }}"><i class="fa fa-pen-to-square"></i> {{ __('')}}</a>
                @endcan
                @can('product-delete')
                    <a class="btn btn-danger btn-sm" href="{{ route('products.delete',$product->id) }}"><i class="fa fa-trash"></i> {{ __('')}}</a>
                @endcan
            </div>
         </td>
     </tr>
     @endforeach
    </table>
    {!! $products->links() !!}
<p class="text-center text-primary"><small>By silvio.ramirez.m@gmail.com</small></p>
@endsection