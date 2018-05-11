<?php
class ChuViCacHinh extends CommonQuestion {

	protected static $title = 'Chu vi các hình';
	public static function getTitle(){
		return self::$title;
	}

	public static function getShape(){
		return [
			'tam-giac' => 'Hình tam giác',
			'vuong' => 'Hình vuông',
			'chu-nhat' => 'Hình chữ nhật',
			'binh-hanh' => 'Hình bình hành'
		];
	}

	public static function renderShape($answer){
		$icon = '';
		$color = ['#6aa7ef', '#93e41c', '#ffc914', '#76b041' , '#ff443b'];
		if($answer == 'tam-giac')
			$icon = getRandArrayVal(['<svg width="200" height="200"><polygon points="5,195 195,195 100,5" stroke="'.getRandArrayVal($color).'" stroke-width="5" fill="'.getRandArrayVal($color).'"/></svg>']);
		elseif($answer == 'vuong')
			$icon = getRandArrayVal([
				'<svg width="200" height="200"><rect x="5" y="5" width="190" height="190" style="stroke:'.getRandArrayVal($color).';stroke-width:5;fill:'.getRandArrayVal($color).'"/></svg>']);
		elseif($answer == 'chu-nhat')
			$icon = getRandArrayVal([
				'<svg width="200" height="200"><rect x="5" y="50" width="190" height="100" style="stroke:'.getRandArrayVal($color).';stroke-width:5;fill:'.getRandArrayVal($color).'"/></svg>'
			]);
		elseif($answer == 'binh-hanh')
			$icon = '<svg width="200" height="200"><polygon points="5,170 150,170 195,30 50,30" stroke="'.getRandArrayVal($color).'" stroke-width="5" fill="'.getRandArrayVal($color).'"/></svg>';
		return $icon;
	}
}
