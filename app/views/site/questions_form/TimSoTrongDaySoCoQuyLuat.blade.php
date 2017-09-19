<div class="form-group">
	{{ Form::label('', 'Bắt đầu từ số:') }}
	{{ Form::number('question_config[start_value][]', !empty($config['start_value']) ? $config['start_value'] : 0, ['class' => 'form-control', 'placeholder' => 'Số đầu tiên', 'min' => 0]) }}
	<div class="description">Số đầu tiên trên dãy số. Nhập 0 để lấy 1 số ngẫu nhiên.</div>
</div>
<div class="form-group">
	{{ Form::label('', 'Khoảng cách giữa 2 số') }}
	{{ Form::number('question_config[number_plus][]', !empty($config['number_plus']) ? $config['number_plus'] : 0, ['class' => 'form-control', 'placeholder' => 'Khoảng cách giữa các số trong dãy', 'min' => 0]) }}
	<div class="description">Nhập 0 để lấy giá trị ngẫu nhiên.</div>
</div>
<div class="form-group">
	{{ Form::label('', 'Dãy số có bao nhiêu phần tử?') }}
	{{ Form::number('question_config[number_count][]', !empty($config['number_count']) ? $config['number_count'] : 0,  ['class' => 'form-control', 'placeholder' => 'Số lượng phần tử', 'min' => 5, 'max' => 15]) }}
	<div class="description">Nhập 0 để tạo ngẫu nhiên n số (n <= 10).</div>
</div>