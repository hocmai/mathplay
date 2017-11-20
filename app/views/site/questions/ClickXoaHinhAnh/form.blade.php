
<div class="form-group">
	{{ Form::label('', 'Giá trị nhỏ nhất') }}
	{{ Form::text('question_config[min]['.$id.']', !empty($config['min']) ? $config['min'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('', 'Giá trị lớn nhất') }}
	{{ Form::text('question_config[max]['.$id.']', !empty($config['max']) ? $config['max'] : '', ['class' => 'form-control']) }}
</div>