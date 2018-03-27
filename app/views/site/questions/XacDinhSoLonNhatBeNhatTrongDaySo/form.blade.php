<div class="form-group">
		{{ Form::label('', 'Hình thức') }}
		{{ Form::select('question_config[sort]['.$id.']', [
		'' => 'Mặc định',
		'asc' => 'số lớn nhất',
		'desc' => 'Số bé nhất'
	], !empty($config['sort']) ? $config['sort'] : '', ['class' => 'form-control']) }}
	</div>