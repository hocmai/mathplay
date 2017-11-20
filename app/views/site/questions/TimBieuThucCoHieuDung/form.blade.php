Tiêu đề và nội dung câu hỏi sẽ được tạo tự động
<br/><strong>a - b = c</strong>
<div class="form-group">
	{{ Form::label('', 'Hình thức') }}
	{{ Form::select('question_config[answer_type]['.$id.']', 
		[
			'input' => 'Nhập biểu thức còn thiếu với số c cố định',
			'input_a' => 'Nhập biểu thức còn thiếu với số a cố định',
			'choose' => 'Chọn biểu thức đúng',
		],
	!empty($config['answer_type']) ? $config['answer_type'] : '', ['class' => 'form-control pull-left']) }}
</div>

<div class="form-group">
	{{ Form::label('', 'Giá trị lớn nhất') }}
	{{ Form::number('question_config[max_value]['.$id.']', !empty($config['max_value']) ? $config['max_value'] : 10, ['class' => 'form-control pull-left', 'placeholder' => 'Giá trị thấp nhất', 'min' => 5]) }}
	<div class="description">Đối với dạng bài "Nhập biểu thức còn thiếu", Giá trị lớn nhất luôn là 10</div>
</div>