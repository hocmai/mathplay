a + b = c + d<br>
a - b = c - d
<hr>
<div class="form-group">
	{{ Form::label('', 'Vế trái (a +/- b)') }}
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			{{ Form::label('', 'Nhỏ nhất') }}
			{{ Form::number('question_config[left_min][]', !empty($config['left_min']) ? $config['left_min'] : 0, ['class' => 'form-control']) }}
		</div>
		<div class="col-xs-12 col-sm-6">
			{{ Form::label('', 'Lớn nhất') }}
			{{ Form::number('question_config[left_max][]', !empty($config['left_max']) ? $config['left_max'] : 100, ['class' => 'form-control']) }}
		</div>
	</div>
</div>
<div class="form-group">
	{{ Form::label('', 'Vế phải (c +/- d)') }}
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			{{ Form::label('', 'Nhỏ nhất') }}
			{{ Form::number('question_config[right_min][]', !empty($config['right_min']) ? $config['right_min'] : 0, ['class' => 'form-control']) }}
		</div>
		<div class="col-xs-12 col-sm-6">
			{{ Form::label('', 'Lớn nhất') }}
			{{ Form::number('question_config[right_max][]', !empty($config['right_max']) ? $config['right_max'] : 100, ['class' => 'form-control']) }}
		</div>
	</div>
</div>