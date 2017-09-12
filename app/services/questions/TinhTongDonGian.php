<?php
Class TinhTongDonGian extends CommonQuestion{

	protected $type = 'TinhTongDonGian';

	public static function getTypeName(){
		return parent::getAllType()[$type];
	}
	
	public static function getConfigForm($type = null, $config = null){
		
	}

}
