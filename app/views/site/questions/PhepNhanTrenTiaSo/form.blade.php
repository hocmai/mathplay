<div class="form-group">
	{{ Form::label('', 'Khoảng cách giữa 2 số') }}
	{{ Form::number('question_config[number_plus]['.$id.']', !empty($config['number_plus']) ? $config['number_plus'] : 0, ['class' => 'form-control', 'placeholder' => 'Khoảng cách giữa các số trong tia số', 'min' => 0]) }}
	<div class="description">Nhập 0 để lấy giá trị ngẫu nhiên.</div>
</div>
<div class="form-group">
	{{ Form::label('', 'Số phần tử trên tia số') }}
	{{ Form::number('question_config[number_count]['.$id.']', !empty($config['number_count']) ? $config['number_count'] : 0,  ['class' => 'form-control', 'placeholder' => 'Số lượng phần tử', 'min' => 0, 'max' => 15]) }}
	<div class="description">Nhập 0 để tạo ngẫu nhiên n số (n <= 10).</div>
</div>