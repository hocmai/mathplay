<div class="form-group">
	{{ Form::label('', 'Phép tính') }}
	{{ Form::select('question_config[type]['.$id.']', [''=>'Mặc định', 'count'=>'Phép đếm', 'nhan'=>'Phép nhân', 'phan-tich'=>'Phân tích phép cộng thành phép nhân'], !empty($config['type']) ? $config['type'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('', 'Số lượng các nhóm hình') }}
	<div class="row">
		<div class="col-xs-6 col-sm-6">
			{{ Form::number('question_config[group_min]['.$id.']', !empty($config['group_min']) ? $config['group_min'] : '', ['class' => 'form-control']) }}
		</div>
		<div class="col-xs-6 col-sm-6">
			{{ Form::number('question_config[group_max]['.$id.']', !empty($config['group_max']) ? $config['group_max'] : '', ['class' => 'form-control']) }}
		</div>
	</div>
</div>
<div class="form-group">
	{{ Form::label('', 'Số lượng mỗi hình trong nhóm') }}
	<div class="row">
		<div class="col-xs-6 col-sm-6">
			{{ Form::number('question_config[each_min]['.$id.']', !empty($config['each_min']) ? $config['each_min'] : '', ['class' => 'form-control']) }}
		</div>
		<div class="col-xs-6 col-sm-6">
			{{ Form::number('question_config[each_max]['.$id.']', !empty($config['each_max']) ? $config['each_max'] : '', ['class' => 'form-control']) }}
		</div>
	</div>
</div>