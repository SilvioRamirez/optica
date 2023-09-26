<div>
    <form wire:submit.prevent="submit">
        <label for="">Título</label>
        <input type="text" class="form-control" wire:model="title" />
        <label for="">Texto</label>
        <input type="text" class="form-control" wire:model="text" />
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
