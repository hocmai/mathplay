<?php
Class SoHangConThieu extends CommonQuestion{

	protected $type = 'SoHangConThieu';

	public static function getTypeName(){
		return parent::getAllType()[$type];
	}
	
	public static function getConfigForm($type = null, $config = null){
		
	}

}
