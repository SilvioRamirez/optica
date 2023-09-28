{!! Html::decode(Form::label($name, '<strong>'.$show.':</strong>', array('class' => 'mb-1'))) !!}
{!! Form::textarea($name, $value, ['placeholder' => $show,'class' => 'form-control mb-2', 'id' => $name, 'rows' => '1', 'cols' => '10']) !!}
