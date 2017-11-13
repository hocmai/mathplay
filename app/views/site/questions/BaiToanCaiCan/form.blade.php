<div class="form-group">
	{{ Form::label('', 'Dạng câu hỏi') }}
	{{ Form::select('question_config[type][]', [
		'' => 'Mặc định',
		'coin' => 'Thả đồng xu',
		'basic' => 'Chọn đáp án'
	], !empty($config['type']) ? $config['type'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<label>Nhỏ nhất</label>
			{{ Form::number('question_config[min][]', !empty($config['min']) ? $config['min'] : 1, ['class'=>'form-control']) }}
		</div>
		<div class="col-xs-12 col-sm-6">
			<label>Nhỏ nhất</label>
			{{ Form::number('question_config[max][]', !empty($config['max']) ? $config['max'] : 100, ['class'=>'form-control']) }}
		</div>
	</div>
</div>