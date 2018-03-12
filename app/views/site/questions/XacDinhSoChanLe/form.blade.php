
<div class="row">
	<div class="form-group">
		{{ Form::label('','Giá trị lớn nhất') }}
		{{ Form::text('question_config[max]['.$id.']', !empty($config['max']) ? $config['max'] : 100, ['class' => 'form-control']) }}
	</div>
</div>