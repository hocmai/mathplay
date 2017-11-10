Tiêu đề sẽ được tạo tự động.
<div class="form-group">
	{{ Form::label('type', 'Loại câu hỏi') }}
	{{ Form::select('question_config[type][]', [
		''=>'Mặc định',
		'choose' => 'Chọn đáp án nhiều hơn/ít hơn',
		'true-false' => 'Đúng/Sai',
		'select' => 'Chọn đáp án bằng hình mẫu'],
	!empty($config['type']) ? $config['type'] : '', ['class'=>'form-control']) }}
</div>