<div class="form-group">
	{{ Form::label('', 'Số lượng cặp số') }}
	{{ Form::text('question_config[num]['.$id.']', !empty($config['num']) ? $config['num'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('', 'Giá trị nhỏ nhất') }}
	{{ Form::text('question_config[min]['.$id.']', !empty($config['min']) ? $config['min'] : 15, ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('', 'Giá trị lớn nhất') }}
	{{ Form::text('question_config[max]['.$id.']', !empty($config['max']) ? $config['max'] : 100, ['class' => 'form-control']) }}
</div>