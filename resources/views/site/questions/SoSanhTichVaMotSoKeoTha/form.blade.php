<div class="form-group">
	<div class="row">
	    <div class="form-group col-sm-6">
	        {{ Form::label('', 'Giá trị nhỏ nhất') }}
	        {{ Form::number('question_config[min]['.$id.']', isset($config['min']) ? $config['min'] : 5, ['class' => 'form-control pull-left', 'placeholder' => 'Số a nhỏ nhất','max' => 100, 'min' => 5]) }}
	    </div>
	    <div class="form-group col-sm-6">
	        {{ Form::label('','Giá trị lớn nhất') }}
	        {{ Form::number('question_config[max]['.$id.']', isset($config['max']) ? $config['max'] : 10, ['class' => 'form-control pull-left', 'placeholder' => 'Số a lớn nhất','max' => 100,'min' => 5]) }}
	    </div>
	</div>
</div>