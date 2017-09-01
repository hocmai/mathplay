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
			$form .= Form::label('', 'Phương thức trả lời');
			$form .= Form::select('question_config[answer_type][]', [''=>'-- chọn --'] + parent::getAnswerType(), !empty($config['answer_type']) ? $config['answer_type'] : '', ['class' => 'form-control']);
		$form .= '</div>';
		$form .= '<div class="row"><div class="form-group col-sm-5">';
			$form .= Form::label('', 'Giá trị thấp nhất');
			$form .= Form::number('question_config[min_value][]', !empty($config['min_value']) ? $config['min_value'] : 1, ['class' => 'form-control pull-left', 'placeholder' => 'Giá trị thấp nhất']);
		$form .= '</div>';
		$form .= '<div class="form-group col-sm-5">';
			$form .= Form::label('', 'Giá trị lớn nhất');
			$form .= Form::number('question_config[max_value][]', !empty($config['max_value']) ? $config['max_value'] : 10, ['class' => 'form-control pull-left', 'placeholder' => 'Giá trị lớn nhất']);
		$form .= '</div></div>';

		return $form;
	}


	public static function getRandomData(){
		$dir = public_path().'\questions\SoSanh2HinhAnh\img';
		$files = Common::scanDir($dir);

		return $files;
	}

	public static function render($type = null, $config = null){

	}
}
