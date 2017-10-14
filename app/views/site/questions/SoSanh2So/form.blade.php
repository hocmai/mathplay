<span>Tiêu đề và câu hỏi sẽ được tạo tự động. So sánh 2 vế <strong>(a <> b)</strong></span>
<div class="form-group">
	{{ Form::label('', 'Loại câu hỏi') }}
	{{ Form::select('question_config[type][]', [
		'' => 'Mặc định',
		'choose' => 'Chọn đáp án đúng',
		'input' => 'Nhập đáp án'
	], !empty($config['type']) ? $config['type'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			{{ Form::label('', 'Số nhỏ nhất') }}
			{{ Form::number('question_config[min][]', !empty($config['min']) ? $config['min'] : 1, ['class' => 'form-control']) }}
		</div>
		<div class="col-xs-12 col-sm-6">
			{{ Form::label('', 'Số lớn nhất') }}
			{{ Form::number('question_config[max][]', !empty($config['max']) ? $config['max'] : 100, ['class' => 'form-control']) }}
		</div>
	</div>
</div>