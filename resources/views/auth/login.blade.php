@extends('landing.app.landing')

@section('content')
    <div class="tw-container tw-mx-auto tw-px-4 sm:tw-px-6 lg:tw-px-8 tw-my-20">
        <div class="tw-max-w-2xl tw-mx-auto">
            <div class="tw-bg-white tw-rounded-3xl tw-shadow-lg tw-border-2 tw-border-dashed tw-border-gray-300">
                <div class="tw-p-8">
                    <div class="tw-text-center tw-mb-8">
                        <img src="{{ asset('storage/img/logo.png') }}" class="tw-h-32 tw-object-contain tw-mx-auto" alt="Logo Optirango">
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="tw-space-y-6">
                        @csrf

                        <div class="tw-space-y-4">
                            <div>
                                <label for="email" class="tw-block tw-text-lg tw-font-medium tw-text-gray-700">{{ __('Correo Electrónico') }}</label>
                                <div class="tw-mt-1">
                                    <input 
                                        id="email" 
                                        type="email" 
                                        name="email" 
                                        value="{{ old('email') }}" 
                                        required 
                                        autocomplete="email" 
                                        autofocus
                                        class="tw-block tw-w-full tw-px-4 tw-py-3 tw-rounded-xl tw-border-2 tw-border-gray-300 tw-shadow-sm focus:tw-border-blue-500 focus:tw-ring-blue-500 tw-text-lg @error('email') tw-border-red-500 @enderror"
                                    >
                                    @error('email')
                                        <p class="tw-mt-2 tw-text-sm tw-text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="password" class="tw-block tw-text-lg tw-font-medium tw-text-gray-700">{{ __('Contraseña') }}</label>
                                <div class="tw-mt-1">
                                    <input 
                                        id="password" 
                                        type="password" 
                                        name="password" 
                                        required 
                                        autocomplete="current-password"
                                        class="tw-block tw-w-full tw-px-4 tw-py-3 tw-rounded-xl tw-border-2 tw-border-gray-300 tw-shadow-sm focus:tw-border-blue-500 focus:tw-ring-blue-500 tw-text-lg @error('password') tw-border-red-500 @enderror"
                                    >
                                    @error('password')
                                        <p class="tw-mt-2 tw-text-sm tw-text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="tw-flex tw-items-center mb-4">
                                <input 
                                    type="checkbox" 
                                    name="remember" 
                                    id="remember" 
                                    {{ old('remember') ? 'checked' : '' }}
                                    class="tw-h-5 tw-w-5 tw-rounded tw-border-gray-300 tw-text-blue-600 focus:tw-ring-blue-500 "
                                >
                                <label for="remember" class="tw-ml-2 tw-block tw-text-lg tw-text-gray-700">
                                    {{ __('Recordarme') }}
                                </label>
                            </div>
                        </div>

                        <div class="tw-flex tw-flex-col sm:tw-flex-row tw-items-center tw-justify-between tw-gap-4">
                            <button type="submit" class="tw-inline-flex tw-items-center tw-px-8 tw-py-4 tw-bg-blue-600 tw-text-white tw-text-lg tw-font-semibold tw-rounded-xl hover:tw-bg-blue-700 tw-transition-colors tw-duration-200 tw-w-full sm:tw-w-auto tw-justify-center">
                                <i class="fa fa-right-to-bracket tw-mr-3"></i>{{ __('Iniciar Sesión') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="tw-text-blue-600 hover:tw-text-blue-700 tw-text-lg tw-no-underline">
                                    {{ __('¿Olvidaste tu contraseña?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
