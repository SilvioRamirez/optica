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

@section('content')
    <div class="tw-container tw-mx-auto tw-px-4 sm:tw-px-6 lg:tw-px-8 tw-my-20">
        <div class="tw-max-w-3xl tw-mx-auto">
            <div class="tw-bg-white tw-rounded-3xl tw-shadow-lg tw-border-2 tw-border-dashed tw-border-gray-300">
                <div class="tw-p-8">
                    <div class="tw-text-center">
                        <div class="tw-mb-8">
                            <img src="{{ asset('storage/img/logo.png') }}" class="tw-h-32 tw-object-contain tw-mx-auto"
                                alt="Logo Optirango">
                        </div>

                        <div class="tw-text-gray-600 tw-mb-8">
                            <p class="tw-text-lg">
                                {{ 'Av. Urdaneta Esq Pelota Edif Profesional Urdaneta Piso 7 Of D Urb Catedral Caracas Distrito Capital'}}
                            </p>
                            <p class="tw-text-lg">{{ 'Telefonos: 0412-088.36.74 / 0412-642.67.97 / 0424-640.67.97 ' }}</p>
                        </div>

                        <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-3 tw-gap-6">
                            <a href="https://www.instagram.com/opti_rango/" target="_blank" rel="noopener noreferrer"
                                class="tw-inline-flex tw-no-underline tw-items-center tw-px-6 tw-py-3 tw-bg-blue-600 tw-text-white hover:tw-text-white tw-font-semibold tw-rounded-xl hover:tw-bg-blue-700 tw-transition-colors tw-duration-200">
                                <i class="fa-brands fa-instagram tw-mr-2"></i> Instagram
                            </a>
                            <a href="https://www.facebook.com/profile.php?id=61551175972400" target="_blank"
                                rel="noopener noreferrer"
                                class="tw-inline-flex tw-no-underline tw-items-center tw-px-6 tw-py-3 tw-bg-blue-600 tw-text-white hover:tw-text-white tw-font-semibold tw-rounded-xl hover:tw-bg-blue-700 tw-transition-colors tw-duration-200">
                                <i class="fa-brands fa-facebook tw-mr-2"></i> Facebook
                            </a>
                            <a href="https://wa.link/cdtl37" target="_blank" rel="noopener noreferrer"
                                class="tw-inline-flex tw-no-underline tw-items-center tw-px-6 tw-py-3 tw-bg-blue-600 tw-text-white hover:tw-text-white tw-font-semibold tw-rounded-xl hover:tw-bg-blue-700 tw-transition-colors tw-duration-200">
                                <i class="fa-brands fa-whatsapp tw-mr-2"></i> WhatsApp
                            </a>
                        </div>

                        @if($orden->isEmpty())
                            <div class="tw-border-t-2 tw-border-dashed tw-border-gray-200 tw-pt-8 tw-mt-8">
                                <div class="tw-bg-yellow-50 tw-border-l-4 tw-border-yellow-400 tw-p-6 tw-rounded-lg tw-mb-8">
                                    <div class="tw-flex tw-gap-4">
                                        <div class="tw-flex-shrink-0">
                                            <i class="fa fa-info-circle tw-text-2xl tw-text-yellow-600"></i>
                                        </div>
                                        <div class="tw-flex tw-flex-col tw-gap-2">
                                            <p class="tw-text-lg tw-font-semibold tw-text-gray-900">No se encontraron resultados
                                            </p>
                                            <p class="tw-text-gray-600">La cédula ingresada no se encuentra registrada en
                                                nuestro sistema. Si crees que esto es un error, por favor comunícate con
                                                nosotros.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="tw-flex tw-justify-center tw-gap-4">
                                    <a href="{{ url('/consulta-web') }}"
                                        class="tw-inline-flex tw-no-underline tw-items-center tw-px-6 tw-py-3 tw-bg-blue-600 tw-text-white hover:tw-text-white tw-font-semibold tw-rounded-xl hover:tw-bg-blue-700 tw-transition-colors tw-duration-200">
                                        <i class="fa fa-search tw-mr-2"></i> Nueva Consulta
                                    </a>
                                    <a href="https://wa.link/cdtl37" target="_blank" rel="noopener noreferrer"
                                        class="tw-inline-flex tw-no-underline tw-items-center tw-px-6 tw-py-3 tw-bg-green-600 tw-text-white hover:tw-text-white tw-font-semibold tw-rounded-xl hover:tw-bg-green-700 tw-transition-colors tw-duration-200">
                                        <i class="fa-brands fa-whatsapp tw-mr-2"></i> Contáctanos
                                    </a>
                                </div>
                            </div>
                        @endif
                        @include('fragment.success')
                        @foreach($orden as $item)
                            <div class="tw-border-t-2 tw-border-dashed tw-border-gray-200 tw-pt-8 tw-mt-8">
                                <div class="tw-mb-8">
                                    <h3 class="tw-text-2xl tw-font-bold tw-text-gray-900 tw-mb-2">Orden Nro. <span
                                            class="tw-text-blue-600">{{ $item->numero_orden }}</span></h3>
                                    <h3 class="tw-text-xl tw-font-semibold tw-text-gray-900">Estatus: <span
                                            class="tw-text-blue-600">{{ $item->estatus }}</span></h3>
                                </div>

                                <div class="tw-bg-gray-50 tw-rounded-2xl tw-p-6 tw-mb-8">
                                    <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 tw-gap-6 tw-text-left">
                                        <div class="tw-space-y-3">
                                            <p class="tw-text-gray-600">Paciente: <span
                                                    class="tw-font-semibold tw-text-gray-900">{{ $item->paciente }}</span></p>
                                            <p class="tw-text-gray-600">Cedula: <span
                                                    class="tw-font-semibold tw-text-gray-900">{{ $item->cedula }}</span></p>
                                            <p class="tw-text-gray-600">Edad: <span
                                                    class="tw-font-semibold tw-text-gray-900">{{ $item->edad }}</span></p>
                                            <p class="tw-text-gray-600">Teléfono: <span
                                                    class="tw-font-semibold tw-text-gray-900">{{ $item->telefono }}</span></p>
                                            <p class="tw-text-gray-600">Fecha de Registro: <span
                                                    class="tw-font-semibold tw-text-gray-900">{{ $item->fecha }}</span></p>
                                            <p class="tw-text-gray-600">Días desde Registro: <span
                                                    class="tw-font-semibold tw-text-gray-900">{{ \Carbon\Carbon::parse($item->fecha)->diffInDays(now(), 2) }}</span>
                                            </p>
                                        </div>
                                        <div class="tw-space-y-3">
                                            <p class="tw-text-gray-600">Próxima Cita Gratuita: <span
                                                    class="tw-font-semibold tw-text-gray-900">{{ $item->fecha_proxima_cita }}</span>
                                            </p>
                                            <p class="tw-text-gray-600">Dirección / Operativo: <span
                                                    class="tw-font-semibold tw-text-gray-900">{{ $item->operativo->nombre_operativo }}</span>
                                            </p>
                                            <p class="tw-text-gray-600">Tipo de Lente: <span
                                                    class="tw-font-semibold tw-text-gray-900">{{ $item->tipoLente->tipo_lente }}</span>
                                            </p>
                                            @if($item->tipoTratamiento)
                                                <p class="tw-text-gray-600">Tipo de Tratamiento: <span
                                                        class="tw-font-semibold tw-text-gray-900">{{ $item->tipoTratamiento->tipo_tratamiento }}</span>
                                                </p>
                                            @endif
                                            <p class="tw-text-gray-600">Especialista: <span
                                                    class="tw-font-semibold tw-text-gray-900">{{ $item->especialistaLente->nombre }}</span>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="tw-mt-6 tw-pt-6 tw-border-t tw-border-gray-200">
                                        <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-3 tw-gap-4">
                                            <div class="tw-text-center tw-p-4 tw-bg-white tw-rounded-xl tw-shadow-sm">
                                                <p class="tw-text-gray-600">Monto Total</p>
                                                <p class="tw-text-xl tw-font-bold tw-text-blue-600">{{ $item->total }}$</p>
                                            </div>
                                            <div class="tw-text-center tw-p-4 tw-bg-white tw-rounded-xl tw-shadow-sm">
                                                <p class="tw-text-gray-600">Saldo Deudor</p>
                                                <p class="tw-text-xl tw-font-bold tw-text-blue-600">{{ $item->saldo }}$</p>
                                            </div>
                                            <div class="tw-text-center tw-p-4 tw-bg-white tw-rounded-xl tw-shadow-sm">
                                                <p class="tw-text-gray-600">Porcentaje Pagado</p>
                                                <p class="tw-text-xl tw-font-bold tw-text-blue-600">{{ $item->porcentaje_pago }}%
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    
                                </div>

                                <div class="tw-bg-blue-50 tw-border-l-4 tw-border-blue-400 tw-p-6 tw-rounded-lg tw-mb-8">
                                    <div class="tw-text-center">
                                        <p class="tw-text-gray-600 tw-font-semibold tw-mb-4">Si deseas registrar un <strong> ABONO</strong> completa la información del siguiente formulario</p>

                                            <div class="tw-mt-6 tw-pt-6 tw-border-t tw-border-gray-200 tw-space-y-4">
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
                                            <h1 class="tw-text-2xl tw-font-bold tw-text-gray-900 tw-mb-2 tw-text-center mt-4">Calculadora de Pago</h1>
                                            <form action="{{ route('abono.web.store') }}" method="POST" enctype="multipart/form-data">
                                            <div class="tw-bg-white tw-rounded-xl tw-shadow-sm tw-p-4 tw-mb-4">
                                                <div class="md:tw-grid md:tw-grid-cols-2 tw-grid-cols-1 tw-gap-4">
                                                    <div class="">
                                                        <label class="tw-block tw-text-gray-600 tw-mb-1">Monto a Pagar en $</label>
                                                        <input type="number" id="montoUsd" name="monto_usd" step="0.01" min="0" class="tw-w-full tw-p-4 tw-border tw-border-gray-300 tw-rounded-md" placeholder="0.00">
                                                    </div>
                                                    <div class="">
                                                        <label class="tw-block tw-text-gray-600 tw-mb-1">Monto en Bs</label>
                                                        <p id="montoCalculadoBs" class="tw-p-4 tw-font-semibold tw-text-blue-600">0.00 Bs.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <h1 class="tw-text-2xl tw-font-bold tw-text-gray-900 tw-mb-2 tw-text-center mt-4">Datos del Pago Movil (Comercios)</h1>
                                            <div class="tw-bg-white tw-rounded-xl tw-shadow-sm tw-p-6">
                                                <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 tw-gap-6 tw-text-left tw-mt-4">
                                                    <div class="tw-space-y-3">
                                                        <p class="tw-text-gray-600">Banco: <span
                                                                class="tw-font-semibold tw-text-gray-900">Banesco (0134) </span></p>
                                                        <p class="tw-text-gray-600">C.I/RIF: <span
                                                                class="tw-font-semibold tw-text-gray-900">J-505868454</span></p>
                                                        <p class="tw-text-gray-600">Teléfono: <span
                                                                class="tw-font-semibold tw-text-gray-900">04246406797</span></p>
                                                        {{-- <p class="tw-text-gray-600">Monto Bs: <span
                                                                class="tw-font-semibold tw-text-gray-900">{{ $item->saldo_bs }}</span></p> --}}

                                                        <button type="button" class="tw-w-block tw-mt-4 tw-p-4 tw-bg-blue-600 tw-text-white tw-rounded-md hover:tw-bg-blue-700 tw-transition-colors" onclick="copyToClipboard('0134 J-505868454 04246406797')">
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
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <input type="hidden" name="saldo" value="{{ $item->saldo }}">
                                                    <input type="hidden" name="saldo_bs" value="{{ $item->saldo_bs }}">
                                                    <input type="hidden" name="total" value="{{ $item->total }}">
                                                    <input type="hidden" name="tasa_cambio" value="{{ $tasaCambio['price'] }}">
                                                    <input type="hidden" name="fecha" value="{{ $item->fecha }}">
                                                    <input type="hidden" name="paciente" value="{{ $item->paciente }}">
                                                    <input type="hidden" name="numero_orden" value="{{ $item->numero_orden }}">
                                                    <input type="hidden" name="cedula" value="{{ $item->cedula }}">
                                                    <input type="hidden" name="edad" value="{{ $item->edad }}">
                                                    <input type="hidden" name="telefono" value="{{ $item->telefono }}">

                                                    <div class="tw-grid tw-grid-cols-1 tw-gap-4">
                                                        <div>
                                                            <label for="banco_emisor" class="tw-block tw-text-gray-600">Banco Emisor</label>
                                                            <select name="banco_emisor" class="tw-w-full tw-p-4 tw-border tw-border-gray-300 tw-rounded-md">
                                                                <option value="">Seleccione un banco</option>
                                                                @foreach($bancos as $banco)
                                                                    <option value="{{ $banco['codigo'] }} - {{ $banco['nombre'] }}">{{ $banco['codigo'] }} - {{ $banco['nombre'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div>
                                                            <label for="referencia" class="tw-block tw-text-gray-600">Número de Referencia</label>
                                                            <input type="text" name="referencia" class="tw-w-full tw-p-4 tw-border tw-border-gray-300 tw-rounded-md" placeholder="Ingrese el número de referencia">
                                                        </div>

                                                        <div>
                                                            <label for="monto" class="tw-block tw-text-gray-600">Monto Transferido (Bs)</label>
                                                            <input type="text" id="monto"  name="monto" class="tw-w-full tw-p-4 tw-border tw-border-gray-300 tw-rounded-md" placeholder="0.00">
                                                        </div>

                                                        <div>
                                                            <label for="fecha_pago" class="tw-block tw-text-gray-600">Fecha de Pago</label>
                                                            <input type="date" name="fecha_pago" class="tw-w-full tw-p-4 tw-border tw-border-gray-300 tw-rounded-md">
                                                        </div>

                                                        <div>
                                                            <label for="file" class="tw-block tw-text-gray-600">Comprobante de Pago</label>
                                                            <input type="file" name="file" accept="image/*,.pdf" class="tw-w-full tw-p-4 tw-border tw-border-gray-300 tw-rounded-md">
                                                            <p class="tw-text-sm tw-text-gray-500">Formatos permitidos: imágenes y PDF</p>
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="tw-w-full tw-mt-4 tw-p-4 tw-bg-blue-600 tw-text-white tw-rounded-md hover:tw-bg-blue-700 tw-transition-colors">
                                                        <i class="fa fa-upload tw-mr-2"></i> Registrar información
                                                    </button>
                                                </div>
                                            </form>
                                        {{--  --}}
                                    </div>
                                </div>

                                <p class="tw-text-xl tw-text-gray-600">¡Gracias por confiar su salud visual en nosotros! <span
                                        class="tw-text-green-500"><i class="fa fa-heart"></i></span></p>
                                        <a class="tw-inline-flex tw-no-underline tw-items-center tw-px-8 tw-py-4 tw-bg-blue-600 tw-text-white hover:tw-text-white tw-text-lg tw-font-semibold tw-rounded-xl hover:tw-bg-blue-700 tw-transition-colors tw-duration-200"
                                            href="https://wa.link/s5jouq" target="_blank" rel="noopener noreferrer">
                                            <i class="fa-brands fa-whatsapp tw-mr-3"></i> WhatsApp
                                        </a>
                            </div>
                        @endforeach

                        <div class="tw-mt-8 tw-pt-8 tw-border-t-2 tw-border-dashed tw-border-gray-200">
                            <a href="{{ url('/') }}"
                                class="tw-inline-flex tw-no-underline tw-items-center tw-px-6 tw-py-3 tw-bg-green-600 tw-text-white hover:tw-text-white tw-font-semibold tw-rounded-xl hover:tw-bg-green-700 tw-transition-colors tw-duration-200">
                                <i class="fa fa-home tw-mr-2"></i> Inicio
                            </a>
                        </div>
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
{{--     <script type="module">


        IMask(document.getElementById('monto'), {
            mask: Number,  // enable number mask

            // other options are optional with defaults below
            scale: 2,  // digits after point, 0 for integers
            thousandsSeparator: '',  // any single char
            padFractionalZeros: false,  // if true, then pads zeros at end to the length of scale
            normalizeZeros: true,  // appends or removes zeros at ends
            radix: ',',  // fractional delimiter
            mapToRadix: ['.'],  // symbols to process as radix

            // additional number interval options (e.g.)
            min: -10000,
            max: 10000,
            autofix: true,
        });
    </script> --}}

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
