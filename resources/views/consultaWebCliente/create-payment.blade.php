@php
    $bancos = [
        [
            "codigo" => "0102",
            "nombre" => "Banco de Venezuela",
            "rif" => "G200099976"
        ],
        [
            "codigo" => "0104",
            "nombre" => "Venezolano de Crédito",
            "rif" => "J000029709"
        ],
        [
            "codigo" => "0105",
            "nombre" => "Mercantil Banco",
            "rif" => "J000029610"
        ],
        [
            "codigo" => "0108",
            "nombre" => "BBVA Provincial",
            "rif" => "J000029679"
        ],
        [
            "codigo" => "0114",
            "nombre" => "Bancaribe",
            "rif" => "J000029490"
        ],
        [
            "codigo" => "0115",
            "nombre" => "Banco Exterior",
            "rif" => "J000029504"
        ],
        [
            "codigo" => "0128",
            "nombre" => "Banco Caroní",
            "rif" => "J095048551"
        ],
        [
            "codigo" => "0134",
            "nombre" => "Banesco",
            "rif" => "J070133805"
        ],
        [
            "codigo" => "0137",
            "nombre" => "Banco Sofitasa",
            "rif" => "J090283846"
        ],
        [
            "codigo" => "0138",
            "nombre" => "Banco Plaza",
            "rif" => "J002970553"
        ],
        [
            "codigo" => "0146",
            "nombre" => "Bangente C.A",
            "rif" => "J301442040"
        ],
        [
            "codigo" => "0151",
            "nombre" => "BFC Banco Fondo Común",
            "rif" => "J000723060"
        ],
        [
            "codigo" => "0156",
            "nombre" => "100% Banco",
            "rif" => "J085007768"
        ],
        [
            "codigo" => "0157",
            "nombre" => "DelSur Banco",
            "rif" => "J000797234"
        ],
        [
            "codigo" => "0163",
            "nombre" => "Banco del Tesoro",
            "rif" => "G200051876"
        ],
        [
            "codigo" => "0166",
            "nombre" => "Banco Agrícola de Venezuela",
            "rif" => "G200057955"
        ],
        [
            "codigo" => "0168",
            "nombre" => "Bancrecer",
            "rif" => "J316374173"
        ],
        [
            "codigo" => "0169",
            "nombre" => "Mi Banco",
            "rif" => "J315941023"
        ],
        [
            "codigo" => "0171",
            "nombre" => "Banco Activo",
            "rif" => "J080066227"
        ],
        [
            "codigo" => "0172",
            "nombre" => "Bancamiga",
            "rif" => "J316287599"
        ],
        [
            "codigo" => "0173",
            "nombre" => "Banco Internacional de Desarrollo",
            "rif" => "J294640109"
        ],
        [
            "codigo" => "0174",
            "nombre" => "Banplus",
            "rif" => "J000423032"
        ],
        [
            "codigo" => "0175",
            "nombre" => "Banco Digital de Los Trabajadores",
            "rif" => "G200091487"
        ],
        [
            "codigo" => "0177",
            "nombre" => "Banco de la Fuerza Armada Nacional Bolivariana",
            "rif" => "G200106573"
        ],
        [
            "codigo" => "0178",
            "nombre" => "N58 Banco Digital",
            "rif" => "J503581107"
        ],
        [
            "codigo" => "0191",
            "nombre" => "Banco Nacional de Crédito",
            "rif" => "J309841327"
        ],
        [
            "codigo" => "0601",
            "nombre" => "Instituto Municipal de Crédito Popular",
            "rif" => "J000145903"
        ]
    ]
@endphp

@extends('landing.app.landing')
@section('title', content: 'Optirango | Consulta Cliente')

@section('content')
    <div class="tw-container tw-mx-auto tw-px-4 sm:tw-px-6 lg:tw-px-8 tw-my-20">
        <div class="tw-max-w-3xl tw-mx-auto">
            <div class="tw-bg-white tw-rounded-3xl tw-shadow-lg tw-border-2 tw-border-dashed tw-border-gray-300">
                <div class="tw-p-8">
                    <div class="tw-text-center tw-mb-12">
                        <img src="{{ asset('storage/img/logo.png') }}" class="tw-h-32 tw-object-contain tw-mx-auto"
                            alt="Logo Optirango">
                        <h1 class="tw-text-2xl tw-font-bold tw-text-gray-700 tw-mt-4">Registrar Pago de Laboratorio</h1>
                    </div>
                    @include('fragment.success')

                    <div class="tw-mb-8">
                        <div class="tw-flex tw-justify-between tw-items-center tw-mb-6">
                            <h1 class="tw-text-2xl tw-font-bold tw-text-gray-700">Datos del Cliente</h1>
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
                    <div class="tw-bg-blue-50 tw-border-l-4 tw-border-blue-400 tw-p-6 tw-rounded-lg tw-mb-8">
                        <div class="tw-text-center">
                            <p class="tw-text-gray-600 tw-font-semibold tw-mb-4">Si deseas registrar un <strong> ABONO</strong> completa la información del siguiente formulario</p>
                        <div class="tw-mt-6 tw-mb-6 tw-pt-6 tw-border-t tw-border-gray-200 tw-space-y-4">
                            <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 tw-gap-4">
                                <div class="tw-text-center tw-p-4 tw-bg-white tw-rounded-xl tw-shadow-sm">
                                    <p class="tw-text-gray-600">Tasa de Cambio</p>
                                    <p class="tw-text-xl tw-font-bold tw-text-blue-600">{{ $tasaCambio['price'] }} Bs. </p>
                                </div>
                                <div class="tw-text-center tw-p-4 tw-bg-white tw-rounded-xl tw-shadow-sm">
                                    <p class="tw-text-gray-600">Última Actualización</p>
                                    <p class="tw-text-xl tw-font-bold tw-text-blue-600">{{ $tasaCambio['last_update'] }}</p>
                                </div>
                            </div>
                            {{-- <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-1 tw-gap-4">
                                <div class="tw-text-center tw-p-4 tw-bg-white tw-rounded-xl tw-shadow-sm">
                                    <p class="tw-text-gray-600">Saldo Deudor Bs</p>
                                    <p class="tw-text-xl tw-font-bold tw-text-blue-600">{{ $item->saldo_bs }} Bs.</p>
                                </div>
                            </div> --}}
                        </div>
                        <form action="{{ route('consulta-web-cliente.payments.store', $cliente) }}" method="POST" enctype="multipart/form-data">
                            <div class="tw-bg-white tw-rounded-xl tw-shadow-sm tw-p-4 tw-mb-4">
                                <div class="md:tw-grid md:tw-grid-cols-2 tw-grid-cols-1 tw-gap-4">
                                    <div class="">
                                        <label class="tw-block tw-text-gray-600 tw-mb-1">Monto a Pagar en $</label>
                                        <input type="number" id="montoUsd" name="monto_usd" step="0.01" min="0"
                                            class="tw-w-full tw-p-4 tw-border tw-border-gray-300 tw-rounded-md"
                                            placeholder="0.00">
                                    </div>
                                    <div class="">
                                        <label class="tw-block tw-text-gray-600 tw-mb-1">Monto en Bs</label>
                                        <p id="montoCalculadoBs" class="tw-p-4 tw-font-semibold tw-text-blue-600">0.00 Bs.</p>
                                    </div>
                                </div>
                            </div>
                            <h1 class="tw-text-2xl tw-font-bold tw-text-gray-900 tw-mb-2 tw-text-center mt-4">Datos del Pago
                                Movil (Comercios)</h1>
                            <div class="tw-bg-white tw-rounded-xl tw-shadow-sm tw-p-6">
                                <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 tw-gap-6 tw-text-left tw-mt-4">
                                    <div class="tw-space-y-3">
                                        <p class="tw-text-gray-600">Banco: <span
                                                class="tw-font-semibold tw-text-gray-900">Banesco (0134) </span></p>
                                        <p class="tw-text-gray-600">C.I/RIF: <span
                                                class="tw-font-semibold tw-text-gray-900">J-505868454</span></p>
                                        <p class="tw-text-gray-600">Teléfono: <span
                                                class="tw-font-semibold tw-text-gray-900">04246406797</span></p>

                                        <button type="button"
                                            class="tw-w-block tw-mt-4 tw-p-4 tw-bg-blue-600 tw-text-white tw-rounded-md hover:tw-bg-blue-700 tw-transition-colors"
                                            onclick="copyToClipboard('0134 J-505868454 04246406797')">
                                            <i class="fa fa-copy tw-mr-2"></i>Copiar a portapapeles
                                        </button>
                                    </div>
                                    <figure class="tw-flex ">
                                        <img src="{{ asset('storage/img/qr_banesco.png') }}" alt="QR Banesco" class="tw-w-1/2">
                                    </figure>
                                </div>
                            </div>

                            @include('fragment.error')



                            <div class="tw-mt-2 tw-pt-2 tw-border-t tw-border-gray-200 tw-space-y-4">
                                @csrf
                                <input type="hidden" name="id" value="{{ $cliente->id }}">
                                <input type="hidden" name="total_saldo_adeudado" value="{{ $totalSaldoAdeudado }}">
                                <input type="hidden" name="saldo_bs" value="{{ $totalSaldoAdeudado * $tasaCambio['price'] }}">
                                <input type="hidden" name="total" value="{{ $totalSaldoAdeudado }}">
                                <input type="hidden" name="tasa_cambio" value="{{ $tasaCambio['price'] }}">
                                <input type="hidden" name="fecha" value="{{ $tasaCambio['last_update'] }}">

                                <div class="tw-grid tw-grid-cols-1 tw-gap-4">
                                    <div>
                                        <label for="banco_emisor" class="tw-block tw-text-gray-600">Banco Emisor</label>
                                        <select name="banco_emisor"
                                            class="tw-w-full tw-p-4 tw-border tw-border-gray-300 tw-rounded-md">
                                            <option value="">Seleccione un banco</option>
                                            @foreach($bancos as $banco)
                                                <option value="{{ $banco['codigo'] }} - {{ $banco['nombre'] }}">
                                                    {{ $banco['codigo'] }} - {{ $banco['nombre'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <label for="referencia" class="tw-block tw-text-gray-600">Número de Referencia</label>
                                        <input type="text" name="referencia"
                                            class="tw-w-full tw-p-4 tw-border tw-border-gray-300 tw-rounded-md"
                                            placeholder="Ingrese el número de referencia">
                                    </div>

                                    <div>
                                        <label for="monto" class="tw-block tw-text-gray-600">Monto Transferido (Bs)</label>
                                        <input type="text" id="monto" name="monto"
                                            class="tw-w-full tw-p-4 tw-border tw-border-gray-300 tw-rounded-md"
                                            placeholder="0.00">
                                    </div>

                                    <div>
                                        <label for="fecha_pago" class="tw-block tw-text-gray-600">Fecha de Pago</label>
                                        <input type="date" name="fecha_pago"
                                            class="tw-w-full tw-p-4 tw-border tw-border-gray-300 tw-rounded-md">
                                    </div>

                                    <div>
                                        <label for="file" class="tw-block tw-text-gray-600">Comprobante de Pago</label>
                                        <input type="file" name="file" accept="image/*,.pdf"
                                            class="tw-w-full tw-p-4 tw-border tw-border-gray-300 tw-rounded-md">
                                        <p class="tw-text-sm tw-text-gray-500">Formatos permitidos: imágenes y PDF</p>
                                    </div>
                                </div>

                                <button type="submit"
                                    class="tw-w-full tw-mt-4 tw-p-4 tw-bg-blue-600 tw-text-white tw-rounded-md hover:tw-bg-blue-700 tw-transition-colors">
                                    <i class="fa fa-upload tw-mr-2"></i> Registrar información
                                </button>
                            </div>
                        </form>
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
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script type="module">
        IMask(document.getElementById('monto'), {
            mask: Number,  // enable number mask

            // other options are optional with defaults below
            scale: 2,  // digits after point, 0 for integers
            thousandsSeparator: '',
            padFractionalZeros: true,
            radix: '.',
            mapToRadix: [''],
        })
    </script>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text);
        }

        function calcularMonto() {
            const montoUsd = document.getElementById('montoUsd').value || 0;
            const tasaCambio = {{ $tasaCambio['price'] }};
            const montoBs = (montoUsd * tasaCambio).toFixed(2);
            document.getElementById('montoCalculadoBs').textContent = montoBs.replace('.', ',') + ' Bs.';
            document.getElementById('monto').value = montoBs;
        }

        // Actualizar cálculo cuando se escribe
        document.getElementById('montoUsd').addEventListener('input', calcularMonto);
    </script>
@endpush