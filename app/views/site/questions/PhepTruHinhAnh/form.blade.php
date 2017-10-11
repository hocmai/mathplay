<div class="form-group">
	{{ Form::label('', 'Hình thức câu hỏi') }}
	{{ Form::select('question_config[question_type][]', [
		'' => 'Mặc định',
		'input' => 'Nhập đáp án',
		'choose' => 'Chọn biểu thức đúng',
		'write' => 'Nhập biểu thức đúng'
	], !empty($config['question_type']) ? $config['question_type'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('', 'Giá trị lớn nhất') }}
	{{ Form::text('question_config[max_value][]', !empty($config['max_value']) ? $config['max_value'] : 10, ['class' => 'form-control']) }}
</div>