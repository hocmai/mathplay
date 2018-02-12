<?php 
	if( $num1 > $num2 ){
		$answer = 'lớn hơn';
	}
	else if( $num1 < $num2 ){
		$answer = 'nhỏ hơn';
	}
	else {
		$answer = 'bằng';
}
?>
<?php
	 // $sum = (($num1+$tong));
	 $number = explode('+', $num1); //explode tach chuoi
	 $sum = 0;
	 foreach ($number as $value) {
	 	$sum = $sum + $value;
	 }
	 if( $sum > $num2 ){
		$answer = 'lớn hơn';
	}
	else if( $sum < $num2 ){
		$answer = 'nhỏ hơn';
	}
	else {
		$answer = 'bằng';
	}
	  // tong voi 1 so


	$number =explode('+', $num2);
	$sum1 = 0;
	foreach ($number as $key1){
		$sum1 = $sum1 + $key1;
	} 
	if ($sum > $sum1) {
		$answer = 'lớn hơn';
	}elseif ($sum < $sum1) {
		$answer = 'nhỏ hơn';
	}else {
		$answer = 'bằng';
	} // tong voi tong

	$number = explode('-', $num1); //explode tach chuoi
	 $sum = 0;
	 $sum = $number[0]- $number[1];

	 if( $sum > $num2 ){
		$answer = 'lớn hơn';
	}
	else if( $sum < $num2 ){
		$answer = 'nhỏ hơn';
	}
	else {
		$answer = 'bằng';
	}// hiệu với 1 số

	$number =explode('-', $num2);
	$sum1 = 0;
	$sum1 = $number[0]- $number[1];

	if ($sum > $sum1) {
		$answer = 'lớn hơn';
	}elseif ($sum < $sum1) {
		$answer = 'nhỏ hơn';
	}else {
		$answer = 'bằng';
	} // hiệu voi hiệu
	 // $sum = $number[0]+$number[1];
	
 ?>
<div class="huong-dan-giai text-left" style="display">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper" style="font-size: 18px">
		<div class="choose answer inline-block" style="line-height: 35px;font-size: 16px;font-weight: 500;">
			<span class="pull-left number">{{ $num1 }}</span>
			<span class="pull-left input"> ____ </span>
			<span class="pull-left number">{{ $num2 }}</span>
		</div>
		@if($type !='choose' )
			<hr>
				<strong>TH1 chọn dấu bằng "=":</strong>
				<span>{{ $num1.' giống số '.$num2 }}</span>
			<hr>
				<strong>TH2 chọn dấu lớn hơn ">":</strong>
				<span>{{ $num1.' lớn hơn '.$num2 }}</span>
			<hr>
				<strong>TH3 chọn dấu nhỏ hơn "<":</strong>
				<span>{{ $num1.' nhỏ hơn '.$num2 }}</span>
			<br>
		@else
		<br>
			<span>tổng số vế tổng vế trái: {{ $num1. '='.$sum }}</span>
		<br>
			<span>tổng số vế tổng vế phải: {{ $num2. '='.$sum1 }}</span>
		@endif
		<br>
			<strong>Khi em quan sát 2 số thì vế bên trái <span style="color:red">{{ $answer }}</span> vế bên phải</strong>
		<hr>
			<strong>Đáp án là dấu:<span style="color:red">{{ $answer }}</span></strong>
	</div>
</div>