<?php
class DemCanhDaGiac extends CommonQuestion {

	protected static $title = 'Đếm số cạnh, đỉnh của đa giác';
	public static function getTitle(){
		return self::$title;
	}

	public static function getShape(){
		return [
			'tam-giac' => 'Hình tam giác',
			'vuong' => 'Hình vuông',
			'chu-nhat' => 'Hình chữ nhật',
			'hinh-thang' => 'Hình thang',
			'binh-hanh' => 'Hình bình hành',
			'hinh-thoi' => 'Hình thoi',
		];
	}

	public static function renderShape($answer){
		$icon = '';
		$color = ['#6aa7ef', '#93e41c', '#ffc914', '#76b041' , '#ff443b'];
		if($answer == 'tam-giac')
			$icon = '<polygon points="5,195 195,195 100,5" stroke="'.getRandArrayVal($color).'" stroke-width="5" fill="'.getRandArrayVal($color).'"/>';
		elseif($answer == 'vuong')
			$icon = '<rect x="5" y="5" width="190" height="190" style="stroke:'.getRandArrayVal($color).';stroke-width:5;fill:'.getRandArrayVal($color).'"/>';
		elseif($answer == 'tron')
			$icon = '<circle cx="100" cy="100" r="95" stroke="'.getRandArrayVal($color).'" stroke-width="5" fill="'.getRandArrayVal($color).'"/>';
		elseif($answer == 'chu-nhat')
			$icon = '<rect x="5" y="50" width="190" height="100" style="stroke:'.getRandArrayVal($color).';stroke-width:5;fill:'.getRandArrayVal($color).'"/>';
		elseif($answer == 'hinh-thang')
			$icon = '<polygon points="5,180 195,180 150,5 50,5" stroke="'.getRandArrayVal($color).'" stroke-width="5" fill="'.getRandArrayVal($color).'"/>';
		elseif($answer == 'binh-hanh')
			$icon = '<polygon points="5,170 150,170 195,30 50,30" stroke="'.getRandArrayVal($color).'" stroke-width="5" fill="'.getRandArrayVal($color).'"/>';
		elseif($answer == 'hinh-thoi')
			$icon = '<polygon points="100,30 195,100 100,170 5,100" stroke="'.getRandArrayVal($color).'" stroke-width="5" fill="'.getRandArrayVal($color).'"/>';
		elseif($answer == 'duong-thang')
			$icon = '<line x1="0" y1="0" x2="200" y2="200" style="stroke:'.getRandArrayVal($color).';stroke-width:2" />';
		elseif($answer == 'duong-gap-khuc'){
			$icon = '
			<line x1="0" y1="0" x2="50" y2="150" style="stroke:'.getRandArrayVal($color).';stroke-width:2"></line>
			<line x1="50" y1="150" x2="120" y2="80" style="stroke:'.getRandArrayVal($color).';stroke-width:2"></line>
			<line x1="120" y1="80" x2="200" y2="200" style="stroke:'.getRandArrayVal($color).';stroke-width:2"></line>';
		}
		return $icon;
	}
}
