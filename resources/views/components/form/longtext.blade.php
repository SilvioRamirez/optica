<div class="form-group row col-md-12">
	{!! Html::decode(Form::label($name, $show.':', ['class' => 'col-sm-6 col-form-label'])) !!}
	<div class="col-sm-6">
		{!! Form::text($name, $value, ['class' => 'form-control', 'id' => $name]) !!}
	</div>			
</div>