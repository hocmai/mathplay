Tiêu đề và nội dung câu hỏi sẽ được tạo tự động
<div class="form-group">
	{{ Form::label('', 'Hình thức') }}
	{{ Form::select('question_config[answer_type][]', ['' => 'Mặc định'] + TimBieuThucCoTongDung::getAnswerType(), !empty($config['answer_type']) ? $config['answer_type'] : '', ['class' => 'form-control pull-left']) }}
</div>

<div class="form-group">
	{{ Form::label('', 'Giá trị lớn nhất') }}
	{{ Form::number('question_config[max_value][]', !empty($config['max_value']) ? $config['max_value'] : 10, ['class' => 'form-control pull-left', 'placeholder' => 'Giá trị thấp nhất', 'min' => 10]) }}
	<div class="description">Đối với dạng bài "Nhập biểu thức còn thiếu", Giá trị lớn nhất luôn là 10</div>
</div>