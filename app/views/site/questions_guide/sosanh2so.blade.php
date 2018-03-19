<?php
$answer_string = 'bằng';
if( $answer == '>' ){
	$answer_string = 'lớn hơn';
}
else if( $answer == '<' ){
	$answer_string = 'nhó hơn';
}
?>
<div class="huong-dan-giai text-left" style="display">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		<div class="choose answer inline-block">
			<span class="pull-left number">{{ $num1 }}</span>
			<span class="pull-left input"> ____ </span>
			<span class="pull-left number">{{ $num2 }}</span>
		</div>
		
		@if($method == '2so')
			<p>{{ $num1 }} {{ $answer }} {{ $num2 }}</p>
		@elseif($method == 'tong-so')
			<?php $left = explode(' + ', $num1); ?>
			<p>Vế trái: {{ $left[0].' + '.$left[1].' = '.($left[0]+$left[1]) }}</p>
			<p>Vế phải: {{ $num2 }}</p>
			<p>Thực hiện so sánh 2 vế: {{ ($left[0]+$left[1]).' '.$answer.' '.$num2 }}</p>
			<p>Như vậy: {{ $num1.' '.'<b>'.$answer.'</b>'.' '.$num2 }}</p>
		@elseif($method == 'tong-tong')
			<?php
				$left = explode(' + ', $num1);
				$right = explode(' + ', $num2);
			?>
			<p>Vế trái: {{ $left[0].' + '.$left[1].' = '.($left[0]+$left[1]) }}</p>
			<p>Vế phải: {{ $right[0].' + '.$right[1].' = '.($right[0]+$right[1]) }}</p>
			<p>Thực hiện so sánh 2 vế: {{ ($left[0]+$left[1]).' '.$answer.' '.($right[0]+$right[1]) }} Như vậy: {{ $num1.' '.$answer.' '.$num2 }}</p>
		@elseif($method == 'hieu-so')
			<?php $left = explode(' - ', $num1); ?>
			<p>Vế trái: {{ $left[0].' - '.$left[1].' = '.($left[0]-$left[1]) }}</p>
			<p>Vế phải: {{ $num2 }}</p>
			<p>Thực hiện so sánh 2 vế: {{ ($left[0]-$left[1]).' '.$answer.' '.$num2 }}</p>
			<p>Như vậy: {{ $num1.' '.$answer.' '.$num2 }}</p>
		@elseif($method == 'hieu-hieu')
			<?php
				$left = explode(' - ', $num1);
				$right = explode(' - ', $num2);
			?>
			<p>Vế trái: {{ $left[0].' - '.$left[1].' = '.($left[0]-$left[1]) }}</p>
			<p>Vế phải: {{ $right[0].' - '.$right[1].' = '.($right[0]-$right[1]) }}</p>
			<p>Thực hiện so sánh 2 vế: {{ ($left[0]-$left[1]).' '.$answer.' '.($right[0]-$right[1]) }} Như vậy: {{ $num1.' '.$answer.' '.$num2 }}</p>
		@endif
		<div class="clear clear-fix"></div>
		<p class="answers">Đáp án là: {{ $answer_string }}</p>
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>