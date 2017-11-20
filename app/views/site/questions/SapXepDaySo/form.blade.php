<?php $string = (string)md5(microtime()); ?>
<div class="form-group">
	{{ Form::label('', 'Thứ tự sắp xếp') }}
	{{ Form::select('question_config[sort]['.$id.']', ['' => 'Mặc định', 'asc' => 'Tăng dần', 'desc' => 'Giảm dần'], !empty($config['sort']) ? $config['sort'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group ">
	{{ Form::checkbox('question_config[rule]['.$id.']', 1, (empty($config['rule']) | (!empty($config['rule']) && $config['rule'] != 1)) ? false : true, ['class' => 'form-radio', 'id' => $string]) }}
	<label for="{{ $string }}">Dãy số có quy luật</label>
</div>
<div class="form-group">
	{{ Form::label('', 'Số lượng phần tử') }}
	{{ Form::number('question_config[num_value]['.$id.']', !empty($config['num_value']) ? $config['num_value'] : 5, ['class' => 'form-control']) }}
	<em>Có bao nhiêu số trong dãy số? Nhập "0" để lấy ngẫu nhiên từ 5 - 15</em>
</div>
<div class="form-group">
	{{ Form::label('', 'Số nhỏ nhất') }}
	{{ Form::number('question_config[min_value]['.$id.']', !empty($config['min_value']) ? $config['min_value'] : 1, ['class' => 'form-control']) }}
	<em>Nhập "0" để lấy ngẫu nhiên 1 số > 1</em>
</div>
<div class="form-group">
	{{ Form::label('', 'Số lớn nhất') }}
	{{ Form::number('question_config[max_value]['.$id.']', !empty($config['max_value']) ? $config['max_value'] : 5, ['class' => 'form-control']) }}
	<em>Nhập "0" để lấy ngẫu nhiên 1 số > 5</em>
</div>