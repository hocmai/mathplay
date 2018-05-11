<?php
Class SoSanh2HinhAnh extends CommonQuestion{

	protected static $title = 'So sánh 2 hình ảnh';
	public static function getTitle(){
		return self::$title;
	}

	public static function getRandomData(){
        $config = CommonConfig::get('question_type.config.SoSanh2HinhAnh');
        if( $config && !empty($config['images']) ){
            foreach ($config['images'] as $key => $value) {
                $randomdata[$value['image_title']] = $value['image_url'];
            }
        }
        else{
            $files = Common::scanDir( public_path().'/questions/SoSanh2HinhAnh/img' );
            $randomdata = array_map( function($val) {
                return str_replace('\\', '/', str_replace(public_path(), '', $val));
            }, $files);
        }
        return $randomdata;
    }
}
