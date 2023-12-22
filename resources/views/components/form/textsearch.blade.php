<div class="form-group row">
	{!! Html::decode(Form::label($name, $show.':', ['class' => 'col-sm-4 col-form-label'])) !!}
	<div class="col-sm-8">
		{!! Form::text($name, $value, ['class' => 'form-control', 'id' => $name, 'autocomplete' => 'off', 'placeholder' => 'Escriba para buscar']) !!}
	</div>			
</div>