Tiêu đề và nội dung câu hỏi sẽ được tạo tự động
<div class="form-group">
	{{ Form::label('', 'Hình thức') }}
	{{ Form::select('question_config[answer_type][]', ['' => 'Mặc định'] + ['trac-nghiem' => 'Trắc nghiệm', 'dien-dap-an' => 'Điền đáp án'], !empty($config['answer_type']) ? $config['answer_type'] : '', ['class' => 'form-control pull-left']) }}
</div>

<div class="form-group">
	{{ Form::label('', 'Số hạng thấp nhất') }}
	{{ Form::number('question_config[min_value][]', !empty($config['min_value']) ? $config['min_value'] : 10, ['class' => 'form-control pull-left', 'placeholder' => 'Số hạng nhỏ nhất', 'min' => 1]) }}
</div>

<div class="form-group">
	{{ Form::label('', 'Số hạng lớn nhất') }}
	{{ Form::number('question_config[max_value][]', !empty($config['max_value']) ? $config['max_value'] : 10, ['class' => 'form-control pull-left', 'placeholder' => 'Số hạng lớn nhất', 'min' => 5]) }}
</div>