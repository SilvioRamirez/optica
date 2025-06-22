@extends('landing.app.landing')

@section('content')
    <div class="tw-container tw-mx-auto tw-px-4 sm:tw-px-6 lg:tw-px-8 tw-my-20">
        <div class="tw-max-w-2xl tw-mx-auto">
            <div class="tw-bg-white tw-rounded-3xl tw-shadow-lg tw-border-2 tw-border-dashed tw-border-gray-300">
                <div class="tw-p-8">
                    <div class="tw-text-center tw-mb-12">
                        <img src="{{ asset('storage/img/logo.png') }}" class="tw-h-32 tw-object-contain tw-mx-auto" alt="Logo Optirango">
                    </div>

                    <form method="GET" action="{{ route('formulario.orden.cedula') }}" class="tw-space-y-8">
                        @csrf

                        <div class="tw-space-y-4">
                            <label for="cedula" class="tw-block tw-text-lg tw-font-medium tw-text-gray-700">{{ __('Cédula') }}</label>
                            <div class="tw-mt-1">
                                <input 
                                    id="cedula" 
                                    type="text" 
                                    name="cedula"
                                    placeholder="Ej: V12345678"
                                    value="{{ old('cedula') }}"
                                    required
                                    autocomplete="cedula"
                                    autofocus
                                    class="tw-block tw-w-full tw-px-4 tw-py-3 tw-rounded-xl tw-border-2 tw-border-gray-300 tw-shadow-sm focus:tw-border-blue-500 focus:tw-ring-blue-500 tw-text-lg @error('cedula') tw-border-red-500 @enderror"
                                >

                                @error('cedula')
                                    <p class="tw-mt-2 tw-text-sm tw-text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="tw-flex tw-justify-center">
                            <button type="submit" class="tw-inline-flex tw-items-center tw-px-8 tw-py-4 tw-bg-blue-600 tw-text-white tw-text-lg tw-font-semibold tw-rounded-xl hover:tw-bg-blue-700 tw-transition-colors tw-duration-200">
                                <i class="fa fa-right-to-bracket tw-mr-3"></i>{{ __('Consultar') }}
                            </button>
                        </div>

                        <div class="tw-space-y-4 tw-mt-8">
                            <div class="tw-bg-blue-50 tw-border-l-4 tw-border-blue-400 tw-p-6 tw-rounded-lg">
                                <div class="tw-flex tw-gap-4">
                                    <div class="tw-flex-shrink-0">
                                        <i class="fa fa-info-circle tw-text-2xl tw-text-blue-600"></i>
                                    </div>
                                    <p class="tw-text-gray-600">
                                        Por favor, revisa el estatus de tu lente ingresando tu <strong class="tw-font-semibold">Cédula</strong> aquí.
                                    </p>
                                </div>
                            </div>

                            <div class="tw-bg-gray-50 tw-border-l-4 tw-border-gray-400 tw-p-6 tw-rounded-lg">
                                <div class="tw-flex tw-gap-4">
                                    <div class="tw-flex-shrink-0">
                                        <i class="fa fa-lightbulb tw-text-2xl tw-text-gray-600"></i>
                                    </div>
                                    <p class="tw-text-gray-600">
                                        Si eres Venezolano coloca la letra <strong class="tw-font-semibold">V</strong> y si eres extranjero coloca la letra <strong class="tw-font-semibold">E</strong> al comienzo de la <strong class="tw-font-semibold">Cédula</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



@push('scripts')
    <script type="module">
        IMask(document.getElementById('cedula'), {
            mask: '{v}00000000-00000',
            prepareChar: str => str.toUpperCase(),
            definitions: {
                'v': /[V,J,G,E,P]/
            }
        })
    </script>

@endpush