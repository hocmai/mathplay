<?php
Class Cong2HinhAnh extends CommonQuestion{

	protected static $title = 'Phép cộng với hình ảnh';
	public static function getTitle(){
		return self::$title;
	}

	public static function getRandomData(){
		$dir = public_path().'/questions/Cong2HinhAnh/img';
		$files = Common::scanDir($dir);
		$randomdata = array_map( function($val) {
			return str_replace('\\', '/', str_replace(public_path(), '', $val));
		}, $files);
		return $randomdata;
	}
}
