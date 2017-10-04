<?php
class NhanDienCacHinh extends CommonQuestion {

	protected static $title = 'Nhận diện các hình';
	public static function getTitle(){
		return self::$title;
	}

	public static function getShape(){
		return [
			'tam-giac' => 'Hình tam giác',
			'vuong' => 'Hình vuông',
			'tron' => 'Hình tròn',
			'chu-nhat' => 'Hình chữ nhật',
			'hinh-thang' => 'Hình thang',
			'binh-hanh' => 'Hình bình hành',
			'hinh-thoi' => 'Hình thoi',
			'duong-thang' => 'Đường thẳng',
			'duong-gap-khuc' => 'Đường gấp khúc'
		];
	}

	public static function renderShape($answer){
		$icon = '';
		$color = ['#6aa7ef', '#93e41c', '#ffc914', '#76b041' , '#ff443b'];
		if($answer == 'tam-giac')
			$icon = getRandArrayVal(['<svg width="200" height="200"><polygon points="5,195 195,195 100,5" stroke="'.getRandArrayVal($color).'" stroke-width="5" fill="'.getRandArrayVal($color).'"/></svg>']);
		elseif($answer == 'vuong')
			$icon = getRandArrayVal(['<svg width="200" height="200"><rect x="5" y="5" width="190" height="190" style="stroke:'.getRandArrayVal($color).';stroke-width:5;fill:'.getRandArrayVal($color).'"/></svg>', '<img src="'.asset('/questions/NhanDienCacHinh/img/vuong.jpg').'"/>']);
		elseif($answer == 'tron')
			$icon = getRandArrayVal(['<svg width="200" height="200"><circle cx="100" cy="100" r="95" stroke="'.getRandArrayVal($color).'" stroke-width="5" fill="'.getRandArrayVal($color).'"/></svg>'
			, '<img src="'.asset('/questions/NhanDienCacHinh/img/tron-1.jpg').'"/>'
			, '<img src="'.asset('/questions/NhanDienCacHinh/img/tron-2.svg').'"/>'
			, '<img src="'.asset('/questions/NhanDienCacHinh/img/tron-3').'.svg"/>'
			, '<img src="'.asset('/questions/NhanDienCacHinh/img/tron-4.jpg').'"/>'
			, '<img src="'.asset('/questions/NhanDienCacHinh/img/tron-5.jpg').'"/>'
			, '<img src="'.asset('/questions/NhanDienCacHinh/img/tron-6.jpg').'"/>'
			, '<img src="'.asset('/questions/NhanDienCacHinh/img/tron-7.jpg').'"/>'
			, '<img src="'.asset('/questions/NhanDienCacHinh/img/tron-8.png').'"/>'
			, '<img src="'.asset('/questions/NhanDienCacHinh/img/tron-9.png').'"/>'
			, '<img src="'.asset('/questions/NhanDienCacHinh/img/tron-10.jp').'g"/>']);
		elseif($answer == 'chu-nhat')
			$icon = getRandArrayVal(['<svg width="200" height="200"><rect x="5" y="50" width="190" height="100" style="stroke:'.getRandArrayVal($color).';stroke-width:5;fill:'.getRandArrayVal($color).'"/></svg>',
				'<img src="'.asset('/questions/NhanDienCacHinh/img/chu-nhat-1.png').'"/>',
				'<img src="'.asset('/questions/NhanDienCacHinh/img/chu-nhat-2.jpg').'"/>',
				'<img src="'.asset('/questions/NhanDienCacHinh/img/chu-nhat-3.jpg').'"/>']);
		elseif($answer == 'hinh-thang')
			$icon = '<svg width="200" height="200"><polygon points="5,180 195,180 150,5 50,5" stroke="'.getRandArrayVal($color).'" stroke-width="5" fill="'.getRandArrayVal($color).'"/></svg>';
		elseif($answer == 'binh-hanh')
			$icon = '<svg width="200" height="200"><polygon points="5,170 150,170 195,30 50,30" stroke="'.getRandArrayVal($color).'" stroke-width="5" fill="'.getRandArrayVal($color).'"/></svg>';
		elseif($answer == 'hinh-thoi')
			$icon = '<svg width="200" height="200"><polygon points="100,30 195,100 100,170 5,100" stroke="'.getRandArrayVal($color).'" stroke-width="5" fill="'.getRandArrayVal($color).'"/></svg>';
		elseif($answer == 'duong-thang')
			$icon = '<svg width="200" height="200"><line x1="0" y1="0" x2="200" y2="200" style="stroke:'.getRandArrayVal($color).';stroke-width:2" /></svg>';
		elseif($answer == 'duong-gap-khuc'){
			$icon = '
			<svg width="200" height="200"><line x1="0" y1="0" x2="50" y2="150" style="stroke:'.getRandArrayVal($color).';stroke-width:2"></line>
			<line x1="50" y1="150" x2="120" y2="80" style="stroke:'.getRandArrayVal($color).';stroke-width:2"></line>
			<line x1="120" y1="80" x2="200" y2="200" style="stroke:'.getRandArrayVal($color).';stroke-width:2"></line></svg>';
		}
		return $icon;
	}
}
