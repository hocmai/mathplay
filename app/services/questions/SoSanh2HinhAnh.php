<?php
Class SoSanh2HinhAnh extends CommonQuestion{

	protected $type = 'SoSanh2HinhAnh';
	protected $name = 'So sánh 2 hình ảnh';

	public static function getTypeName(){
		return $name;
	}
	
	public static function getConfigForm($type = null, $config = null){
		$form = '';
		$form .= '<div class="form-group">';
			$form .= Form::label('question_config[answer_type][]', 'Phương thức trả lời');
			$form .= Form::select('question_config[answer_type][]', [''=>'-- chọn --'] + parent::getAnswerType(), $config['answer_type'] or '', ['class' => 'form-control selectpicker', 'data-live-search' => true]);
		$form .= '</div>';
		$form .= '<div class="row"><div class="form-group col-sm-5">';
			$form .= Form::label('question_config[min_value][]', 'Giá trị thấp nhất');
			$form .= Form::number('question_config[min_value][]', ($config['max_value'] ? $config['max_value'] : 1), ['class' => 'form-control pull-left', 'placeholder' => 'Giá trị thấp nhất']);
		$form .= '</div>';
		$form .= '<div class="form-group col-sm-5">';
			$form .= Form::label('question_config[min_value][]', 'Giá trị lớn nhất');
			$form .= Form::number('question_config[max_value][]', ($config['max_value'] ? $config['max_value'] : 10), ['class' => 'form-control pull-left', 'placeholder' => 'Giá trị lớn nhất']);
		$form .= '</div></div>';

		if( !$config['answer_type'] ){
			
		} else{

		}

		return $form;
	}


	public static function getRandomData(){
		if ($handle = opendir( './frontend/questions/SoSanh2HinhAnh' )) {

		    while (false !== ($entry = readdir($handle))) {

		        if ($entry != "." && $entry != "..") {

		            echo( "$entry\n");
		        }
		    }

		    closedir($handle);
		}
	}

	public static function render($type = null, $config = null){

	}
}
