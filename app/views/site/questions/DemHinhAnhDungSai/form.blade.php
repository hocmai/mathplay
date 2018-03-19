<div class="form-group">
	{{ Form::label('', 'Số lượng nhỏ nhất') }}
	{{ Form::number('question_config[min]['.$id.']', !empty($config['min']) ? $config['min'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('', 'Số lượng lớn nhất') }}
	{{ Form::number('question_config[max]['.$id.']', !empty($config['max']) ? $config['max'] : '', ['class' => 'form-control']) }}
</div>