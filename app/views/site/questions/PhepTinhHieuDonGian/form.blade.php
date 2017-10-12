<div class="form-group">
	{{ Form::label('', 'Hiển thị') }}
	{{ Form::select('question_config[display][]', ['' => 'Mặc định', 'doc' => 'Dọc', 'ngang' => 'Ngang'], !empty($config['display']) ? $config['display'] : '', ['class' => 'form-control']) }}
</div>
<div class="row">
	<div class="form-group col-sm-5">
		{{ Form::label('', 'Số Trừ lớn nhất') }}
		{{ Form::number('question_config[max_value_1][]', !empty($config['max_value_1']) ? $config['max_value_1'] : 10, ['class' => 'form-control pull-left', 'placeholder' => 'Số hạng lớn nhất', 'min' => 1]) }}
	</div>
</div>
<div class="row">
	<div class="form-group col-sm-5">
		{{ Form::label('', 'Số Bị Trừ nhỏ nhất') }}
		{{ Form::number('question_config[min_value_2][]', isset($config['min_value_2']) ? $config['min_value_2'] : 1, ['class' => 'form-control pull-left', 'placeholder' => 'Số hạng nhỏ nhất', 'min' => 0]) }}
	</div>
	<div class="form-group col-sm-5">
		{{ Form::label('', 'Số Bị Trừ lớn nhất') }}
		{{ Form::number('question_config[max_value_2][]', !empty($config['max_value_2']) ? $config['max_value_2'] : 10, ['class' => 'form-control pull-left', 'placeholder' => 'Số hạng lớn nhất', 'min' => 1]) }}
	</div>
</div>