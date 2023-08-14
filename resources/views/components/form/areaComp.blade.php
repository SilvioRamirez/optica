{!! Html::decode(Form::label($name, '<strong>'.$show.':</strong>')) !!}
{!! Form::textarea($name, $value, ['placeholder' => $show,'class' => 'form-control', 'id' => $name, 'rows' => '1', 'cols' => '10']) !!}
