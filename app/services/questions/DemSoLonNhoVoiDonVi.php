<?php
Class DemSoLonNhoVoiDonVi extends CommonQuestion{

	protected $type = 'DemSoLonNhoVoiDonVi';
	protected $name = 'Đếm số ngược xuôi cộng/trừ 1-2-5-10';

	public static function getTypeName(){
		return $name;
	}
	
	public static function getConfigForm($type = null, $config = null){
		$form = '';

		$form .= '<div class="form-group">';
			$form .= Form::label('', 'Phép tính');
			$form .= Form::select('question_config[method][]', ['' => 'Mặc định', 'plus' => 'Cộng', 'devide' => 'Trừ'], !empty($config['method']) ? $config['method'] : '', ['class' => 'form-control']);
		$form .= '</div>';

		$form .= '<div class="form-group">';
			$form .= Form::label('', 'Số hạng/Số trừ');
			$form .= Form::select('question_config[number_plus][]', ['' => 'Mặc định', '1' => '1 đơn vị', '2' => '2 đơn vị', '5' => '5 đơn vị', '10' => '10 đơn vị'], !empty($config['number_plus']) ? $config['number_plus'] : '', ['class' => 'form-control']);
		$form .= '</div>';

		$form .= '<div class="row"><div class="form-group col-sm-5">';
			$form .= Form::label('', 'Giá trị thấp nhất');
			$form .= Form::number('question_config[min_value][]', !empty($config['min_value']) ? $config['min_value'] : 10, ['class' => 'form-control pull-left', 'placeholder' => 'Giá trị thấp nhất', 'min' => 10]);
		$form .= '</div>';

		$form .= '<div class="form-group col-sm-5">';
			$form .= Form::label('', 'Giá trị lớn nhất');
			$form .= Form::number('question_config[max_value][]', !empty($config['max_value']) ? $config['max_value'] : 90, ['class' => 'form-control pull-left', 'placeholder' => 'Giá trị lớn nhất', 'max' => 90]);
		$form .= '</div></div>';

		return $form;
	}

	public static function render($type = null, $config = null){

	}
}
