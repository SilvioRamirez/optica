@extends('landing.app.landing')
@section('title', content: 'Optirango | Consulta Cliente')

@section('content')
    <div class="tw-container tw-mx-auto tw-px-4 sm:tw-px-6 lg:tw-px-8 tw-my-20">
        <div class="tw-max-w-2xl tw-mx-auto">
            <div class="tw-bg-white tw-rounded-3xl tw-shadow-lg tw-border-2 tw-border-dashed tw-border-gray-300">
                <div class="tw-p-8">
                    <div class="tw-text-center tw-mb-12">
                        <img src="{{ asset('storage/img/logo.png') }}" class="tw-h-32 tw-object-contain tw-mx-auto"
                            alt="Logo Optirango">
                        <h1 class="tw-text-2xl tw-font-bold tw-text-gray-700 tw-mt-4">Consulta Cliente</h1>
                    </div>
                    @include('fragment.success')

                    <form method="GET" action="{{ route('consulta-web-cliente.buscar') }}" class="tw-space-y-8">
                        @csrf
                        <div class="tw-space-y-4">
                            <label for="document_number" class="tw-block tw-text-lg tw-font-medium tw-text-gray-700">Documento de Identidad (Cédula/RIF/Pasaporte)</label>
                            <div class="tw-mt-1">
                                <div class="tw-flex tw-items-center tw-rounded-xl tw-border-2 tw-border-gray-300 tw-shadow-sm tw-has-[input:focus-within]:tw-border-blue-500 tw-has-[select:focus-within]:tw-border-blue-500">
                                    <div class="tw-grid tw-shrink-0 tw-grid-cols-1 tw-focus-within:relative">
                                        <select id="identity_id" name="identity_id" aria-label="Tipo de Identidad" required
                                            class="tw-col-start-1 tw-row-start-1 tw-w-full tw-appearance-none tw-rounded-l-xl tw-bg-gray-50 tw-py-3 tw-pr-8 tw-pl-3 tw-text-lg tw-text-gray-700 tw-border-0 tw-focus:tw-outline-none tw-focus:tw-ring-0 @error('identity_id') tw-bg-red-50 @enderror">
                                            @foreach($identities as $identity)
                                                <option value="{{ $identity->id }}" {{ old('identity_id') == $identity->id ? 'selected=selected' : '' }}>
                                                    {{ $identity->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <i class="fa fa-chevron-down tw-pointer-events-none tw-col-start-1 tw-row-start-1 tw-mr-2 tw-size-5 tw-self-center tw-justify-self-end tw-text-gray-400"></i>
                                    </div>
                                    <input id="document_number" type="text" name="document_number" placeholder="Número de documento"
                                        value="{{ old('document_number') }}" required autocomplete="document_number" autofocus
                                        class="tw-block tw-min-w-0 tw-grow tw-rounded-r-xl tw-py-3 tw-pr-4 tw-pl-3 tw-text-lg tw-border-0 tw-focus:tw-outline-none tw-focus:tw-ring-0 @error('document_number') tw-bg-red-50 @enderror" />
                                </div>
                                @error('identity_id')
                                    <p class="tw-mt-2 tw-text-sm tw-text-red-600">{{ $message }}</p>
                                @enderror
                                @error('document_number')
                                    <p class="tw-mt-2 tw-text-sm tw-text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="tw-flex tw-justify-center">
                            <button type="submit"
                                class="tw-inline-flex tw-items-center tw-px-8 tw-py-4 tw-bg-blue-600 tw-text-white tw-text-lg tw-font-semibold tw-rounded-xl hover:tw-bg-blue-700 tw-transition-colors tw-duration-200">
                                <i class="fa fa-right-to-bracket tw-mr-3"></i>Consultar
                            </button>
                        </div>

                        <div class="tw-space-y-4 tw-mt-8">
                            <div class="tw-bg-blue-50 tw-border-l-4 tw-border-blue-400 tw-p-6 tw-rounded-lg">
                                <div class="tw-flex tw-gap-4">
                                    <div class="tw-flex-shrink-0">
                                        <i class="fa fa-info-circle tw-text-2xl tw-text-blue-600"></i>
                                    </div>
                                    <p class="tw-text-gray-600">
                                        Por favor, ingresa tu número de <strong
                                            class="tw-font-semibold">Cédula/RIF/Documento</strong> aquí.
                                    </p>
                                </div>
                            </div>

                            {{-- <div class="tw-bg-gray-50 tw-border-l-4 tw-border-gray-400 tw-p-6 tw-rounded-lg">
                                <div class="tw-flex tw-gap-4">
                                    <div class="tw-flex-shrink-0">
                                        <i class="fa fa-lightbulb tw-text-2xl tw-text-gray-600"></i>
                                    </div>
                                    <p class="tw-text-gray-600">
                                        Si eres Venezolano coloca la letra <strong class="tw-font-semibold">V</strong> y si
                                        eres extranjero coloca la letra <strong class="tw-font-semibold">E</strong> al
                                        comienzo de la <strong class="tw-font-semibold">Cédula</strong>
                                    </p>
                                </div>
                            </div> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script type="module">
        // Máscara más flexible para diferentes tipos de documentos
        IMask(document.getElementById('document_number'), {
            mask: /^[A-Z0-9\-]*$/,
            prepareChar: str => str.toUpperCase(),
        })
    </script>
@endpush