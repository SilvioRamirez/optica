@extends('landing.app.landing')
@section('title', content: 'Optirango | Consulta Cliente')

@section('content')
    <div class="tw-container tw-mx-auto tw-px-4 sm:tw-px-6 lg:tw-px-8 tw-my-20">
        <div class="tw-max-w-6xl tw-mx-auto">
            <div class="tw-bg-white tw-rounded-3xl tw-shadow-lg tw-border-2 tw-border-dashed tw-border-gray-300">
                <div class="tw-p-8">
                    <div class="tw-text-center tw-mb-12">
                        <img src="{{ asset('storage/img/logo.png') }}" class="tw-h-32 tw-object-contain tw-mx-auto"
                            alt="Logo Optirango">
                        <h1 class="tw-text-2xl tw-font-bold tw-text-gray-700 tw-mt-4">Consulta Cliente Laboratorio</h1>
                    </div>
                    @include('fragment.success')

                    <div class="tw-mb-8">
                        <div class="tw-flex tw-justify-between tw-items-center tw-mb-6">
                            <h1 class="tw-text-2xl tw-font-bold tw-text-gray-700">Cliente Encontrado</h1>
                            <a href="{{ route('consulta-web-cliente.payments.create', $cliente) }}"
                                class="tw-inline-flex tw-no-underline tw-items-center tw-px-4 tw-py-2 tw-bg-blue-600 tw-text-white hover:tw-text-white tw-text-lg tw-font-semibold tw-rounded-xl hover:tw-bg-blue-800 tw-transition-colors tw-duration-200">
                                <i class="fa fa-plus tw-mr-2"></i>Registrar Pago
                            </a>
                        </div>
                        <div class="tw-bg-gray-50 tw-rounded-lg tw-p-4 tw-mb-6">
                            <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 tw-gap-4">
                                <div>
                                    <p class="tw-text-sm tw-text-gray-500">Nombre</p>
                                    <p class="tw-text-lg tw-font-semibold tw-text-gray-800">{{ $cliente->name }}</p>
                                </div>
                                <div>
                                    <p class="tw-text-sm tw-text-gray-500">Documento</p>
                                    <p class="tw-text-lg tw-font-semibold tw-text-gray-800">
                                        {{ $cliente->identity->name }}-{{ $cliente->document_number }}
                                    </p>
                                </div>
                                <div>
                                    <p class="tw-text-sm tw-text-gray-500">Total de Órdenes</p>
                                    <p class="tw-text-lg tw-font-semibold tw-text-blue-600">{{ $cliente->ordens->count() }}
                                    </p>
                                </div>
                                <div>
                                    <p class="tw-text-sm tw-text-gray-500">Saldo Total Adeudado</p>
                                    <p class="tw-text-lg tw-font-semibold tw-text-red-600">
                                        ${{ number_format($totalSaldoAdeudado, 2) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($cliente->ordens->count() > 0)
                        <div class="tw-mb-6">
                            <h2 class="tw-text-xl tw-font-bold tw-text-gray-700 tw-mb-4">Órdenes del Cliente</h2>
                            <div class="tw-overflow-x-auto tw-shadow-lg tw-rounded-lg">
                                <table class="tw-min-w-full tw-bg-white tw-border tw-border-gray-200">
                                    <thead class="tw-bg-gray-50">
                                        <tr>
                                            <th
                                                class="tw-px-4 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">
                                                Nº Orden
                                            </th>
                                            <th
                                                class="tw-px-4 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">
                                                Paciente
                                            </th>
                                            <th
                                                class="tw-px-4 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">
                                                Tipo Lente
                                            </th>
                                            <th
                                                class="tw-px-4 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">
                                                Tratamiento
                                            </th>
                                            <th
                                                class="tw-px-4 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">
                                                Estado
                                            </th>
                                            <th
                                                class="tw-px-4 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">
                                                Días Pasados
                                            </th>
                                            <th
                                                class="tw-px-4 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">
                                                Fecha Entrega
                                            </th>
                                            <th
                                                class="tw-px-4 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">
                                                Total
                                            </th>
                                            <th
                                                class="tw-px-4 tw-py-3 tw-text-left tw-text-xs tw-font-medium tw-text-gray-500 tw-uppercase tw-tracking-wider">
                                                Saldo
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="tw-bg-white tw-divide-y tw-divide-gray-200">
                                        @foreach($cliente->ordens as $orden)
                                            <tr class="tw-hover:tw-bg-gray-50">
                                                <td
                                                    class="tw-px-4 tw-py-4 tw-whitespace-nowrap tw-text-sm tw-font-medium tw-text-gray-900">
                                                    {{ $orden->numero_orden }}
                                                </td>
                                                <td class="tw-px-4 tw-py-4 tw-whitespace-nowrap tw-text-sm tw-text-gray-700">
                                                    {{ $orden->paciente }}
                                                </td>
                                                <td class="tw-px-4 tw-py-4 tw-whitespace-nowrap tw-text-sm tw-text-gray-700">
                                                    {{ $orden->tipoLente ? $orden->tipoLente->tipo_lente : 'N/A' }}
                                                </td>
                                                <td class="tw-px-4 tw-py-4 tw-whitespace-nowrap tw-text-sm tw-text-gray-700">
                                                    {{ $orden->tipoTratamiento ? $orden->tipoTratamiento->tipo_tratamiento : 'N/A' }}
                                                </td>
                                                <td class="tw-px-4 tw-py-4 tw-whitespace-nowrap">
                                                    <span
                                                        class="tw-inline-flex tw-px-2 tw-py-1 tw-text-xs tw-font-semibold tw-rounded-full 
                                                                                @if($orden->ordenStatus)
                                                                                    @switch($orden->ordenStatus->name)
                                                                                        @case('RECIBIDO')
                                                                                            tw-bg-blue-100 tw-text-blue-800
                                                                                            @break
                                                                                        @case('EN PROCESO')
                                                                                            tw-bg-yellow-100 tw-text-yellow-800
                                                                                            @break
                                                                                        @case('ENTREGADO')
                                                                                            tw-bg-green-100 tw-text-green-800
                                                                                            @break
                                                                                        @case('LISTOS, POR ENTREGAR')
                                                                                            tw-bg-purple-100 tw-text-purple-800
                                                                                            @break
                                                                                        @default
                                                                                            tw-bg-gray-100 tw-text-gray-800
                                                                                    @endswitch
                                                                                @else
                                                                                    tw-bg-gray-100 tw-text-gray-800
                                                                                @endif">
                                                        {{ $orden->ordenStatus ? $orden->ordenStatus->name : 'Sin Estado' }}
                                                    </span>
                                                </td>
                                                <td class="tw-px-4 tw-py-4 tw-whitespace-nowrap tw-text-sm tw-text-gray-700 tw-text-center">
                                                    {{ $orden->diasPasados() }}
                                                </td>
                                                <td class="tw-px-4 tw-py-4 tw-whitespace-nowrap tw-text-sm tw-text-gray-700">
                                                    {{ $orden->fecha_entrega ? \Carbon\Carbon::parse($orden->fecha_entrega)->format('d/m/Y') : 'No asignada' }}
                                                </td>
                                                <td
                                                    class="tw-px-4 tw-py-4 tw-whitespace-nowrap tw-text-sm tw-font-medium tw-text-gray-900">
                                                    ${{ number_format($orden->precio_total, 2) }}
                                                </td>
                                                <td
                                                    class="tw-px-4 tw-py-4 tw-whitespace-nowrap tw-text-sm tw-font-medium 
                                                                            {{ $orden->precio_saldo > 0 ? 'tw-text-red-600' : 'tw-text-green-600' }}">
                                                    ${{ number_format($orden->precio_saldo, 2) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="tw-bg-gray-100">
                                        <tr>
                                            <td colspan="8"
                                                class="tw-px-4 tw-py-4 tw-text-right tw-text-sm tw-font-bold tw-text-gray-900">
                                                Total Saldo Adeudado:
                                            </td>
                                            <td
                                                class="tw-px-4 tw-py-4 tw-whitespace-nowrap tw-text-sm tw-font-bold tw-text-red-600">
                                                ${{ number_format($totalSaldoAdeudado, 2) }}
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    @else
                        <div class="tw-text-center tw-py-8">
                            <div class="tw-bg-yellow-50 tw-border tw-border-yellow-200 tw-rounded-lg tw-p-4">
                                <p class="tw-text-yellow-800 tw-font-medium">Este cliente no tiene órdenes registradas.</p>
                            </div>
                        </div>
                    @endif

                    <div class="tw-mt-8 tw-text-center">
                        <a href="{{ route('consulta-web-cliente.index') }}"
                            class="tw-inline-flex tw-no-underline tw-items-center tw-px-6 tw-py-3 tw-bg-gray-600 tw-text-white hover:tw-text-white tw-text-lg tw-font-semibold tw-rounded-xl hover:tw-bg-gray-800 tw-transition-colors tw-duration-200">
                            <i class="fa fa-arrow-left tw-mr-2"></i>Nueva Consulta
                        </a>
                        <a href="{{ route('consulta-web-cliente.payments.create', $cliente) }}"
                            class="tw-inline-flex tw-no-underline tw-items-center tw-px-6 tw-py-3 tw-bg-blue-600 tw-text-white hover:tw-text-white tw-text-lg tw-font-semibold tw-rounded-xl hover:tw-bg-blue-800 tw-transition-colors tw-duration-200">
                            <i class="fa fa-plus tw-mr-2"></i>Registrar Pago
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script type="module">

    </script>
@endpush