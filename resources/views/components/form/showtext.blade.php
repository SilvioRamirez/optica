<div class="form-group row col-md-12">
	{!! Html::decode(Form::label($name, $show.':', ['class' => 'col-sm-4 col-form-label text-md-right'])) !!}
	<div class="col-sm-8 col-form-label">
		{{-- {!! Form::text($name, $value, ['class' => 'form-control', 'id' => $name]) !!} --}}
		<strong>{!! $obj->$name !!}</strong>
	</div>			
</div>