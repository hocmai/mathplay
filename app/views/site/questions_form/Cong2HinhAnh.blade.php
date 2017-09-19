<div class="form-group">
	{{ Form::label('', 'Số hạng nhỏ nhất:') }}
	{{ Form::number('question_config[min_value][]', !empty($config['min_value']) ? $config['min_value'] : 0, ['class' => 'form-control', 'placeholder' => 'Số hạng nhỏ nhất', 'min' => 0]) }}
	<div class="description">Nhập 0 để lấy 1 số ngẫu nhiên (≥0).</div>
</div>
<div class="form-group">
	{{ Form::label('', 'Số hạng lớn nhất') }}
	{{ Form::number('question_config[max_value][]', !empty($config['max_value']) ? $config['max_value'] : 0, ['class' => 'form-control', 'placeholder' => 'Số hạng lớn nhất', 'min' => 0]) }}
	<div class="description">Nhập 0 để lấy giá trị ngẫu nhiên (≥1).</div>
</div>
<div class="form-group">
	{{ Form::label('', 'Số các số hạng') }}
	{{ Form::number('question_config[number_count][]', !empty($config['number_count']) ? $config['number_count'] : 0,  ['class' => 'form-control', 'placeholder' => 'Số các số hạng', 'min' => 2, 'max' => 4]) }}
	<div class="description">Nhập 0 để tạo ngẫu nhiên n số hạng (n≥2 & n≤4).</div>
</div>