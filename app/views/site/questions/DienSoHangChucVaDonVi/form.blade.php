<div class="row">
	<div class="form-group col-sm-5">
		{{ Form::label('', 'Giá trị thấp nhất') }}
		{{ Form::number('question_config[min_value]['.$id.']', !empty($config['min_value']) ? $config['min_value'] : 1, ['class' => 'form-control pull-left', 'placeholder' => 'Giá trị thấp nhất', 'max' => 99]) }}
	</div>
	<div class="form-group col-sm-5">
		{{ Form::label('', 'Giá trị lớn nhất') }}
		{{ Form::number('question_config[max_value]['.$id.']', !empty($config['max_value']) ? $config['max_value'] : 10, ['class' => 'form-control pull-left', 'placeholder' => 'Giá trị lớn nhất', 'max' => 100]) }}
	</div>
</div>