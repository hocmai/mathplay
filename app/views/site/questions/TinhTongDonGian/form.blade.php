<div class="form-group">
	{{ Form::label('', 'Hiển thị') }}
	{{ Form::select('question_config[display]['.$id.']', ['' => 'Mặc định', 'doc' => 'Dọc', 'ngang' => 'Ngang'], !empty($config['display']) ? $config['display'] : '', ['class' => 'form-control']) }}
</div>
<strong>(a + b = c)</strong>
<div class="row">
	<div class="form-group col-sm-6">
		{{ Form::label('', 'Số a nhỏ nhất') }}
		{{ Form::number('question_config[min_value_a]['.$id.']', isset($config['min_value_a']) ? $config['min_value_a'] : 0, ['class' => 'form-control pull-left', 'placeholder' => 'Số a nhỏ nhất','max' => 9999]) }}
	</div>
	<div class="form-group col-sm-6">
		{{ Form::label('', 'Số a lớn nhất') }}
		{{ Form::number('question_config[max_value_a]['.$id.']', isset($config['max_value_a']) ? $config['max_value_a'] : 20, ['class' => 'form-control pull-left', 'placeholder' => 'Số a lớn nhất','max' => 9999]) }}
	</div>
</div>
<div class="row">
	<div class="form-group col-sm-6">
		{{ Form::label('', 'Số b nhỏ nhất') }}
		{{ Form::number('question_config[min_value_b]['.$id.']', isset($config['min_value_b']) ? $config['min_value_b'] : 0, ['class' => 'form-control pull-left', 'placeholder' => 'Số b nhỏ nhất','max' => 9999]) }}
	</div>
	<div class="form-group col-sm-6">
		{{ Form::label('', 'Số b lớn nhất') }}
		{{ Form::number('question_config[max_value_b]['.$id.']', isset($config['max_value_b']) ? $config['max_value_b'] : 20, ['class' => 'form-control pull-left', 'placeholder' => 'Số b lớn nhất','max' => 9999]) }}
	</div>
</div>