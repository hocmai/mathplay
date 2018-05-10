<div class="form-group">
	{{ Form::label('', 'Phép tính') }}
	{{ Form::select('question_config[method]['.$id.']', [
		'' => 'Mặc định',
		'plus' => 'Phép cộng',
		'sub' => 'Phép trừ'
	], !empty($config['method']) ? $config['method'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('', 'Giá trị lớn nhất') }}
	{{ Form::number('question_config[max]['.$id.']', !empty($config['max']) ? $config['max'] : 100, ['class' => 'form-control']) }}
</div>