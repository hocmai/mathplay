<div class="form-group">
	{{ Form::label('', 'Loại câu hỏi') }}
	{{ Form::select('question_config[answer_type][]', [
		''=>'Mặc định',
		'single'=>'Đọc tên các hình',
		'multi' => 'Chọn các hình đúng'
		], !empty($config['answer_type']) ? $config['answer_type'] : '', ['class' => 'form-control']) }}
	<em>Tiêu đề và nội dung sẽ được tạo tự động</em>
</div>