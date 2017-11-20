
<div class="form-group">
	{{ Form::label('', 'Hiển thị') }}
	{{ Form::select('question_config[display]['.$id.']', ['' => 'Mặc định', 'doc' => 'Dọc', 'ngang' => 'Ngang'], !empty($config['display']) ? $config['display'] : '', ['class' => 'form-control']) }}
</div>
<strong>a - b = c</strong><span> (a >= b)</span>
<div class="form-group">
	{{ Form::label('', 'Số cần tìm') }}
	{{ Form::select('question_config[find]['.$id.']', ['hieu' => 'Tìm hiệu số', 'a' => 'Tìm số a', 'b' => 'Tìm số b'], !empty($config['find']) ? $config['find'] : '', ['class' => 'form-control']) }}
</div>
<div class="row">
	<div class="form-group col-sm-5">
		{{ Form::label('', 'Số a nhỏ nhất') }}
		{{ Form::number('question_config[min_value_1]['.$id.']', isset($config['min_value_1']) ? $config['min_value_1'] : 1, ['class' => 'form-control pull-left', 'placeholder' => 'Số a nhỏ nhất']) }}
	</div>
	<div class="form-group col-sm-5">
		{{ Form::label('', 'Số a lớn nhất') }}
		{{ Form::number('question_config[max_value_1]['.$id.']', isset($config['max_value_1']) ? $config['max_value_1'] : 10, ['class' => 'form-control pull-left', 'placeholder' => 'Số a lớn nhất']) }}
	</div>
</div>
<div class="row">
	<div class="form-group col-sm-5">
		{{ Form::label('', 'Số b nhỏ nhất') }}
		{{ Form::number('question_config[min_value_2]['.$id.']', isset($config['min_value_2']) ? $config['min_value_2'] : 1, ['class' => 'form-control pull-left', 'placeholder' => 'Số b nhỏ nhất']) }}
	</div>
	<div class="form-group col-sm-5">
		{{ Form::label('', 'Số b lớn nhất') }}
		{{ Form::number('question_config[max_value_2]['.$id.']', isset($config['max_value_2']) ? $config['max_value_2'] : 10, ['class' => 'form-control pull-left', 'placeholder' => 'Số b lớn nhất']) }}
	</div>
</div>