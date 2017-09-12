<?php
Class TimSoTrongDaySoCoQuyLuat extends CommonQuestion{

	protected $type = 'TimSoTrongDaySoCoQuyLuat';

	public static function getTypeName(){
		return parent::getAllType()[$type];
	}
	
	public static function getConfigForm($type = null, $config = null){
		
	}

}
