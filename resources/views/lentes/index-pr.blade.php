@extends('layouts.app')

@section('content')

<div class="row">
    @include('fragment.error')
    @include('fragment.success')
    <div class="col-lg-12 margin-tb">
        <div class="text-center">
            <h1><i class="fa fa-check"></i> Administración de Lentes Por Revisar</h1>
        </div>
        @can('user-create')
            {{-- <div class="pull-right mt-2 mb-2">
                <a class="btn btn-success" href="{{ route('lentes.create') }}"><i class="fa fa-plus"></i> {{ __('Create New')}}</a>
            </div> --}}
        @endcan
    </div>
</div>

    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            Administración de Lentes
        </div>
        <div class="card-body">
                
        
            {{ $dataTable->table() }}
        
    </div>
        </div>
    </div>
</div>

<div class="modal fade" id="prLenteModal" tabindex="-1" aria-labelledby="prLenteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="prLenteModalLabel"><i class="fa fa-check"></i> Revisar Lente</h1>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">



                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <h2 class="text-center"><i class="fa fa-check"></i> Revisar Lente</h2>
                                <div class="col-md-12 row">
                                    {{-- <div class="col-xs-3 col-sm-3 col-md-3">
                                        <strong>Paciente:</strong><br>
                                        {{ $paciente->nombres }} {{ $paciente->apellidos }}
                                    </div> --}}
                                    <div class="col-xs-2 col-sm-2 col-md-2">
                                        
                                        {{ Form::textComp('numero_orden', 'Nro. Orden') }}
                                    </div>

                                </div>
                            <hr>
                            
                            <div class="col-md-12 row">
                                <div class="col-md-5 row">
                                        <h5><strong>OJO DERECHO</strong></h5>
                                            {{ form::hiddenComp('formula_id[]', /* $lente->formulas[0]->id */)}}
                                            {{ Form::hiddenComp('ojo[]', /* $lente->formulas[0]->ojo */)}}
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            {{ Form::textComp('esfera[]', 'Esf', /* $lente->formulas[0]->esfera */) }}
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            {{ Form::textComp('cilindro[]', 'Cil', /* $lente->formulas[0]->cilindro */) }}
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            {{ Form::textComp('eje[]', 'Eje', /* $lente->formulas[0]->eje */) }}
                                        </div>
                                    </div>
                                <div class="col-md-2 row">
                                <div class="text-center mt-4 pt-4 pb-4">
                                Copiar
                                <br>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-sm" data-arg1='left'><i class="fa fa-arrow-left"></i></button>
                                    <button type="button" class="btn btn-success btn-sm" data-arg1='right'><i class="fa fa-arrow-right"></i></button>
                                </div>
                                </div>
                                </div>
                                <div class="col-md-5 row">
                                        <h5><strong>OJO IZQUIERDO</strong></h5>
                                            {{ form::hiddenComp('formula_id[]', /* $lente->formulas[1]->id */)}}
                                            {{ Form::hiddenComp('ojo[]', /* $lente->formulas[1]->ojo */)}}
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            {{ Form::textComp('esfera[]', 'Esf', /* $lente->formulas[1]->esfera */) }}
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            {{ Form::textComp('cilindro[]', 'Cil', /* $lente->formulas[1]->cilindro */) }}
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            {{ Form::textComp('eje[]', 'Eje', /* $lente->formulas[1]->eje */) }}
                                        </div>
                                    </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    {{ Form::selectComp('tipo_lente','Tipo', '', ['' => '-- Seleccione --', 'MONOFOCAL' => 'MONOFOCAL', 'BIFOCAL' => 'BIFOCAL', 'MULTIFOCAL' => 'MULTIFOCAL']) }}
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    {{ Form::textComp('adicion', 'AD') }}
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    {{ Form::textComp('distancia_pupilar', 'DP') }}
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    {{ Form::textComp('alt', 'Alt') }}
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    {{ Form::textComp('tallado', 'Tallado') }}
                                </div>
                            </div>
                            
                            <hr>

                            <div class="row">
                            <h5><strong>SELECCION DEL MATERIAL</strong></h5>
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <strong>{{__('Tratamientos')}}:</strong>
                                        <br/>
                                        {{-- @foreach($tratamiento as $value)                            
                                            <label>{{ Form::checkbox('tratamiento[]', $value->id, in_array($value->id, $lenteTratamientos) ? true : false, array('class' => 'name')) }}
                                                {{ $value->tratamiento }}
                                            </label>
                                        <br/>
                                        @endforeach --}}
                                    </div>
                                </div>
                                
                                {{-- <div class="col-xs-3 col-sm-2 col-md-3">
                                    {{ Form::selectComp('tratamiento', 'Materiales o Tratamiento', '', $tratamiento) }}
                                </div> --}}
                                
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                {{ Form::hiddenComp('status', 'REGISTRADO')}}
                                    {{-- {{ Form::selectComp('status','Estatus', '', [
                                        /* '' => '-- Seleccione --', */
                                        'REGISTRADO' => 'REGISTRADO',
                                        /* 'LABORATORIO DE MONTAJE'  => 'LABORATORIO DE MONTAJE',
                                        'LABORATORIO DE TALLADO' => 'LABORATORIO DE TALLADO',
                                        'POR ENTREGAR' => 'POR ENTREGAR',
                                        'ENTREGADO' => 'ENTREGADO' */
                                        ]) 
                                    }} --}}
                                </div>
                            </div>

                            <div class="text-center">
                                    {{-- {{ Form::submitComp() }} --}}
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

<script type="module">

    $(document).ready(function () {

        //alert('hola');

        $('.btn-show').click(function(e) {
            e.preventDefault();
            alert('hola');
            /* var linkURL = $(this).attr("href");
            var name = $(this).attr("data-name"); */
            
        });

    });

</script>

{{-- La funcion de los botones se crea dentro de estas script tag debido a que en las tipo module no funcionan --}}
<script>

    const prLenteModal = document.getElementById('prLenteModal')

        prLenteModal.addEventListener('show.bs.modal', event => {


            //personasTable.on('click', 'tbody tr', function () {
                //let data = personasTable.row(this).data();
                //alert('Has Seleccionado a la persona con el ID: ' + data['id'] + "'Nombres y Apellidos: "+ data['nombres'] +' '+ data['apellidos']);
                //getElementById('organizacion_representante').value=data['nombres']+data['apellidos'];
                
                //document.getElementById('representante_organizacion').value=data['nombres'] +' '+ data['apellidos'];
                
                //bootstrap.Modal.getOrCreateInstance(document.getElementById('prLenteModal')).hide();

            //});

            prLenteModal.addEventListener('hidden.bs.modal', event => {
                /* personasTable.clear().draw(); */
                /* personasTable.destroy(); */
            });
    })

    function openModal(id){

        bootstrap.Modal.getOrCreateInstance(document.getElementById('prLenteModal')).show();

        const SITEURL = 'http://127.0.0.1:8000';

        var url = SITEURL + '/api/prLente/'+id;

        axios.post(url).then(response => {
            let status = response.status;
            let message = response.statusText;
            let data = response.data.personas;
            console.log(message, status, data);
            
            //alert(data[0].nombres);
            //alert(data.length);

            var el = document.getElementById('demo');
            //el.textContent = "I have changed!";

            for (var i=0, len = data.length; i < len; i++) { 
                //alert(i);
                //alert(data[i].apellidos);

                var id      = data[i].id;
                var cedula  = data[i].cedula;
                var nombres = data[i].nombres;
                var apellidos = data[i].apellidos;

                //el.textContent = nombres+' '+apellidos;
                rows += '<tr><td>'+id+'</td><td>'+cedula+'</td><td>'+nombres+'</td><td>'+apellidos+'</td><td>contenido de prueba</td></tr>';
                //rows += nombres+apellidos;
                //tr += '<select class="niceSelect form-control" name="product_id[]" id="productName' + count + '" style="display:none">' + '<option value="">Select Product</option>';

        }

        /* if (tableLength > 0) {
            $("#productTable tbody tr:last").after(rows);
        } else {
            $("#productTable tbody").append(rows);
        } */

            //$("#productTable tbody tr:last").after(rows);
            
            //el.textContent = rows;
                
            /* for (var i=0; i < data.length; i++) {

                var nombres = data[i].nombres;
                var apellidos = data[i].apellidos;
                alert(nombres+apellidos);

                listadoPersonas.textContent = `Persona: ${nombres}`
                
                
                var el = document.createElement('option');

                el.textContent = opt;
                el.value = opt;

                sel.appendChild(el);
            }  */
        }).catch(error => {                  
            if(error.response){
                console.log(error.response.data.errors)
            }
        });

    }

</script>

@endpush

