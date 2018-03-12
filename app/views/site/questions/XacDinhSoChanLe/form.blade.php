
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
		{{ Form::text('question_config[max]['.$id.']', !empty($config['max']) ? $config['max'] : 100, ['class' => 'form-control']) }}
	</div>
</div>