a + b = c ; a - b = c<br>
(a,b,c) < 100<br>
<div class="form-group">
	{{ Form::label('', 'Phép tính') }}
	{{ Form::select('question_config[type]['.$id.']', [''=>'Mặc định', 'plus'=>'Phép cộng', 'sub'=>'Phép trừ'], !empty($config['type']) ? $config['type'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
	<?php $str = str_random(10); ?>
	{{ Form::checkbox('question_config[remember]['.$id.']', 'remember', !empty($config['remember']) ? true : false, ['id' => $str]) }}
	{{ Form::label($str, 'Phép tính có nhớ') }}
</div>
<div class="form-group">
	{{ Form::label('', 'Đáp số') }}
	{{ Form::select('question_config[find]['.$id.']', [
		'' => 'Mặc định',
		'a' => 'Tìm số a',
		'b' => 'Tìm số b',
		'c' => 'Tìm số c'
	], !empty($config['find']) ? $config['find'] : '', ['class'=>'form-control']) }}
</div>
<div class="form-group">
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			{{ Form::label('', 'Số a nhỏ nhất') }}
			{{ Form::text('question_config[min_a]['.$id.']', isset($config['min_a']) ? $config['min_a'] : '', ['class' => 'form-control', 'max' => 99]) }}
		</div>
		<div class="col-xs-12 col-sm-6">
			{{ Form::label('', 'Số a lớn nhất') }}
			{{ Form::text('question_config[max_a]['.$id.']', isset($config['max_a']) ? $config['max_a'] : '', ['class' => 'form-control', 'max' => 99]) }}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			{{ Form::label('', 'Số b nhỏ nhất') }}
			{{ Form::text('question_config[min_b]['.$id.']', isset($config['min_b']) ? $config['min_b'] : '', ['class' => 'form-control', 'max' => 99]) }}
		</div>
		<div class="col-xs-12 col-sm-6">
			{{ Form::label('', 'Số b lớn nhất') }}
			{{ Form::text('question_config[max_b]['.$id.']', isset($config['max_b']) ? $config['max_b'] : '', ['class' => 'form-control', 'max' => 99]) }}
		</div>
	</div>
</div>
