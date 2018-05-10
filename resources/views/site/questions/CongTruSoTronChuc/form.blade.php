<div class="form-group">
	{{ Form::label('', 'Phép tính') }}
	{{ Form::select('question_config[type]['.$id.']', ['' => 'Mặc định', 'plus' => 'Phép cộng', 'sub' => 'Phép trừ'], !empty($config['type']) ? $config['type'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('', 'Giá trị lớn nhất') }}
	{{ Form::text('question_config[max]['.$id.']', !empty($config['max']) ? $config['max'] : '', ['class' => 'form-control']) }}
</div>