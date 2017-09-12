<?php
Class TimSoTrenTiaSo extends CommonQuestion{

	protected $type = 'TimSoTrenTiaSo';
	protected $name = 'Timf ';

	public static function getTypeName(){
		return parent::getAllType()[$type];
	}
	
	public static function getConfigForm($type = null, $config = null){
		
	}

	public static function getAnswerType(){
		return [
			'input' => 'Tìm số theo điều kiện',
			'input-total' => 'Tính tổng 2 phần tử',
			'inline' => 'Điền số còn thiếu',
		];
	}
	
}
