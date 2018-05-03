<div class="form-group">
	{{ Form::label('', 'Đơn vị ') }}
	{{ Form::select('question_config[unit]['.$id.']',[''=>'Mặc định','cm'=>'cm','dm'=>'dm','m'=>'m'], !empty($config['unit']) ? $config['unit'] : '', ['class' => 'form-control']) }}
</div>