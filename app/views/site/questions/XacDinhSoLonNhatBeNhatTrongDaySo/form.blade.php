<div class="form-group">
	{{ Form::label('', 'Hình thức') }}
	{{ Form::select('question_config[sort]['.$id.']', [
		'' => 'Mặc định',
		'asc' => 'số lớn nhất',
		'desc' => 'Số bé nhất'
	], !empty($config['sort']) ? $config['sort'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			{{ Form::label('', 'Số nhỏ nhất dãy số') }}
			{{ Form::text('question_config[min_value]['.$id.']', isset($config['min_value']) ? $config['min_value'] : '', ['class' => 'form-control', 'max' => 100]) }}
		</div>
		<div class="col-xs-12 col-sm-6">
			{{ Form::label('', 'Số lớn nhất dãy số') }}
			{{ Form::text('question_config[max_value]['.$id.']', isset($config['max_value']) ? $config['max_value'] : '', ['class' => 'form-control', 'max' => 100]) }}
		</div>
	</div>
</div>