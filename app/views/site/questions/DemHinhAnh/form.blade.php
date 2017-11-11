<div class="form-group">
	{{ Form::label('', 'Số loại hình ảnh') }}
	{{ Form::number('question_config[num][]', !empty($config['num']) ? $config['num'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('', 'Số lượng lớn nhất của mỗi hình') }}
	{{ Form::number('question_config[max][]', !empty($config['max']) ? $config['max'] : '', ['class' => 'form-control']) }}
</div>