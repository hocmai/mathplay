<span>Tiêu đề và câu hỏi sẽ được tạo tự động. So sánh 2 vế <strong>(a <> b)</strong></span>
<div class="form-group">
	{{ Form::label('', 'Loại câu hỏi') }}
	{{ Form::select('question_config[type]['.$id.']', [
		'' => 'Mặc định',
		'choose' => 'Chọn đáp án đúng',
		'input' => 'Nhập đáp án'
	], !empty($config['type']) ? $config['type'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('', 'Phép so sánh') }}
	{{ Form::select('question_config[method]['.$id.']', [
		'' => 'Mặc định',
		'2so' => 'So sánh 2 số',
		'tong-so' => 'So sánh tổng & 1 số',
		'tong-tong' => 'So sánh 2 tổng',
		'hieu-so' => 'So sánh hiệu & 1 số',
		'hieu-hieu' => 'So sánh 2 hiệu'
	], !empty($config['method']) ? $config['method'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			{{ Form::label('', 'Giá trị nhỏ nhất') }}
			{{ Form::number('question_config[min]['.$id.']', !empty($config['min']) ? $config['min'] : 1, ['class' => 'form-control']) }}
		</div>
		<div class="col-xs-12 col-sm-6">
			{{ Form::label('', 'Giá trị lớn nhất') }}
			{{ Form::number('question_config[max]['.$id.']', !empty($config['max']) ? $config['max'] : 100, ['class' => 'form-control']) }}
		</div>
	</div>
</div>