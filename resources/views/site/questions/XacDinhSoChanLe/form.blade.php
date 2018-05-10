
<div class="row">
	<div class="form-group">
		{{ Form::label('', 'Hình thức') }}
		{{ Form::select('question_config[type]['.$id.']', [
		'' => 'Mặc định',
		'coin' => 'chọn đáp án (hình ảnh)',
		'basic' => 'Chọn đáp án(số)'
	], !empty($config['type']) ? $config['type'] : '', ['class' => 'form-control']) }}
	</div>
	<div class="form-group">
		{{ Form::label('','Giá trị lớn nhất') }}
		{{ Form::number('question_config[max]['.$id.']', isset($config['max_value']) ? $config['max_value'] : 20, ['class' => 'form-control pull-left', 'placeholder' => 'Số  lớn nhất','max' => 20]) }}
	</div>
</div>