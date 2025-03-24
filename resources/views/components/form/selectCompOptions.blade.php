{!! Html::decode(Form::label($name, '<strong>'.$show.':</strong>', array('class' => 'mb-1'))) !!}
{!! Form::select($name, $options, null, ['class' => 'form-control mb-2', 'id' => $name ]) !!}