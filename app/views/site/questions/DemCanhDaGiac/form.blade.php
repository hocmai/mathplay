<div class="form-group">
	{{ Form::label('', 'Loại câu hỏi') }}
	{{ Form::select('question_config[type][]', [''=>'Mặc định','đỉnh'=>'Đếm số đỉnh','cạnh'=>'Đếm số cạnh'], !empty($config['type']) ? $config['type'] : '', ['class' => 'form-control']) }}
	<em>Tiêu đề và nội dung sẽ được tạo tự động</em>
</div>