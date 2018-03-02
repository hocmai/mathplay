<?php
if($type == 'plus'){
	$text = 'Tổng';
	if($answer == 0){
		$text = 'Số hạng thứ nhất';
	}elseif($answer == 1) {
		$text ='Số hạng thứ hai';
	}
}else {
	$text = 'Hiệu';
	if($answer == 0){
		$text = 'Số bị trừ';
	}elseif($answer == 1) {
		$text ='Số trừ';
	}
}?>

<div class="huong-dan-giai text-left">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		@if( $type == 'plus' )
			<p>-Số hạng thứ nhất: {{ $num1 }}</p>
			<p>-Số hạng thứ hai: {{ $num2 }}</p>
			<p>-Tổng: {{ $num3 }}</p>
		@else
			<p>-Số bị trừ: {{ $num1 }}</p>
			<p>-Số trừ: {{ $num2 }}</p>
			<p>-Hiệu: {{ $num3 }}</p>
		@endif
		<p class="answers">Trong phép tính trên, {{ $total[$answer].' là thành phần <b>'.$text.'</b>' }}</p>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>
