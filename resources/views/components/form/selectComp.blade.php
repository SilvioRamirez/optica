{!! Html::decode(Form::label($name, '<strong>'.$show.':</strong>')) !!}
{!! Form::select($name, $options, null, ['class' => 'form-control', 'id' => $name ]) !!}