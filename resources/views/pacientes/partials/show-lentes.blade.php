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
    <a class="btn btn-info" href="{{ route('pacientes.lente.create', $paciente->id) }}"><i class="fa fa-plus"></i> Agregar</a>
</div>

{{-- <div class="container">
  <section class="mx-auto my-5" style="max-width: 23rem;">
      
    <div class="card">
      <div class="card-body">
        <h5 class="card-title font-weight-bold">Warsaw</h5>
        <p class="card-text">Mon, 12:30 PM, Mostly Sunny</p>
        <div class="d-flex justify-content-between">
          <p class="display-1 degree">23</p>
          <i class="fas fa-sun-o fa-5x pt-3 text-warning"></i>
        </div>
        <div class="d-flex justify-content-between mb-4">
          <p><i class="fas fa-tint fa-lg text-info pe-2"></i>3% Precipitation</p>
          <p><i class="fas fa-leaf fa-lg text-muted pe-2"></i>21 km/h Winds</p>
        </div>
        <div class="progress">
          <div class="progress-bar bg-black" role="progressbar" style="width: 40%;" aria-valuenow="40"
            aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <ul class="list-unstyled d-flex justify-content-between font-small text-muted my-4">
          <li class="ps-4">8AM</li>
          <li>11AM</li>
          <li>2PM</li>
          <li>5PM</li>
          <li class="pe-4">8PM</li>
        </ul>
        <div class="collapse" id="collapseContent1">
          <table class="table table-borderless table-sm mb-0">
            <tbody>
              <tr>
                <td class="font-weight-normal align-middle">Tuesday</td>
                <td class="float-end font-weight-normal">
                  <p class="mb-1">24&deg;<span class="text-muted">/12&deg;</span></p>
                </td>
                <td class="float-end me-3">
                  <i class="fas fa-sun fa-lg text-warning"></i>
                </td>
              </tr>
              <tr>
                <td class="font-weight-normal align-middle">Wednesday</td>
                <td class="float-end font-weight-normal">
                  <p class="mb-1">19&deg;<span class="text-muted">/10&deg;</span></p>
                </td>
                <td class="float-end me-3">
                  <i class="fas fa-cloud-sun-rain fa-lg text-info"></i>
                </td>
              </tr>
              <tr>
                <td class="font-weight-normal align-middle">Thursday</td>
                <td class="float-end font-weight-normal">
                  <p class="mb-1">23&deg;<span class="text-muted">/15&deg;</span></p>
                </td>
                <td class="float-end me-3">
                  <i class="fas fa-sun fa-lg text-warning"></i>
                </td>
              </tr>
              <tr>
                <td class="font-weight-normal align-middle">Friday</td>
                <td class="float-end font-weight-normal">
                  <p class="mb-1">26&deg;<span class="text-muted">/19&deg;</span></p>
                </td>
                <td class="float-end me-3">
                  <i class="fas fa-sun fa-lg text-warning"></i>
                </td>
              </tr>
              <tr>
                <td class="font-weight-normal align-middle">Saturday</td>
                <td class="float-end font-weight-normal">
                  <p class="mb-1">20&deg;<span class="text-muted">/16&deg;</span></p>
                </td>
                <td class="float-end me-3">
                  <i class="fas fa-cloud fa-lg text-info"></i>
                </td>
              </tr>
              <tr>
                <td class="font-weight-normal align-middle">Sunday</td>
                <td class="float-end font-weight-normal">
                  <p class="mb-1">22&deg;<span class="text-muted">/13&deg;</span></p>
                </td>
                <td class="float-end me-3">
                  <i class="fas fa-cloud-sun fa-lg text-info"></i>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <hr />
        <a class="btn btn-link link-info p-md-1 my-1" data-mdb-toggle="collapse" href="#collapseContent1"
          role="button" aria-expanded="false" aria-controls="collapseContent1">Expand</a>
      </div>
    </div>
    
  </section>
</div> --}}

<style>
body {
  background-color: #f5f7fa;
}

.degree:after {
  content: '°C';
  position: absolute;
  font-size: 3rem;
  margin-top: 0.4rem;
  font-weight: 400;
}
</style>