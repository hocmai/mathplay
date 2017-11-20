<div class="row">
	<div class="form-group col-sm-5">
		{{ Form::label('', 'Số hạng nhỏ nhất') }}
		{{ Form::number('question_config[min_value]['.$id.']', isset($config['min_value']) ? $config['min_value'] : 1, ['class' => 'form-control pull-left', 'placeholder' => 'Số hạng nhỏ nhất', 'min' => 0]) }}
	</div>
	<div class="form-group col-sm-5">
		{{ Form::label('', 'Số hạng lớn nhất') }}
		{{ Form::number('question_config[max_value]['.$id.']', !empty($config['max_value']) ? $config['max_value'] : 10, ['class' => 'form-control pull-left', 'placeholder' => 'Số hạng lớn nhất', 'min' => 1]) }}
	</div>
</div>