<?php
Class TimSoTrenTiaSo extends CommonQuestion{

	protected $type = 'TimSoTrenTiaSo';
	protected $name = 'Timf ';

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
			$form .= Form::label('', 'Giá trị thấp nhất');
			$form .= Form::number('question_config[min_value][]', !empty($config['min_value']) ? $config['min_value'] : 0, ['class' => 'form-control pull-left', 'placeholder' => 'Giá trị thấp nhất', 'min' => 0]);
			$form .= '<div class="description">Tia số được tạo từ giá trị thấp nhất cộng thêm giá trị mặc định cho đến hết 10 phần tử trên tia số. Nhập 0 để lấy giá trị ngẫu nhiên</div>';
		$form .= '</div>';

		$form .= '<div class="form-group">';
			$form .= Form::label('', 'Khoảng cách giữa 2 số');
			$form .= Form::number('question_config[number_plus][]', !empty($config['number_plus']) ? $config['number_plus'] : 0, ['class' => 'form-control pull-left', 'placeholder' => 'Khoảng cách giữa các số trong tia số', 'min' => 0]);
			$form .= '<div class="description">Nhập 0 để lấy giá trị ngẫu nhiên</div>';
		$form .= '</div>';

		return $form;
	}

	public static function getAnswerType(){
		return [
			'input' => 'Tìm số theo điều kiện',
			'input-total' => 'Tính tổng 2 phần tử',
			'inline' => 'Điền số còn thiếu',
		];
	}

	public static function render($type = null, $config = null){

	}
}
