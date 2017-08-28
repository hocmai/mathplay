<?php
Class CommonQuestion implements QuestionInterface{

	public static function getAllType(){
		return [
			'tap-dem' => 'Tập đếm',
		];
	}
	
	public static function getConfigForm($type, $config){

	}
	
	public static function render($type, $config){

	}

	public static function test(){
		return 'test';
	}
}
