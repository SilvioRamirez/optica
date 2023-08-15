{!! Html::decode(Form::label($name, '<strong>'.$show.':</strong>')) !!}
{!! Form::checkbox($name, $value, null, ['class' => 'form-check-input', 'id' => $name ]) !!}
