@extends('layouts.app')

@section('content')

    @foreach ($caracteristicas as $item)
        <h3>Examen:</h3>
        <p>{{ $item->examen->nombre }}</p>
        <h3>Caracteristicas:</h3>
        <table class="table table-bordered">
            <thead class="">
                <th>Caracteristica</th>
                <th>Referencia Inferior</th>
                <th>Referencia Superior</th>
                <th>Unidad de Medida</th>
            </thead>
            <tbody>

                <td>{{ $item->caracteristica }}</td>
                <td>{{ $item->ref_inferior }}</td>
                <td>{{ $item->ref_superior }}</td>
                <td>{{ $item->unidad }}</td>
            </tbody>
            
        </table>
    @endforeach

@endsection
