<h1>Lentes: </h1>

    <div class="card border-light shadow">
        <table class="table table-striped table-hover">
            <thead class="bg-primary text-center text-white">
                <th>N°</th>
                <th>ID Pago</th>
                <th>ID Formula</th>
                <th>Adición</th>
                <th>Distancia Pupilar</th>
                <th>ALT</th>
                <th>Tipo Lente</th>
                <th>Tratamiento</th>
                <th>Terminado</th>
                <th>Tallado</th>
                <th>Estatus</th>
                <th>Opciones</th>
            </thead>
            <tbody>
                @foreach($paciente->lentes as $item)
                    <tr>
                        <td class="text-center">{{ $item->id }}</td>
                        <td class="text-center">{{ $item->pago_id }} </td>
                        <td class="text-center">{{ $item->formula_id }} </td>
                        <td class="text-center">{{ $item->adicion }}</td>
                        <td class="text-center">{{ $item->distancia_pupilar }}</td>
                        <td class="text-center">{{ $item->alt }}</td>
                        <td class="text-center">{{ $item->tipo_lente }}</td>
                        <td class="text-center">{{ $item->tratamiento }}</td>
                        <td class="text-center">{{ $item->terminado }}</td>
                        <td class="text-center">{{ $item->tallado }}</td>
                        <td class="text-center">{{ $item->estatus }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Opciones">
                                <a class="btn btn-danger btn-sm" title="Eliminar Resultados" href="{{ route('pacientes.resultados.destroy', $item->id) }}"><i class="fa fa-trash"></i></a>
                                <a class="btn btn-success btn-sm" title="Agregar Resultados" href="{{ route('pacientes.resultados.detalles.index', $item->id) }}"><i class="fa fa-notes-medical"></i></a>
                                <a class="btn btn-info btn-sm" title="Imprimir Resultados" href="{{ route('pacientes.resultados.detalles.print', $item->id) }}"><i class="fa fa-print"></i></a>
                                <a class="btn btn-dark btn-sm" title="Agregar a cola de impresión" href="{{ route('pacientes.resultados.detalles.cola', $item->id) }}"><i class="fa fa-list-check"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

<hr>

<div class="text-muted text-end">
    <a class="btn btn-info" href="{{ route('pacientes.direccion.create', $paciente->id) }}"><i class="fa fa-plus"></i> Agregar</a>
</div>