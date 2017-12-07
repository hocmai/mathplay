<p><em>a x b ± c</em></p>
<div class="form-group">
	{{ Form::label('', 'Phép tính') }}
	{{ Form::select('question_config[method]['.$id.']', ['' => 'Mặc định', 'plus' => 'Phép cộng', 'sub' => 'Phép trừ'], !empty($config['method']) ? $config['method'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('', 'Hiển thị') }}
	{{ Form::select('question_config[display]['.$id.']', ['' => 'Mặc định', 'ver' => 'Hàng dọc', 'hor' => 'Hàng ngang'], !empty($config['display']) ? $config['display'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
	<label>số a</label>
	<div class="row">
		<div class="col-xs-6 col-sm-6">
			{{ Form::label('', 'Giá trị nhỏ nhất') }}
			{{ Form::number('question_config[min_a]['.$id.']', !empty($config['min_a']) ? $config['min_a'] : '', ['class' => 'form-control']) }}
		</div>
		<div class="col-xs-6 col-sm-6">
			{{ Form::label('', 'Giá trị lớn nhất') }}
			{{ Form::number('question_config[max_a]['.$id.']', !empty($config['max_a']) ? $config['max_a'] : '', ['class' => 'form-control']) }}
		</div>
	</div>
</div>
<div class="form-group">
	<label>số b</label>
	<div class="row">
		<div class="col-xs-6 col-sm-6">
			{{ Form::label('', 'Giá trị nhỏ nhất') }}
			{{ Form::number('question_config[min_b]['.$id.']', !empty($config['min_b']) ? $config['min_b'] : '', ['class' => 'form-control']) }}
		</div>
		<div class="col-xs-6 col-sm-6">
			{{ Form::label('', 'Giá trị lớn nhất') }}
			{{ Form::number('question_config[max_b]['.$id.']', !empty($config['max_b']) ? $config['max_b'] : '', ['class' => 'form-control']) }}
		</div>
	</div>
</div>
<div class="form-group">
	<label>số c</label>
	<div class="row">
		<div class="col-xs-6 col-sm-6">
			{{ Form::label('', 'Giá trị nhỏ nhất') }}
			{{ Form::number('question_config[min_c]['.$id.']', !empty($config['min_c']) ? $config['min_c'] : '', ['class' => 'form-control']) }}
		</div>
		<div class="col-xs-6 col-sm-6">
			{{ Form::label('', 'Giá trị lớn nhất') }}
			{{ Form::number('question_config[max_c]['.$id.']', !empty($config['max_c']) ? $config['max_c'] : '', ['class' => 'form-control']) }}
		</div>
	</div>
</div>