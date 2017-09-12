<?php
Class TimBieuThucCoTongDung extends CommonQuestion{

	protected $type = 'TimBieuThucCoTongDung';

	public static function getTypeName(){
		return parent::getAllType()[$type];
	}
	
	public static function getConfigForm($type = null, $config = null){
		
	}

	public static function getAnswerType(){
		return [
			'input' => 'Viết biểu thức còn thiếu',
			'choose' => 'Chọn biểu thức đúng',
		];
	}
}
