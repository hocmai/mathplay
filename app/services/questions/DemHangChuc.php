<?php
Class DemHangChuc extends CommonQuestion{

	protected $type = 'DemHangChuc';
	protected $name = 'Đếm theo hàng chục';

	public static function getTypeName(){
		return $name;
	}
	
	public static function getConfigForm($type = null, $config = null){
		$form = '';
		$form .= '<div class="form-group">';
			$form .= Form::label('', 'Phương thức trả lời');
			$form .= Form::select('question_config[answer_type][]', [''=>'Mặc định', 'trac-nghiem' => 'Trắc nghiệm chọn đáp án', 'dien-dap-an' => 'Điền đáp án'], !empty($config['answer_type']) ? $config['answer_type'] : '', ['class' => 'form-control']);
		$form .= '</div>';

		$form .= '<div class="form-group">';
			$form .= Form::label('', 'Hình ảnh hiển thị');
			$form .= Form::select('question_config[image_data][]', self::getImageData()['list'], !empty($config['image_data']) ? $config['image_data'] : '', ['class' => 'form-control']);
		$form .= '</div>';

		$form .= '<div class="row"><div class="form-group col-sm-5">';
			$form .= Form::label('', 'Giá trị thấp nhất');
			$form .= Form::number('question_config[min_value][]', !empty($config['min_value']) ? $config['min_value'] : 10, ['class' => 'form-control pull-left', 'placeholder' => 'Giá trị thấp nhất', 'min' => 10]);
		$form .= '</div>';

		$form .= '<div class="form-group col-sm-5">';
			$form .= Form::label('', 'Giá trị lớn nhất');
			$form .= Form::number('question_config[max_value][]', !empty($config['max_value']) ? $config['max_value'] : 100, ['class' => 'form-control pull-left', 'placeholder' => 'Giá trị lớn nhất', 'max' => 100]);
		$form .= '</div></div>';

		return $form;
	}

	public static function getImageData(){
		return [
			'list' => [
				'' => 'Mặc định',
				'bear' => 'Con gấu bông',
				'bowling' => 'Quả bowling',
				'cube' => 'Miếng ghép',
				'domino' => 'Mảnh domino',
				'node' => 'Chiếc cúc áo',
				'rocket' => 'Chiếc phi thuyền',
				'roll' => 'Cuộn len',
			],
			'data' => [
				'bear' => asset('questions/DemHangChuc/img/bear.svg'),
				'bowling' => asset('questions/DemHangChuc/img/bowling.svg'),
				'cube' => asset('questions/DemHangChuc/img/cube.svg'),
				'domino' => asset('questions/DemHangChuc/img/domino.svg'),
				'node' => asset('questions/DemHangChuc/img/node.svg'),
				'rocket' => asset('questions/DemHangChuc/img/rocket.svg'),
				'roll' => asset('questions/DemHangChuc/img/roll.svg'),
			],
		];
	}

	public static function render($type = null, $config = null){

	}
}
