<div class="form-group">
	{{ Form::label('', 'Loại câu hỏi') }}
	{{ Form::select('question_config[type]['.$id.']', [
		'' => 'Mặc định',
		'input' => 'Nhập đáp án',
		'choose' => 'Trắc nghiệm',
	], !empty($config['type']) ? $config['type'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('','Giá trị lớn nhất') }}
	{{ Form::text('question_config[max]['.$id.']', !empty($config['max']) ? $config['max'] : 100, ['class' => 'form-control']) }}
</div>