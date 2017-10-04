<?php
class SoSanhCanhDaGiac extends CommonQuestion {

	protected static $title = 'So sánh số cạnh của đa giác';
	public static function getTitle(){
		return self::$title;
	}

	public static function renderShape($num){
		$icon = [];
		$color = ['#6aa7ef', '#93e41c', '#ffc914', '#76b041' , '#ff443b', 'rgb(249, 213, 61)'];

		if($num == 3){
			$icon[] = '<svg  width="200" height="200" style="transform:rotate('.rand(0,360).'deg);"><polygon points="5,195 195,195 100,5" fill="'.getRandArrayVal($color).'"/>';
		}
		elseif($num == 4){
			$icon[] = '<svg  width="200" height="200" style="transform:rotate('.rand(0,360).'deg);"><rect x="5" y="5" width="190" height="190" style="fill:'.getRandArrayVal($color).'"/></svg>';
			$icon[] = '<svg  width="200" height="200" style="transform:rotate('.rand(0,360).'deg);"><rect x="5" y="50" width="190" height="100" style="fill:'.getRandArrayVal($color).'"/></svg>';
			$icon[] = '<svg  width="200" height="200" style="transform:rotate('.rand(0,360).'deg);"><polygon points="5,180 195,180 150,5 50,5" fill="'.getRandArrayVal($color).'"/></svg>';
			$icon[] = '<svg  width="200" height="200" style="transform:rotate('.rand(0,360).'deg);"><polygon points="5,170 150,170 195,30 50,30" fill="'.getRandArrayVal($color).'"/></svg>';
			$icon[] = '<svg  width="200" height="200" style="transform:rotate('.rand(0,360).'deg);"><polygon points="100,30 195,100 100,170 5,100" fill="'.getRandArrayVal($color).'"/></svg>';
		}
		elseif($num == 5){
			$icon[] = '<svg  width="200" height="200" style="transform:rotate('.rand(0,360).'deg);"><path d="M15,5 L100,5 185,80, 185,185, 15,185, 15,5 z" style="fill:'.getRandArrayVal($color).'"/></svg>';
			$icon[] = '<svg  width="200" height="200" style="transform:rotate('.rand(0,360).'deg);"><path d="M100,5 L180,60, 100,195, 20,60, 100,5 z" style="fill:'.getRandArrayVal($color).'"/></svg>';
			$icon[] = '<svg  width="200" height="200" style="transform:rotate('.rand(0,360).'deg);"><path d="M150,5 L195,50, 100,160, 5,50, 50,5 z" style="fill:'.getRandArrayVal($color).'"/></svg>';	
		}
		elseif($num == 6){
			$icon[] = '<svg  width="200" height="200" style="transform:rotate('.rand(0,360).'deg);"><path d="M150,20 L195,100, 150,180, 50,180, 5,100, 50,20 z" style="fill:'.getRandArrayVal($color).'"/></svg>';
			$icon[] = '<svg  width="200" height="200" style="transform:rotate('.rand(0,360).'deg);"><path d="M140,5 L195,60, 195,195, 5,195, 5,60, 60,5 z" style="fill:'.getRandArrayVal($color).'"/></svg>';
		}
		elseif($num == 7){
			$icon[] = '<svg  width="200" height="200" style="transform:rotate('.rand(0,360).'deg);"><path d="M100,5 L180,45, 195,125, 145,195, 55,195, 5,125, 20,45 z" style="fill:'.getRandArrayVal($color).'"/></svg>';
		}
		elseif($num == 8){
			$icon[] = '<svg  width="200" height="200" style="transform:rotate('.rand(0,360).'deg);"><path d="M70,20 L130,20, 195,70, 195,130, 130,180, 70,180, 5,130, 5,70, z" style="fill:'.getRandArrayVal($color).'"/></svg>';
		}
		else{
			return '';
		}
		// dd($num);
		return getRandArrayVal($icon);
	}
}
