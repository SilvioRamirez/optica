<x-showText>
    <x-slot:label>Estado: </x-slot>
    <x-slot:value>{{ $paciente->direccion->estado->estado }} </x-slot>
</x-showText>
<x-showText>
    <x-slot:label>Municipio: </x-slot>
    <x-slot:value>{{ $paciente->direccion->municipio_id }}</x-slot>
</x-showText>
    <x-showText>
    <x-slot:label>Parroquia: </x-slot>
    <x-slot:value>{{ $paciente->direccion->parroquia_id }}</x-slot>
</x-showText>
<x-showText>
    <x-slot:label>Sector: </x-slot>
    <x-slot:value>{{ $paciente->direccion->sector }}</x-slot>
</x-showText>
<x-showText>
    <x-slot:label>Dirección: </x-slot>
    <x-slot:value>{{ $paciente->direccion->direccion }}</x-slot>
</x-showText>
<x-showText>
    <x-slot:label>Lugar de Registro (Jornada): </x-slot>
    <x-slot:value>{{ $paciente->direccion->lugar_registro }}</x-slot>
</x-showText>

<hr>

<div class="text-muted text-end">
    <a class="btn btn-info" href="{{ route('pacientes.edit',$paciente->id) }}"><i class="fa fa-pencil"></i> Editar</a>
</div>