{!! Html::decode(Form::label($name, '<strong>'.$show.':</strong>')) !!}
{!! Form::number($name, $value, array('placeholder' => $show, 'id' => $name, 'class' => 'form-control', 'min' => 0, 'max' => '120')) !!}