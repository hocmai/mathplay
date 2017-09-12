<?php
Class Cong2HinhAnh extends CommonQuestion{

	protected $type = 'Cong2HinhAnh';

	public static function getTypeName(){
		return parent::getAllType()[$type];
	}
	
	public static function getConfigForm($type = null, $config = null){
		
	}

	public static function getRandomData(){
		$dir = public_path().'\questions\Cong2HinhAnh\img';
		$files = Common::scanDir($dir);
		$randomdata = array_map( function($val) {
			return str_replace('\\', '/', str_replace(public_path(), '', $val));
		}, $files);
		return $randomdata;
	}
}
