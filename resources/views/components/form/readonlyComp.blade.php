@if($show)
    {!! Html::decode(Form::label($name, '<strong>'.$show.':</strong>', array('class' => 'mb-1'))) !!}
@endif

{!! Form::text($name, $value, array('placeholder' => $placeholder, 'id' => $name, 'class' => 'form-control mb-2', 'readonly')) !!}