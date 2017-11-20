<em>a ± a' = b; b ± b' = c; c ± c' = d; d ± d' = d; ...</em>
<div class="form-group">
	{{ Form::label('', 'Số lượng phần tử') }}
	{{ Form::number('question_config[num]['.$id.']', !empty($config['num']) ? $config['num'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('', 'Số đầu tiên (số a)') }}
	{{ Form::number('question_config[first]['.$id.']', !empty($config['first']) ? $config['first'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			{{ Form::label('', 'Giá trị nhỏ nhất của a, b, c,...') }}
			{{ Form::number('question_config[min]['.$id.']', !empty($config['min']) ? $config['min'] : '', ['class' => 'form-control']) }}
		</div>
		<div class="col-xs-12 col-sm-6">
			{{ Form::label('', 'Giá trị lớn nhất của a, b, c,...') }}
			{{ Form::number('question_config[max]['.$id.']', !empty($config['max']) ? $config['max'] : '', ['class' => 'form-control']) }}
		</div>
	</div>
</div>