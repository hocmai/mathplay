Tiêu đề và nội dung câu hỏi sẽ được tạo tự động
<div class="form-group">
	{{ Form::label('', 'Hình thức') }}
	{{ Form::select('question_config[answer_type]['.$id.']', ['' => 'Mặc định'] + TimBieuThucGiaoHoan::getAnswerType(), !empty($config['answer_type']) ? $config['answer_type'] : '', ['class' => 'form-control pull-left']) }}
</div>

<div class="form-group">
	{{ Form::label('', 'Giá trị lớn nhất') }}
	{{ Form::text('question_config[max_value]['.$id.']', !empty($config['max_value']) ? $config['max_value'] : 10, ['class' => 'form-control pull-left', 'placeholder' => 'Giá trị lớn nhất', 'min' => 3]) }}
</div>