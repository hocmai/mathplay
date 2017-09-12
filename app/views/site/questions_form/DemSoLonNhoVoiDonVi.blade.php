<div class="form-group">
	{{ Form::label('', 'Phép tính') }}
	{{ Form::select('question_config[method][]', ['' => 'Mặc định', 'plus' => 'Cộng', 'devide' => 'Trừ'], !empty($config['method']) ? $config['method'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('', 'Số hạng/Số trừ') }}
	{{ Form::select('question_config[number_plus][]', ['' => 'Mặc định', '1' => '1 đơn vị', '2' => '2 đơn vị', '5' => '5 đơn vị', '10' => '10 đơn vị'], !empty($config['number_plus']) ? $config['number_plus'] : '', ['class' => 'form-control']) }}
</div>
<div class="row">
	<div class="form-group col-sm-5">
		{{ Form::label('', 'Giá trị thấp nhất') }}
		{{ Form::number('question_config[min_value][]', !empty($config['min_value']) ? $config['min_value'] : 10, ['class' => 'form-control pull-left', 'placeholder' => 'Giá trị thấp nhất', 'min' => 10]) }}
	</div>
	<div class="form-group col-sm-5">
		{{ Form::label('', 'Giá trị lớn nhất') }}
		{{ Form::number('question_config[max_value][]', !empty($config['max_value']) ? $config['max_value'] : 90, ['class' => 'form-control pull-left', 'placeholder' => 'Giá trị lớn nhất', 'max' => 90]) }}
	</div>
</div>