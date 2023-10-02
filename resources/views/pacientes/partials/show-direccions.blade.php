<x-showText>
    <x-slot:label>Estado: </x-slot>
    <x-slot:value>{{ !empty($paciente->direccion->estado->estado) ? $paciente->direccion->estado->estado : 'N/A' }} </x-slot>
</x-showText>

<x-showText>
    <x-slot:label>Municipio: </x-slot>
    <x-slot:value>{{ !empty($paciente->direccion->municipio->municipio) ? $paciente->direccion->municipio->municipio : 'N/A' }}</x-slot>
</x-showText>
    <x-showText>
    <x-slot:label>Parroquia: </x-slot>
    <x-slot:value>{{ !empty($paciente->direccion->parroquia->parroquia) ? $paciente->direccion->parroquia->parroquia : 'N/A' }}</x-slot>
</x-showText>
<x-showText>
    <x-slot:label>Sector: </x-slot>
    <x-slot:value>{{ !empty($paciente->direccion->sector) ? $paciente->direccion->sector : 'N/A' }}</x-slot>
</x-showText>
<x-showText>
    <x-slot:label>Dirección: </x-slot>
    <x-slot:value>{{ !empty($paciente->direccion->direccion) ? $paciente->direccion->direccion : 'N/A' }}</x-slot>
</x-showText>
<x-showText>
    <x-slot:label>Lugar de Registro (Jornada): </x-slot>
    <x-slot:value>{{ !empty($paciente->direccion->lugar_registro) ? $paciente->direccion->lugar_registro : 'N/A' }}</x-slot>
</x-showText>

<hr>

<div class="text-muted text-end">
    <a class="btn btn-info" href="{{ route('pacientes.direccion.create', $paciente->id) }}"><i class="fa fa-pencil"></i> Editar</a>
</div>