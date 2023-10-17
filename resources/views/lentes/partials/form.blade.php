{!! Form::open(array('route' => 'pacientes.lente.store','method'=>'POST')) !!}

    <label for="paciente-dropdown mb-2"><strong>Paciente</strong></label>
            <div class="form-group mb-2">
                <select  id="paciente-dropdown" name="paciente_id" class="form-control">
                    <option value="">-- Seleccionar Paciente --</option>
                        @foreach ($pacientes as $paciente)
                            <option value="{{$paciente->id}}">
                                {{$paciente->nombres.' '.$paciente->apellidos}}
                            </option>
                        @endforeach
                </select>
            </div>

    @include('pacientes.partials.lentes')
{!! Form::close() !!}