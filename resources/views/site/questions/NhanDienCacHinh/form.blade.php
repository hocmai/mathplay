<em>Tiêu đề và nội dung sẽ được tạo tự động</em>
<div class="form-group">
	{{ Form::label('', 'Loại câu hỏi') }}
	{{ Form::select('question_config[answer_type]['.$id.']', [
		''=>'Mặc định',
		'single'=>'Đọc tên hình',
		'multi' => 'Chọn hình đúng'
		], !empty($config['answer_type']) ? $config['answer_type'] : '', ['class' => 'form-control']) }}
</div>

<div class="form-group">
	{{ Form::label('', 'Chọn hình') }}
	{{ Form::select('question_config[shape]['.$id.']', [''=>'Mặc định'] + NhanDienCacHinh::getShape(), !empty($config['shape']) ? $config['shape'] : '', ['class' => 'form-control']) }}
</div>