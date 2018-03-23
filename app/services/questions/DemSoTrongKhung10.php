<?php
Class DemSoTrongKhung10 extends CommonQuestion{

	protected static $title = 'Đếm số trong khung 10 ô';
	public static function getTitle(){
		return self::$title;
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
	
	public static function getTableGuideHtml($answer, $countType, $rand_shape, $count = 1){
	 	$output = '
	 	<table class="frame answer_ten pull-left">';
			for( $k = 1; $k <= 2; $k++ ){
				$output .= '<tr>';
					for($i = ( ($k == 1) ? 1 : 6 ); $i <= 5*$k; $i++){
						$output .= '<td>';
							if( $countType == 'dem-o-con-thieu' ){
								if( $i <= (10 - $answer) ){
									$output .= '<div class="'. $rand_shape .'"></div>';
								}
								else{
									$output .= '
									<strong class="num '.( ( $i == 10 - $answer ) ? 'last' : '' ).'">'. $count. '</strong>
									<div class="unknown shape-none"></div>';
									$count++;
								}
							} else{
								if( ($i <= $answer ) ){
									$output .= '
									<strong class="num '.( ( $i == $answer ) ? 'last' : '' ).'">'. $count .'</strong>
									<div class="'. $rand_shape .'"></div>';
									$count++;
								} else {
									$output .= '<div class="shape-none"></div>';
								}
							}
						$output .= '</td>';
					}
				$output .= '</tr>';
			}
		$output .= '</table>';
	 	return $output;
	 }

	 public static function getTableHtml($answer, $countType, $rand_shape){
	 	$count = 1;
	 	$output = '';
	 	for( $j = 1; $j <= floor($answer/10); $j++ ){
	 		$output .= '<table class="frame pull-left">';
				$output .= '<tr>';
					for( $k = 1; $k <= 5; $k++ ){
						$output .= '<td><div class="'. $rand_shape .'"></div></td>';
					}
				$output .= '</tr>';
				$output .= '<tr>';
					for( $k = 6; $k <= 10; $k++ ){
						$output .= '<td><div class="'. $rand_shape .'"></div></td>';
					}
				$output .= '</tr>';
			$output .= '</table>';
		}

		if( $answer % 10 > 0 ){
			$output .= '<table class="frame pull-left">';
				$output .= '<tr>';
					for( $i = 1; $i <= 5; $i++ ){
						$output .= '<td>';
							if( $countType == 'dem-o-con-thieu' ){
								$output .= '<div class="'. (($i <= (10 - $answer) % 10 ) ? $rand_shape : 'unknown shape-none') .'"></div>';
							} else{
								$output .= '<div class="'. (($i <= $answer % 10 ) ? $rand_shape : 'shape-none') .'"></div>';
							}
						$output .= '</td>';
					}
				$output .= '</tr>';
				$output .= '<tr>';
					for( $i = 6; $i <= 10; $i++ ){
						$output .= '<td>';
							if( $countType == 'dem-o-con-thieu' ){
								$output .= '<div class="'. (($i <= (10 - $answer) % 10 ) ? $rand_shape : 'unknown shape-none') .'"></div>';
							} else{
								$output .= '<div class="'. (($i <= $answer % 10 ) ? $rand_shape : 'shape-none') .'"></div>';
							}
						$output .= '</td>';
					}
				$output .= '</tr>';
			$output .= '</table>';
		}

	 	return $output;
	 }
}