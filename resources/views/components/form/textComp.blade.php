{!! Html::decode(Form::label($name, '<strong>'.$show.':</strong>')) !!}
{!! Form::text($name, $value, array('placeholder' => $placeholder, 'id' => $name, 'class' => 'form-control')) !!}