<?php
Class SoSanh2HinhAnh extends CommonQuestion{

	protected static $title = 'So sánh 2 hình ảnh';
	public static function getTitle(){
		return self::$title;
	}

	public static function getRandomData(){
        $dir = public_path().'/questions/SoSanh2HinhAnh/img';
        $files = Common::scanDir($dir);
        $randomdata = array_map( function($val) {
                return str_replace('\\', '/', str_replace(public_path(), '', $val));
        }, $files);
        return $randomdata;
    }
}
