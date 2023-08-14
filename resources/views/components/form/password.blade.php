<div class="form-group row">
		{!! Html::decode(Form::label($name, '<strong>'.$show.':</strong>', ['class' => 'col-sm-4 col-form-label text-md-right'])) !!}
		<div class="col-sm-8">
			{!! Form::password($name, ['class' => 'form-control']) !!}
		</div>			
</div>