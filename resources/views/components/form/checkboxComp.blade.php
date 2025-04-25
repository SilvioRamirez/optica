<div class="form-check">
{!! Html::decode(Form::label($name, '<strong>'.$show.'</strong>')) !!}
@php
    // Obtener el valor existente para determinar si debe estar marcado
    $isChecked = false;
    
    // Usar el valor pasado como tercer parámetro
    if ($value == 1) {
        $isChecked = true;
    }
    
    // Si hay un valor antiguo (después de validación fallida)
    if (old($name) == 1) {
        $isChecked = true;
    }
@endphp
<input type="checkbox" name="{{ $name }}" id="{{ $name }}" class="form-check-input" value="1" onchange="updateCheckboxValue(this)" {{ $isChecked ? 'checked' : '' }}>
</div>

<script>
// Asegurarse que esta función solo se declare una vez
if (typeof updateCheckboxValue !== 'function') {
    function updateCheckboxValue(checkbox) {
        // Si está marcado, el valor es 1, si no está marcado, el valor es 0
        checkbox.value = checkbox.checked ? 1 : 0;
    }
    
    // Inicializa todos los checkboxes cuando la página carga
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
            updateCheckboxValue(checkbox);
        });
    });
}
</script>
