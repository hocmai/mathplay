<?php
Class DienBieuThuc extends CommonQuestion{

	protected static $title = 'Đếm số trong khung 10 ô';
	public static function getTitle(){
		return self::$title;
	}

	public static function getRandomData(){
		$dir = public_path().'/questions/DienBieuThuc/img';
		$files = Common::scanDir($dir);
		$randomdata = array_map( function($val) {
			return str_replace('\\', '/', str_replace(public_path(), '', $val));
		}, $files);
		return $randomdata;
	}
}
