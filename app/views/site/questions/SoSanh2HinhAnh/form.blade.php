Tiêu đề sẽ được tạo tự động.
<div class="form-group">
	{{ Form::label('type', 'Loại câu hỏi') }}
	{{ Form::select('question_config[type]['.$id.']', [
		''=>'Mặc định',
		'choose' => 'Chọn đáp án nhiều hơn/ít hơn',
		'true-false' => 'Đúng/Sai',
		'select' => 'Chọn đáp án bằng hình mẫu'],
	!empty($config['type']) ? $config['type'] : '', ['class'=>'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('compare', 'Hình thức so sánh') }}
	{{ Form::select('question_config[compare]['.$id.']', [
		''=>'Mặc định',
		'nhiều hơn' => 'Chọn đáp án nhiều hơn',
		'ít hơn' => 'Chọn đáp án ít hơn'],
	!empty($config['compare']) ? $config['compare'] : '', ['class'=>'form-control']) }}
</div>
Hình thức này chỉ áp dụng cho chọn đáp án nhiều hơn/ít hơn