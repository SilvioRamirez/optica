<x-showText>
    <x-slot:label>Nombres y Apellidos: </x-slot>
    <x-slot:value>{{ $paciente->nombres }} {{ $paciente->apellidos }} </x-slot>
</x-showText>
<x-showText>
    <x-slot:label>Cedula: </x-slot>
    <x-slot:value>{{ $paciente->cedula }}</x-slot>
</x-showText>
    <x-showText>
    <x-slot:label>Fecha de Nacimiento: </x-slot>
    <x-slot:value>{{ $paciente->fecha_nacimiento }}</x-slot>
</x-showText>
<x-showText>
    <x-slot:label>Edad: </x-slot>
    <x-slot:value>{{ $paciente->edad }}</x-slot>
</x-showText>
<x-showText>
    <x-slot:label>Sexo: </x-slot>
    <x-slot:value>{{ $paciente->sexo }}</x-slot>
</x-showText>
<x-showText>
    <x-slot:label>Teléfono: </x-slot>
    <x-slot:value>{{ $paciente->telefono }}</x-slot>
</x-showText>
<x-showText>
    <x-slot:label>Correo: </x-slot>
    <x-slot:value>{{ $paciente->correo }}</x-slot>
</x-showText>
<x-showText>
    <x-slot:label>Observación: </x-slot>
    <x-slot:value>{{ $paciente->observacion }}</x-slot>
</x-showText>
<x-showText>
    <x-slot:label>Estatus: </x-slot>
    <x-slot:value>{{ $paciente->status }}</x-slot>
</x-showText>

<hr>

<div class="text-muted text-end">
    <a class="btn btn-info" href="{{ route('pacientes.edit',$paciente->id) }}"><i class="fa fa-pencil"></i> Editar</a>
</div>