@extends('landing.app.app')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-light mb-3 mt-4 shadow">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="{{ asset('storage/img/logo.png') }}" class="rounded" style="display: inline-block" alt="..." width="300" >
                    </div>
                    <form method="GET" action="{{ route('formulario.orden.cedula') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="cedula" class="col-md-4 col-form-label text-md-end">{{ __('Cedula') }}</label>

                            <div class="col-md-6">
                                <input id="cedula" type="text" placeholder="Ej: V12345678" class="form-control" @error('cedula') is-invalid @enderror" name="cedula" value="{{ old('cedula') }}" required autocomplete="cedula" autofocus>

                                @error('cedula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-right-to-bracket"></i> {{ __('Consultar') }}
                                </button>
                            </div>
                        </div>

                        <div class="alert alert-dismissible alert-info" bis_skin_checked="1">
                            Por favor, revisa el estatus de tu lente ingresando tu <strong>Cédula</strong> aquí. 
                        </div>
                        
                        <div class="alert alert-dismissible alert-light" bis_skin_checked="1">
                            Si eres Venezolano coloca la letra <strong>V</strong> y si eres extranjero coloca la letra <strong>E</strong> al comienzo de la <strong>Cedula</strong>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    
@endsection

@push('scripts')
@endpush
