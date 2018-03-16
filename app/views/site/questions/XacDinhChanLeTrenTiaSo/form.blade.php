Tiêu đề và nội dung câu hỏi sẽ được tạo tự động

<div class="form-group">
	{{ Form::label('', 'Hình thức') }}
	{{ Form::select('question_config[type]['.$id.']', [
	'' => 'Mặc định',
	'input' => 'chọn đáp án (tia số)',
	], !empty($config['type']) ? $config['type'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('', 'Khoảng cách giữa 2 số') }}
	{{ Form::number('question_config[number_plus]['.$id.']', !empty($config['number_plus']) ? $config['number_plus'] : 0, ['class' => 'form-control', 'placeholder' => 'Khoảng cách giữa các số trong tia số', 'min' => 0]) }}
	<div class="description">Nhập 0 để lấy giá trị ngẫu nhiên.</div>
</div>