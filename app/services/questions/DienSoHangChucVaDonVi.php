<?php
Class DienSoHangChucVaDonVi extends CommonQuestion{

	protected $type = 'DienSoHangChucVaDonVi';
	protected $name = 'Điền số hàng chục và đơn vị';

	public static function getTypeName(){
		return $name;
	}
	
	public static function getConfigForm($type = null, $config = null){
		$form = '';
		$form .= '<div class="row"><div class="form-group col-sm-5">';
			$form .= Form::label('', 'Giá trị thấp nhất');
			$form .= Form::number('question_config[min_value][]', !empty($config['min_value']) ? $config['min_value'] : 1, ['class' => 'form-control pull-left', 'placeholder' => 'Giá trị thấp nhất', 'max' => 99]);
		$form .= '</div>';
		$form .= '<div class="form-group col-sm-5">';
			$form .= Form::label('', 'Giá trị lớn nhất');
			$form .= Form::number('question_config[max_value][]', !empty($config['max_value']) ? $config['max_value'] : 10, ['class' => 'form-control pull-left', 'placeholder' => 'Giá trị lớn nhất', 'max' => 100]);
		$form .= '</div></div>';
		return $form;
	}

	public static function render($type = null, $config = null){
		
	}
}