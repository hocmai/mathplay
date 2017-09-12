<?php
Class ChonMauSacPhuHop extends CommonQuestion{

	protected $type = 'ChonMauSacPhuHop';

	public static function getTypeName(){
		return parent::getAllType()[$type];
	}
	
}
