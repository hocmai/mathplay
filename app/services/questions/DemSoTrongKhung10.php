<?php
Class DemSoTrongKhung10 extends CommonQuestion{

	protected $type = 'DemSoTrongKhung10';
	protected $name = 'Đếm số trong khung 10 ô';

	public static function getTypeName(){
		return $name;
	}
	
	public static function getConfigForm($type = null, $config = null){
		$form = '';
		$form .= '<div class="form-group">';
			$form .= Form::label('', 'Hình thức câu hỏi');
			$form .= Form::select('question_config[answer_type][]', [''=>'Mặc định', 'trac-nghiem' => 'Trắc nghiệm chọn đáp án', 'dien-dap-an' => 'Điền đáp án'], !empty($config['answer_type']) ? $config['answer_type'] : '', ['class' => 'form-control']);
			$form .= '<div class="clearfix description">Nếu giá trị lớn nhất > 10, hình thức câu hỏi luôn là điền đáp án.</div>';
		$form .= '</div>';
		$form .= '<div class="form-group">';
			$form .= Form::label('', 'Phương thức trả lời');
			$form .= Form::select('question_config[count_type][]', [''=>'Mặc định', 'dem-hinh-anh' => 'Đếm hình ảnh', 'dem-o-trong-khung' => 'Đếm ô trong khung', 'dem-o-con-thieu' => 'Đếm ô còn thiếu'], !empty($config['count_type']) ? $config['count_type'] : '', ['class' => 'form-control']);
			$form .= '<div class="clearfix description">Đối với câu hỏi dạng hình ảnh và đếm ô còn thiếu, mặc định giá trị lớn nhất luôn là 10</div>';
		$form .= '</div>';
		$form .= '<div class="form-group">';
			$form .= Form::label('', 'Chọn hình ảnh hiển thị');
			$form .= '<div class="clearfix description">Chỉ dành cho câu hỏi dạng hình ảnh</div>';
			$form .= Form::select('question_config[select_img][]', self::getImageData()['list'], !empty($config['select_img']) ? $config['select_img'] : '', ['class' => 'form-control']);
		$form .= '</div>';
		$form .= '<div class="row"><div class="form-group col-sm-5">';
			$form .= Form::label('', 'Giá trị thấp nhất');
			$form .= Form::number('question_config[min_value][]', !empty($config['min_value']) ? $config['min_value'] : 1, ['class' => 'form-control pull-left', 'placeholder' => 'Giá trị thấp nhất', 'max' => 99]);
		$form .= '</div>';
		$form .= '<div class="form-group col-sm-5">';
			$form .= Form::label('', 'Giá trị lớn nhất');
			$form .= Form::number('question_config[max_value][]', !empty($config['max_value']) ? $config['max_value'] : 10, ['class' => 'form-control pull-left', 'placeholder' => 'Giá trị lớn nhất', 'max' => 100]);
		$form .= '</div></div>';
		$form .= '';

		return $form;
	}

	public static function getImageData(){
		return [
			'list' => [
				'' => 'Mặc định',
				'monkey' => 'Khỉ con',
				'zebra' => 'Ngựa vằn',
				'crocodile' => 'Cá sấu'
			],
			'data' => [
				'monkey' => asset('questions/DemSoTrongKhung10/img/khi.png'),
				'zebra' => asset('questions/DemSoTrongKhung10/img/ngua.png'),
				'crocodile' => asset('questions/DemSoTrongKhung10/img/ca-sau.png')
			],
		];
	}

	public static function render($type = null, $config = null){
		
	}
}