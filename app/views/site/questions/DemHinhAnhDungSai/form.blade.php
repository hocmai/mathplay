<div class="form-group">
	{{ Form::label('', 'Số lượng nhỏ nhất') }}
	{{ Form::number('question_config[min_value]['.$id.']', !empty($config['min_value']) ? $config['min_value'] : '', ['class' => 'form-control','max'=> 20]) }}
</div>
<div class="form-group">
	{{ Form::label('', 'Số lượng lớn nhất') }}
	{{ Form::number('question_config[max_value]['.$id.']', !empty($config['max_value']) ? $config['max_value'] : '', ['class' => 'form-control','max'=> 20]) }}
</div>