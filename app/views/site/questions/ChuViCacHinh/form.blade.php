<div class="form-group">
	{{ Form::label('', 'Đơn vị ') }}
	{{ Form::select('question_config[unit]['.$id.']',[''=>'Mặc định','cm'=>'cm','dm'=>'dm','m'=>'m'], !empty($config['unit']) ? $config['unit'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('', 'Chọn hình') }}
	{{ Form::select('question_config[shape]['.$id.']', [''=>'Mặc định'] + ChuViCacHinh::getShape(), !empty($config['shape']) ? $config['shape'] : '', ['class' => 'form-control']) }}
</div>