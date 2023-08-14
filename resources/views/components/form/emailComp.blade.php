{!! Html::decode(Form::label($name, '<strong>'.$show.':</strong>')) !!}
{!! Form::email($name, $value, ['placeholder' => $show,'class' => 'form-control', 'id' => $name]) !!}