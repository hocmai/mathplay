<?php
Class DienSoConThieu100 extends CommonQuestion{

	protected $type = 'DienSoConThieu100';

	public static function getTypeName(){
		return parent::getAllType()[$type];
	}
	
	public static function getConfigForm($type = null, $config = null){
		
	}
}
