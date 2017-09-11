<?php
Class TimBieuThucCoTongDung extends CommonQuestion{

	protected $type = 'TimBieuThucCoTongDung';

	public static function getTypeName(){
		return parent::getAllType()[$type];
	}
	
	public static function getConfigForm($type = null, $config = null){
		$form = 'Tiêu đề và nội dung câu hỏi sẽ được tạo tự động';

		$form .= '<div class="form-group">';
			$form .= Form::label('', 'Hình thức');
			$form .= Form::select('question_config[answer_type][]', ['' => 'Mặc định']+self::getAnswerType(), !empty($config['answer_type']) ? $config['answer_type'] : '', ['class' => 'form-control pull-left']);
		$form .= '</div>';

		$form .= '<div class="form-group">';
			$form .= Form::label('', 'Giá trị lớn nhất');
			$form .= Form::number('question_config[max_value][]', !empty($config['max_value']) ? $config['max_value'] : 10, ['class' => 'form-control pull-left', 'placeholder' => 'Giá trị thấp nhất', 'min' => 10]);
			$form .= '<div class="description">Đối với dạng bài "Nhập biểu thức còn thiếu", Giá trị lớn nhất luôn là 10</div>';
		$form .= '</div>';

		return $form;
	}

	public static function getAnswerType(){
		return [
			'input' => 'Viết biểu thức còn thiếu',
			'choose' => 'Chọn biểu thức đúng',
		];
	}

	public static function render($type = null, $config = null){

	}
}
