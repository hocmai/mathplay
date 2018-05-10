<em>Nội dung câu hỏi được tạo tự động.</em>
<div class="form-group">
	<label>Loại đồng hồ</label>
	{{ Form::select('question_config[clock]['.$id.']', ['analog' => 'Đồng hồ kim', 'digital' => 'Đồng hồ số'], !empty($config['clock']) ? $config['clock'] : '', ['class'=>'form-control']) }}
</div>
<div class="form-group">
	<label>Hình thức câu hỏi</label>
	{{ Form::select('question_config[type]['.$id.']', [
		'' => 'Mặc định',
		'hour' => 'Nhập số giờ',
		'min' => 'Nhập số phút',
		'choose-number' => 'Chọn đáp án (dạng số)',
		'choose-text' => 'Chọn đáp án (dạng lời văn)',
		'choose-img' => 'Chọn đáp án (hình ảnh đồng hồ)'
	], !empty($config['type']) ? $config['type'] : '', ['class'=>'form-control']) }}
</div>