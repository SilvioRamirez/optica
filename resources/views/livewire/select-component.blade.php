<div>
    <div class="col-md-6">
        <label for="id_estado"><strong>Estado</strong></label>
        <select name="id_estado" id="" class="form-control" wire:model="estado">
            <option value="">Seleccione un Estado</option>
            @foreach ($estados as $estado)
                <option value="{{ $estado->id }}">{{ $estado->estado }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6">
        <label for="id_municipio"><strong>Municipio</strong></label>
        <select name="id_municipio" id="" class="form-control" wire:model="municipio">
            @if ($municipios->count() == 0)
                <option value="">Debe seleccionar un Estado antes</option>
            @endif
            @foreach ($municipios as $municipio)
                <option value="{{ $municipio->id_municipio }}">{{ $municipio->municipio }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6">
        <label for="id_parroquia"><strong>Parroquia</strong></label>
        <select name="id_parroquia" id="" class="form-control" wire:model="parroquia">
            @if ($parroquias->count() == 0)
                <option value="">Debe seleccionar un Municipio antes</option>
            @endif
            @foreach ($parroquias as $parroquia)
                <option value="{{ $parroquia->id }}">{{ $parroquia->parroquia }}</option>
            @endforeach
        </select>
    </div>
</div>
