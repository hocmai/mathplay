a + b = c, a - b = c<br>
<div class="form-group">
	{{ Form::label('', 'Phép tính') }}
	{{ Form::select('question_config[type][]', [''=>'Mặc định', 'plus'=>'Phép cộng', 'sub'=>'Phép trừ'], !empty($config['type']) ? $config['type'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			{{ Form::label('', 'Số a nhỏ nhất') }}
			{{ Form::text('question_config[min_a][]', !empty($config['min_a']) ? $config['min_a'] : '', ['class' => 'form-control']) }}
		</div>
		<div class="col-xs-12 col-sm-6">
			{{ Form::label('', 'Số a lớn nhất') }}
			{{ Form::text('question_config[max_a][]', !empty($config['max_a']) ? $config['max_a'] : '', ['class' => 'form-control']) }}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			{{ Form::label('', 'Số b nhỏ nhất') }}
			{{ Form::text('question_config[min_b][]', !empty($config['min_b']) ? $config['min_b'] : '', ['class' => 'form-control']) }}
		</div>
		<div class="col-xs-12 col-sm-6">
			{{ Form::label('', 'Số b lớn nhất') }}
			{{ Form::text('question_config[max_b][]', !empty($config['max_b']) ? $config['max_b'] : '', ['class' => 'form-control']) }}
		</div>
	</div>
</div>