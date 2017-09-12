<?php
Class DemSoLonNhoVoiDonVi extends CommonQuestion{

	protected $type = 'DemSoLonNhoVoiDonVi';
	protected $name = 'Đếm số ngược xuôi cộng/trừ 1-2-5-10';

	public static function getTypeName(){
		return $name;
	}
	
	public static function getConfigForm($type = null, $config = null){
		
	}
	
}
