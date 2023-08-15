{!! Html::decode(Form::label($name, '<strong>'.$show.':</strong>')) !!}
{!! Form::date($name, $value, array('placeholder' => $show, 'id' => $name, 'class' => 'form-control')) !!}