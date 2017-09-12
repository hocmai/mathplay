<?php
Class DemHangChuc extends CommonQuestion{

	protected $type = 'DemHangChuc';
	protected $name = 'Đếm theo hàng chục';

	public static function getTypeName(){
		return $name;
	}
	
	public static function getConfigForm($type = null, $config = null){
		
	}

	public static function getImageData(){
		return [
			'list' => [
				'' => 'Mặc định',
				'bear' => 'Con gấu bông',
				'bowling' => 'Quả bowling',
				'cube' => 'Miếng ghép',
				'domino' => 'Mảnh domino',
				'node' => 'Chiếc cúc áo',
				'rocket' => 'Chiếc phi thuyền',
				'roll' => 'Cuộn len',
			],
			'data' => [
				'bear' => asset('questions/DemHangChuc/img/bear.svg'),
				'bowling' => asset('questions/DemHangChuc/img/bowling.svg'),
				'cube' => asset('questions/DemHangChuc/img/cube.svg'),
				'domino' => asset('questions/DemHangChuc/img/domino.svg'),
				'node' => asset('questions/DemHangChuc/img/node.svg'),
				'rocket' => asset('questions/DemHangChuc/img/rocket.svg'),
				'roll' => asset('questions/DemHangChuc/img/roll.svg'),
			],
		];
	}
}
