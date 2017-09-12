<?php
Class TimDapSoDungVoiCauHoi extends CommonQuestion{

	protected $type = 'TimDapSoDungVoiCauHoi';

	public static function getTypeName(){
		return parent::getAllType()[$type];
	}
	
	public static function getConfigForm($type = null, $config = null){
		
	}

}
