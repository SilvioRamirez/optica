<div>
    {{-- The best athlete wants his opponent at his best. --}}

    <div class="col-md-6">
        <label for="estado">Estado</label>
        <select name="" id="" class="form-control" wire:model="estado">
            <option value="">Seleccione un Estado</option>
            @foreach ($estados as $estado)
                <option value="{{ $estado->id }}">{{ $estado->estado }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6">
        <label for="ciudad">Ciudad</label>
        <select name="" id="" class="form-control" wire:model="municipio">
            @if ($municipios->count() == 0)
                <option value="">Debe seleccionar un Estado antes</option>
            @endif
            @foreach ($municipios as $municipio)
                <option value="{{ $municipio->id }}">{{ $municipio->municipio }}</option>
            @endforeach
        </select>
    </div>
</div>
