<?php
Class DemSoTrongKhung10 extends CommonQuestion{

	protected $type = 'DemSoTrongKhung10';
	protected $name = 'Đếm số trong khung 10 ô';

	public static function getTypeName(){
		return $name;
	}
	
	public static function getConfigForm($type = null, $config = null){
		
	}

	public static function getImageData(){
		return [
			'list' => [
				'' => 'Mặc định',
				'monkey' => 'Khỉ con',
				'zebra' => 'Ngựa vằn',
				'crocodile' => 'Cá sấu'
			],
			'data' => [
				'monkey' => asset('questions/DemSoTrongKhung10/img/khi.png'),
				'zebra' => asset('questions/DemSoTrongKhung10/img/ngua.png'),
				'crocodile' => asset('questions/DemSoTrongKhung10/img/ca-sau.png')
			],
		];
	}
}