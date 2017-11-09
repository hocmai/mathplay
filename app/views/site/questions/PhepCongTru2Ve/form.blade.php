a + b = c + d<br>
a - b = c - d
<hr>
<div class="form-group">
	{{ Form::label('', 'Phép tính') }}
	{{ Form::select('question_config[type][]', ['plus' => 'Phép cộng', 'sub' => 'Phép trừ'], !empty($config['type']) ? $config['type'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('', 'Tìm số:') }}
	{{ Form::select('question_config[find][]', ['' => 'Mặc định', 'a' => 'a', 'b' => 'b', 'c' => 'c' , 'd' => 'd'], !empty($config['find']) ? $config['find'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('', 'Giá trị 2 vế (a +/- b) & (c +/- d)') }}
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			{{ Form::label('', 'Nhỏ nhất') }}
			{{ Form::number('question_config[min][]', !empty($config['min']) ? $config['min'] : 1, ['class' => 'form-control']) }}
		</div>
		<div class="col-xs-12 col-sm-6">
			{{ Form::label('', 'Lớn nhất') }}
			{{ Form::number('question_config[max][]', !empty($config['max']) ? $config['max'] : 100, ['class' => 'form-control']) }}
		</div>
	</div>
</div>