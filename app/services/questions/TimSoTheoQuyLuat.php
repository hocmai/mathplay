<?php
Class TimSoTheoQuyLuat extends CommonQuestion{

	protected $type = 'TimSoTheoQuyLuat';

	public static function getTypeName(){
		return parent::getAllType()[$type];
	}
	
	public static function getConfigForm($type = null, $config = null){
		
	}
}
